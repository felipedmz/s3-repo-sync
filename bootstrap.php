<?php
/**
 * Autoload
 */
require 'vendor/autoload.php';

/**
 * Load Configs
 */
$config = parse_ini_file(__DIR__."/config.ini", true);
//
define("APP_BASE_PATH", __DIR__);
//
define("UPLOAD_ENABLED", (bool)$config["app"]["upload_enabled"]);
define("SYNC_DIRECTORY", $config["app"]["sync_directory"]);
//
define("S3_BUCKET_NAME", $config["s3"]["bucket_name"]);
define("S3_BUCKET_USER", $config["s3"]["bucket_user"]);
define("S3_ACCESS_KEY",  $config["s3"]["access_key"]);
define("S3_SECRET_ACCESS_KEY", $config["s3"]["secret_access_key"]);
define("S3_VERSION", $config["s3"]["version"]);
define("S3_REGION",  $config["s3"]["region"]);
