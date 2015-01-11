<?php
namespace AndKirby\Composer\Installer;

use Composer\Installer\LibraryInstaller;
use Composer\Package\PackageInterface;

class TarInstaller extends LibraryInstaller
{
    /**
     * {@inheritDoc}
     */
    public function getPackageBasePath(PackageInterface $package)
    {
        $prefix = substr($package->getPrettyName(), 0, 23);
        if ('some/template-' !== $prefix) {
            throw new \InvalidArgumentException(
                'Unable to install template, some templates '
                .'should always start their package name with '
                .'"some/template-"'
            );
        }

        return 'data/templates/'.substr($package->getPrettyName(), 23);
    }

    /**
     * {@inheritDoc}
     */
    public function supports($packageType)
    {
        return 'some-template' === $packageType;
    }
}