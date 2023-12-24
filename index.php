<?php

use Reneknox\LetsEncrypt\CertbotInstaller;
use Reneknox\LetsEncrypt\CertbotRunner;
use Reneknox\LetsEncrypt\CronJobManager;

require_once './vendor/autoload.php';

// Usage:
$certbotInstaller = new CertbotInstaller();
$certbotInstaller->installIfNotInstalled('certbot');

$domains = [
//    "www.reneknox.com",
    "test321.reneknox.com",
    "test1.reneknox.com"
];

$email = "okandil273@gmail.com"; // Replace with the desired email address

$certbotRunner = new CertbotRunner();
$certbotRunner->runCertbot($domains, $email);

$cronJobManager = new CronJobManager();
$cronJobManager->setupRenewalCronJob();

echo "Script execut:ion completed." . PHP_EOL;