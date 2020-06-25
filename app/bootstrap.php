<?php

require_once './vendor/autoload.php';

//connecting DI
$containerBuilder = new DI\ContainerBuilder;
$containerBuilder->addDefinitions('/config.php');

try {
    $container = $containerBuilder->build();
} catch (Exception $e) {
    throw $e;
}

return $container;