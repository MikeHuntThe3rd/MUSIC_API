<?php
session_start();

include __DIR__ . '/../vendor/autoload.php';
use Music\DB\dbCREATE;
use Music\Routing\Router;

$base_conn = new dbCREATE(["host" => "localhost", "user" => "root", "password" => "", "database" => "mysql"]);
if(!$base_conn->Exists()){
    $base_conn->Create();
}
$router = new Router();
$router->ReqHandle();