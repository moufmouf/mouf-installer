<?php
namespace Mouf\Installer;
use Composer\Composer;
use Composer\IO\IOInterface;
use Composer\Script\Event;
use Composer\Package\PackageInterface;
use Composer\Util\Filesystem;
use Composer\Package\Dumper\ArrayDumper;
use Composer\Plugin\PluginInterface;
use Composer\Repository\CompositeRepository;
use Composer\Package\CompletePackage;
use Composer\Package\RootPackage;
use Composer\Json\JsonFile;
use Composer\Script\ScriptEvents;
use Composer\EventDispatcher\EventSubscriberInterface;

/**
 * RootContainer Installer for Composer.
 * (based on RobLoach's code for ComponentInstaller)
 */
class MoufPlugin implements PluginInterface {

	public function activate(Composer $composer, IOInterface $io) {
		$moufLibraryInstaller = new MoufLibraryInstaller($io, $composer);
		$composer->getInstallationManager()
				->addInstaller($moufLibraryInstaller);

	}

}
