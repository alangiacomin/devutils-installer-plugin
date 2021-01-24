<?php

namespace AG\Composer;

use Composer\Composer;
use Composer\IO\IOInterface;
use Composer\Plugin\PluginInterface;

class DevUtilsInstallerPlugin implements PluginInterface
{
  public function activate(Composer $composer, IOInterface $io)
  {
    $installer = new DevUtilsInstaller($io, $composer);
    $composer->getInstallationManager()->addInstaller($installer);
  }

  public function deactivate(Composer $composer, IOInterface $io)
  {
  }

  public function uninstall(Composer $composer, IOInterface $io)
  {
  }
}
