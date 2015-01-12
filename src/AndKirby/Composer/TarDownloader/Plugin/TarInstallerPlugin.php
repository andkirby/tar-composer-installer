<?php
namespace AndKirby\Composer\TarDownloader\Plugin;

use AndKirby\Composer\TarDownloader\Downloader\TarDownloader;
use Composer\Composer;
use Composer\IO\IOInterface;
use Composer\Plugin\PluginInterface;

class TarInstallerPlugin implements PluginInterface
{
    /**
     * Replace tar archive downloader
     *
     * @param Composer $composer
     * @param IOInterface $io
     */
    public function activate(Composer $composer, IOInterface $io)
    {
        $this->_registerTarCliDownloader($composer, $io);
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
            ->setDownloader(TarDownloader::ARCHIVE_CODE, new TarDownloader($io, $composer->getConfig()));
        return $this;
    }
}