<?php

namespace Reneknox\LetsEncrypt;

class PackageManager
{
    public function isPackageInstalled($packageName) {
        $command = $packageName . ' --version 2>&1';
        $output = shell_exec($command);
        return !str_contains($output, 'certbot: command not found');
    }
}
