<?php

//implementação para teste do frontend:
header('Content-type: application/json; charset=utf-8');


use \Firebase\JWT\JWT;
require_once("../vendor/autoload.php");

require_once("../config.php");
include("../recebe-jwt.php");




$id = $token->data->id;


try{
    $pdo = new PDO($dsn, $user, $password);
   
    $stmt = $pdo->prepare('SELECT nome,email,cpf as cpfcnpj FROM freelancer WHERE id_freelancer = :id');
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    
    $stmt->execute();
    
    if($row = $stmt->fetch(PDO::FETCH_OBJ)) {
        echo json_encode($row);
    } else {
        echo json_encode(['resultado' => false]);
    }
    
} catch (PDOException $e) {
    echo json_encode(['resultado' => false, 'mensagem' => 'Connection failed: ' . $e->getMessage()]);
}

$conn = null;

exit;
