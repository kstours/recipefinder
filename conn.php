<?php
require_once __DIR__ . '/vendor/autoload.php';

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

$serverName = $_ENV['DB_HOST'];
$userName = $_ENV['DB_USER'];
$passWord = $_ENV['DB_PASS'];
$dbName = $_ENV['DB_NAME'];
$dbPort = $_ENV['DB_PORT'];

$connection = mysqli_connect($serverName, $userName, $passWord, $dbName);

if (mysqli_connect_errno()) {
    exit();
}
if(session_status() === PHP_SESSION_NONE) {
session_start();
}


?>
