<?php

namespace Reneknox\LetsEncrypt;

class CronJobManager {
    public function setupRenewalCronJob() {
        echo "Setting up cron job for renewal..." . PHP_EOL;
        $renewCommand = "certbot renew";
        shell_exec("(crontab -l ; echo '$renewCommand') | crontab -");
    }
}