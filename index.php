<?php
declare(strict_types=1);

if (file_exists('vendor/autoload.php')) {
    require ('vendor/autoload.php');
}

require('config/config.php');
$dispatcher = new \App\Controller\Dispatcher;
$dispatcher->dispatch();
