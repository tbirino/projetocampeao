<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../controller/UfController.php';

$app = new Silex\Application();
$ufController = new UfController();

$app->get('/buscarTodas', function () use ($ufController) {
    return $ufController->buscarTodas();
});


$app->run();