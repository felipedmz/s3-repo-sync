<?php namespace Bot;

use Monolog\Logger as Monologger;
use Monolog\Handler\StreamHandler;

/**
 * Encapsulamento do Monolog
 *
 * Class Logger
 * @package Bot
 */
class Logger
{
    /**
     * @return Monologger
     */
    public static function load()
    {
        $driver = new Monologger('upload-s3');
        $driver->pushHandler(
            new StreamHandler(
                APP_BASE_PATH."/log/".date("Y-m-d_H:i:s").".log",
                Monologger::DEBUG
            )
        );
        return $driver;
    }
}