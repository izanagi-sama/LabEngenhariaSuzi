<?php
header('Content-type: application/json; charset=utf-8');

use \Firebase\JWT\JWT;
require_once("../vendor/autoload.php");
require_once("../config.php");
include("../recebe-jwt.php");

$id = $token->data->id;

try{
    $pdo = new PDO($dsn, $user, $password);
   
    $stmt = $pdo->prepare('SELECT nome,email,cpf AS cpfcnpj FROM freelancer WHERE id_freelancer = :id');
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    
    $stmt->execute();
    
    if($row = $stmt->fetch(PDO::FETCH_OBJ)) {
        echo json_encode($row);
    } else {
        //TODO: Enviar a mensagem de erro retornada pelo PDO
        echo json_encode(['resultado' => false, 'mensagem' => 'Erro ao retornar dados do Banco de Dados']);
    }
    
} catch (PDOException $e) {
    echo json_encode(['resultado' => false, 'mensagem' => 'Connection failed: ' . $e->getMessage()]);
}

$conn = null;

exit;
