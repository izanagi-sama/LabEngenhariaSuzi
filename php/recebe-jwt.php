<?php

use \Firebase\JWT\JWT;
//recebe o JWT
$jwt = sscanf(apache_request_headers()["authorization"], 'Bearer %s')[0];
if (!$jwt) { //verfifica se o usuario foi autenticado
    echo json_encode(['resultado' => false, 'mensagem' => 'Usuario não autenticado']); //envia resposta de erro
    exit;
}

$horaAtual = time();
$token = '';
try{
    $token = JWT::decode($jwt,$config->jwtKey, array('HS256')); //verifica se o JWT ainda é valido
}catch(BeforeValidException $e) {
    echo json_encode(['resultado' => false, 'mensagem' => 'Autenticação feita no futuro (verifique relógio): ' . $e->getMessage()]); //envia resposta de erro
    exit;
}catch(ExpiredException $e) {
    echo json_encode(['resultado' => false, 'mensagem' => 'Autenticação Expirada: ' . $e->getMessage()]); //envia resposta de erro
    exit;
}catch(Exception $e){
    echo json_encode(['resultado' => false, 'mensagem' => 'Autenticação invalida: ' . $e->getMessage()]); //envia resposta de erro
    exit;
}