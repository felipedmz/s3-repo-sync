<?php
/**
 * @author Felipe Maziero <felipe.pereira@trigg.com.br>
 * @copyright 2017 Trigg, Emprestto
 * @see config.ini file
 */

require 'bootstrap.php';

echo "\nSync Directory = " . SYNC_DIRECTORY;
//
$git = new \Bot\Git();
echo "\nChecking out to stable version\n";
echo $git->checkoutTo("master");
echo "\nUpdating (pull)...\n";
echo $git->pull();
echo "\n-----------------\n";
//
echo "\nUpload Enabled = " . ((UPLOAD_ENABLED) ? "YES" : "NO");
//
echo "\n\nRunning...";
$uploader = new \Bot\Uploader();
echo "\nSee logs at: " . $uploader->getLogPath();
$uploader->run();
echo "\n\nDone.\n\n";
