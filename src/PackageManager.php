<?php

namespace Reneknox\LetsEncrypt;

class PackageManager
{
    public function isPackageInstalled($packageName) {
        $command = $packageName . ' --version';
        exec($command, $output, $returnCode);
        return $returnCode === 0;
    }
}