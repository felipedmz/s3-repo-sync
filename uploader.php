<?php
/**
 * @author Felipe Maziero <flpmaziero@gmail.com>
 * @see config.ini file
 */

require 'bootstrap.php';

echo "\nSync Directory = " . SYNC_DIRECTORY;
//
// $git = new \Bot\Git();
// echo "\nChecking ou  t to stable version\n";
// echo $git->checkoutTo("master");
// echo "\nUpdating (pull)...\n";
// echo $git->pull();
// echo "\n-----------------\n";
//
echo "\nUpload Enabled = " . ((UPLOAD_ENABLED) ? "YES" : "NO");
//
echo "\n\nRunning...";
$uploader = new \Bot\Uploader();
echo "\nSee logs at: " . $uploader->getLogPath();
$uploader->run();
echo "\n\nDone.\n\n";
