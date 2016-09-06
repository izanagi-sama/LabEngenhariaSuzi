<?php

//implementação para teste do frontend:
header('Content-type: application/json; charset=utf-8');


use \Firebase\JWT\JWT;
require_once("../vendor/autoload.php");
require_once("../config.php");
include("../recebe-jwt.php");
$id = $token->data->id;

//Teste
//$id = 21;


try{
    $pdo = new PDO($dsn, $user, $password);
    
    deletaEspecialidades($dsn, $user, $password,$id);
   
    $stmt = $pdo->prepare('DELETE FROM freelancer WHERE id_freelancer = :id');
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    
    $stmt->execute();
    
    echo json_encode(['resultado' => true]);
    
} catch (PDOException $e) {
    echo json_encode(['resultado' => false, 'mensagem' => 'Connection failed: ' . $e->getMessage()]);
}

$pdo = null;

exit;

function deletaEspecialidades($dsn, $user, $password,$id){
    try{
    $pdo = new PDO($dsn, $user, $password);
    $stmt = $pdo->prepare("DELETE FROM freelancer_especialidade WHERE id_freelancer = :id");
    $stmt->bindParam(':id', $id,PDO::PARAM_INT);
    $stmt->execute();
    } catch(PDOException $e){
        
    }
    
    $pdo = null;
}
