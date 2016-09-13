<?php

$config = new stdClass();
$config->debug = false;
$config->nomeServidor = "mporn-uvv";

$config->jwtKey = ''; //precisa ser adicionado manualmente

$config->bd = new stdClass();
$config->bd->dsn = 'mysql:dbname=mporn;host=localhost';

$config->bd->user = 'mporn';  //precisa ser adicionado manualmente
$config->bd->password = '';  //precisa ser adicionado manualmente