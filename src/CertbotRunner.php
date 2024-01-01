<?php

namespace Reneknox\LetsEncrypt;


class CertbotRunner {
    public function runCertbot($domains, $email) {
        echo "Running Certbot... <br>";

        $certbotCommand = "sudo certbot --apache -d " . implode(' -d ', $domains);
        $descriptorSpec = [
            0 => ["pipe", "r"], // stdin
            1 => ["pipe", "w"], // stdout
            2 => ["pipe", "w"], // stderr
        ];

        $process = proc_open($certbotCommand, $descriptorSpec, $pipes);

        if (is_resource($process)) {
            fwrite($pipes[0], $email . PHP_EOL); // Enter email address
            fwrite($pipes[0], "y" . PHP_EOL); // Agree to terms and conditions
            fwrite($pipes[0], "y" . PHP_EOL); // Agree to share email with EFF
            fclose($pipes[0]);

            echo stream_get_contents($pipes[1]); // Output of certbot command
            fclose($pipes[1]);

            echo stream_get_contents($pipes[2]); // Error output, if any
            fclose($pipes[2]);

            $returnValue = proc_close($process);
            if ($returnValue === 0) {
                echo "Certbot command executed successfully. <br>";
            } else {
                echo "Error executing Certbot command. <br>";
            }
        }
    }
}
