<?php

use \Firebase\JWT\JWT;
require_once("../vendor/autoload.php");

require_once("../config.php");

//implementação para teste do frontend:
header('Content-type: application/json; charset=utf-8');

// converto o input em json; o "@" remove a mensagem de erro (caso existir)
$input = @json_decode(file_get_contents("php://input"));

//caso não receber o login e senha, retornar um erro
if($input == null or !isset($input->login) or !isset($input->senha)) {
    //envia resposta de erro
    echo json_encode(['resultado' => false, 'mensagem' => 'Requisição invalida']);
    exit;
}

$horaAtual = time();
$token = [
    'iat'  => $horaAtual,                            // Issued at: time when the token was generated
    'jti'  => base64_encode(mcrypt_create_iv(32)),   // Json Token Id: an unique identifier for the token
    'iss'  => $nomeServidor,                         // Issuer
    'nbf'  => $horaAtual,                            // Not before
    'exp'  => $horaAtual + (60*60),                  // Expire
    'data' => null                                   // Data to be signed
];

//TODO: Verifica no Banco de dados
if($input->login == "admin@exemple.com" or $input->senha == "123qwe") { //usuario é valido
    //TODO: recveber id de dentro do DB, enquanto isso fica de exemplo
    $id = 1;
    $usuario = (object) ['id' => $id, 'email' => $input->login];
    $token['data'] = $usuario; //adiciona o login aos dados que seram assinados pelo jwt
    $jwt = JWT::encode($token, $JWTkey, 'HS256'); //assina os dados do usuario
    echo json_encode(['resultado' => true, 'jwt' => $jwt]); //envia a resposta json
    
} else { //não encontrou o usuario
    //envia resposta de erro
    echo json_encode(['resultado' => false, 'mensagem' => 'Login ou Senha Invalido']);
}