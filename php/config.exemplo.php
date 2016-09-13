<?php

$config = new stdClass();
$config->debug = false;
$config->nomeServidor = "mporn-uvv";

$config->jwtKey = ''; //precisa ser adicionado manualmente

$config->bd = new stdClass();
$config->bd->dsn = 'mysql:dbname=mporn;host=localhost';

$config->bd->user = 'mporn';  //precisa ser adicionado manualmente
$config->bd->password = '3U10euxnvsTKi6Ai';  //precisa ser adicionado manualmente