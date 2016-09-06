<?php
//implementação para teste do frontend:
header('Content-type: application/json; charset=utf-8');

require_once("../config.php");

$freela = array();

$input = @json_decode(file_get_contents("php://input"));

//TODO: verificar o JWT não somente o nome
if (isset($input['nome'])){
    $freela['nome']  = $input['nome'];
    $freela['email'] = $input['email'];
    $freela['cpf']   = $input['cpf'];
    $freela['senha'] = $input['senha'];
} else {
    echo json_encode(['resultado' => false, 'mensagem' => 'Requisição invalida']);
    exit;
}

if($freela['nome'] == ''){echo json_encode(['resultado' => false]); exit;}
if($freela['email'] == ''){echo json_encode(['resultado' => false]); exit;}

try{
    
    $conn = new PDO($dsn, $user, $password);
    //TODO: use a API de subtituição de parametros, isso é MUITO errado
    $query = "INSERT INTO freelancer (nome, email, cpf, senha) VALUES ('".$freela['nome']."','".$freela['email']."', '".$freela['cpf']."', '".$freela['senha']."')";
    if($conn->exec($query)){echo json_encode(['resultado' => true]);}
    
} catch (PDOException $e) {
    //O retorno é todo em JSON, jamas faça isso:
    //echo 'Connection failed: ' . $e->getMessage();
    echo json_encode(['resultado' => false, 'mensagem' => 'Erro no Banco de Dados']);
}

$conn = null;

exit;