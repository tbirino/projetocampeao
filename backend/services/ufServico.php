<?php
use Silex\Application;
require __DIR__.'/../vendor/autoload.php';
$app = new Application();
$app->get('/teste', function(){
    return 'Teste thales';
});
$app->run();