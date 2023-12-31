<?php

namespace Reneknox\LetsEncrypt;


class CertbotInstaller {
    private $packageManager;

    public function __construct() {
        $this->packageManager = new PackageManager();
    }

    public function installIfNotInstalled($packageName) {
        if (!$this->packageManager->isPackageInstalled($packageName)) {
            echo "Installing $packageName..." . PHP_EOL;
            shell_exec('sudo amazon-linux-extras install epel -y');
            shell_exec("sudo yum update -y");
            shell_exec("sudo yum install $packageName python3-$packageName-apache -y");
        } else {
            echo "$packageName is already installed." . PHP_EOL;
        }
    }
}