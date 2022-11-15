<?php

require_once './vendor/autoload.php';
use app\core\Application;
use app\core\Request;
use \app\controllers\SiteController;
use app\controllers\AuthController;
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$config = [
    'db'=>[
        'dsn' =>  $_ENV['DSN'] ,
        'user' =>  $_ENV['DB_USER'],
        'password' => $_ENV['DB_PASSWORD']
    ]
];

$app = new Application(__DIR__,$config);

$app->db->applyMigration();
