<?php
namespace AndKirby\Composer\TarDownloader\Plugin;

use AndKirby\Composer\TarDownloader\Downloader\TarDownloader;
use AndKirby\Composer\TarDownloader\Installer\TarInstaller;
use Composer\Composer;
use Composer\IO\IOInterface;
use Composer\Plugin\PluginInterface;

class TarInstallerPlugin implements PluginInterface
{
    public function activate(Composer $composer, IOInterface $io)
    {
        $this->_registerTarCliDownloader($composer, $io);

        //register installer
        $installer = new TarInstaller($io, $composer);
        $composer->getInstallationManager()->addInstaller($installer);
    }

    /**
     * Register TAR CLI Downloader
     *
     * @param Composer $composer
     * @param IOInterface $io
     * @return $this
     */
    protected function _registerTarCliDownloader(Composer $composer, IOInterface $io)
    {
        $composer->getDownloadManager()
            ->setDownloader('tar-cli', new TarDownloader($io, $composer->getConfig()));
        return $this;
    }
}