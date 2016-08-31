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
    $query = "Select * from freelancer where id_freelancer = {$id}";
    
    $result = $conn->query($query);
    
    if($result) {
        while ($row = $result->fetch(PDO::FETCH_OBJ)){
            echo json_encode($row);
        }
    }
    
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
    echo json_encode(['resultado' => false]);
}

$conn = null;

exit;