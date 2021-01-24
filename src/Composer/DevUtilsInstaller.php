<?php

namespace AG\Composer;

use Composer\Installer\LibraryInstaller;
use Composer\Package\PackageInterface;

class DevUtilsInstaller extends LibraryInstaller
{
  /**
   * {@inheritDoc}
   */
  public function getInstallPath(PackageInterface $package)
  {
    if ($this->extractPrefix($package) !== 'alangiacomin/devutils') {
      throw new \InvalidArgumentException(
        'Unable to install utility, developer utilities '
          . 'should always start their package name with '
          . '"alangiacomin/devutils-"'
      );
    }

    return $this->getDevUtilsRootPath();
  }

  protected function extractPrefix(PackageInterface $package)
  {
    return substr($package->getPrettyName(), 0, 21);
  }

  protected function extractShortName(PackageInterface $package)
  {
    return substr($package->getPrettyName(), 21);
  }

  protected function getDevUtilsRootPath()
  {
    return '.dev/';
  }

  /**
   * {@inheritDoc}
   */
  public function supports($packageType)
  {
    return (bool)('alangiacomin-devutils' === $packageType);
  }
}
