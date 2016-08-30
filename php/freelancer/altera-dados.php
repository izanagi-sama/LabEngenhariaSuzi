<?php
//implementação para teste do frontend:
header('Content-type: application/json; charset=utf-8');

require_once("../config.php");

$freela = array();

$input = @json_decode(file_get_contents("php://input"));

//TODO: verificar o JWT
if (isset($input['id_freelancer'])){
    //$freela['id_freelancer'] = $input['id_freelancer']; //recebe via JWT
    $freela['nome']  = $input['nome'];
    $freela['email'] = $input['email'];
    $freela['cpf']   = $input['cpf'];
    $freela['senha'] = $input['senha'];
    //TODO: faltou especialidade $input['especialidade--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------']
} else {
    echo json_encode(['resultado' => false, 'mensagem' => 'Requisição invalida']);
    exit;
}

try{
    $conn = new PDO($dsn, $user, $password);
    //TODO: use a API de subtituição de parametros, isso é MUITO errado
    $query = "UPDATE freelancer SET nome = '".$freela['nome']."', email = '".$freela['email']."', cpf = '".$freela['cpf']."', senha = '".$freela['senha']."' WHERE id_freelancer = ".$freela['id_freelancer'];
    if($conn->exec($query)){echo json_encode(['resultado' => true]);}
    
} catch (PDOException $e) {
    //O retorno é todo em JSON, jamas faça isso:
    //echo 'Connection failed: ' . $e->getMessage();
    echo json_encode(['resultado' => false, 'mensagem' => 'Erro no Banco de Dados']);
}

$conn = null;

exit;