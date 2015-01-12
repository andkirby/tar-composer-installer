<?php
namespace AndKirby\Composer\TarDownloader\Installer;

use Composer\Installer\LibraryInstaller;
use Composer\Installer\ProjectInstaller;
use Composer\Package\PackageInterface;

class TarInstaller extends LibraryInstaller
{
    /**
     * {@inheritDoc}
     */
    public function getPackageBasePath(PackageInterface $package)
    {
        return parent::getPackageBasePath($package);
        if (0 !== strpos($package->getPrettyName(), 'onepica/opal-')) {
            throw new \InvalidArgumentException(
                'Unable to install template, some templates '
                .'should always start their package name with '
                .'"some/template-"'
            );
        }

        $this->initializeVendorDir();
        return ($this->vendorDir ? $this->vendorDir.'/' : '') . 'onepica/opal';
    }

    /**
     * {@inheritDoc}
     */
    public function supports($packageType)
    {
        return 'magento-module' === $packageType || 'package' === $packageType;
    }
}