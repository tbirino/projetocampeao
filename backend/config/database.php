<?php
require __DIR__ . '/../vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as Db;

//configurações de acesso ao banco
$db_config = [
    'host' => 'localhost',
    'name' => 'projetocampeao',
    'user' => 'root',
    'pass' => ''
];

$db = new Db;

$db->addConnection([
    'driver' => 'mysql',
    'host' => $db_config['host'],
    'database' => $db_config['name'],
    'username' => $db_config['user'],
    'password' => $db_config['pass'],
    'charset' => 'utf8',
    'collation' => 'utf8_general_ci',
    'prefix' => '',
]);

$db->setAsGlobal();
$db->bootEloquent();