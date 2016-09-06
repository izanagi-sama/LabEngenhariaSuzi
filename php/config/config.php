<?php
require_once('senhas.php');

$config = new stdClass();
$config->debug = false;
$config->nomeServidor = "mporn-uvv";
$config->jwtKey = JWT_KEY;

$config->bd = new stdClass();
$config->bd->dsn = 'mysql:dbname=mporn;host=localhost';
$config->bd->user = BD_USER;
$config->bd->password = BD_PASSWORD;

