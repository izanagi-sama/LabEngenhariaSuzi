<?php
//implementação para teste do frontend:
header('Content-type: application/json; charset=utf-8');

$freela = array();
$dsn = 'mysql:dbname=mporn;host=localhost';
$user = 'root';
$password = '';

if (isset($_POST['id_freelancer'])){
    $freela['id_freelancer'] = $_POST['id_freelancer'];
    $freela['nome']  = $_POST['nome'];
    $freela['email'] = $_POST['email'];
    $freela['cpf']   = $_POST['cpf'];
    $freela['senha'] = $_POST['senha'];
} else {
    echo json_encode(['resultado' => false]);
    exit;
}

try{
    $conn = new PDO($dsn, $user, $password);
    $query = "UPDATE freelancer SET nome = '".$freela['nome']."', email = '".$freela['email']."', cpf = '".$freela['cpf']."', senha = '".$freela['senha']."' WHERE id_freelancer = ".$freela['id_freelancer'];
    if($conn->exec($query)){echo json_encode(['resultado' => true]);}
    
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
    echo json_encode(['resultado' => false]);
}

$conn = null;

exit;