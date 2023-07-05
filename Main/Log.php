<?php
require '../vendor/autoload.php';

use Monolog\Handler\StreamHandler;
use Monolog\Handler\BrowserConsoleHandler;
use Monolog\Logger;

    $logger = new Logger("web");
    $logger->pushHandler(new BrowserConsoleHandler(Logger::DEBUG));
    $logger->pushHandler(new StreamHandler(__DIR__ . "/log.txt", Logger::WARNING));
    $logger->pushProcessor(function ($record){
        $record["extra"]["server"] = $_SERVER;
        return $record;
    });

    $logger->debug("Debug!", ["logger"=>True]);
    $logger->info("Info!", ["logger"=>True]);
    $logger->notice("Notice!", ["logger"=>True]);
    $logger->warning("Warning!", ["logger"=>True]);
    $logger->error("Error!", ["logger"=>True]);
?>