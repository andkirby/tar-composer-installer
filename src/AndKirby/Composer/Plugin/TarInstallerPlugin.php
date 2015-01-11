<?php
namespace AndKirby\Composer\Plugin;

use AndKirby\Composer\Installer\TarInstaller;
use Composer\Composer;
use Composer\IO\IOInterface;
use Composer\Plugin\PluginInterface;

class TarInstallerPlugin implements PluginInterface
{
    public function activate(Composer $composer, IOInterface $io)
    {
        $installer = new TarInstaller($io, $composer);
        $composer->getInstallationManager()->addInstaller($installer);
    }
}