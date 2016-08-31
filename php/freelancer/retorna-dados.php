<?php

//implementação para teste do frontend:
header('Content-type: application/json; charset=utf-8');


use \Firebase\JWT\JWT;
require_once("../vendor/autoload.php");

require_once("../config.php");
include("../recebe-jwt.php");



$freela = array();

$input = @json_decode(file_get_contents("php://input"));

/** //Será recebido de dentro do JWT
if (isset($input['id_freelancer'])){
    $freela = $input['id_freelancer'];
    
} else {
    echo json_encode(['resultado' => false]);
    exit;
}
/**/ //não! o id é recebido de dentro do JWT
$id = $token->data->id;


try{
    $conn = new PDO($dsn, $user, $password);
    //TODO: use a API de subtituição de parametros, isso é MUITO errado, você poderia pelo menos verificar se a tipo é INT
    //TODO: especialidades
    $stmt = $conn->prepare('SELECT nome,email,cpf as cpfcnpj FROM freelancer WHERE id_freelancer = :id');
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