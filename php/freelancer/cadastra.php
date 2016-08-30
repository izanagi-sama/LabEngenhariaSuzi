<?php
//implementação para teste do frontend:
header('Content-type: application/json; charset=utf-8');

$freela = array();
$dsn = 'mysql:dbname=mporn;host=localhost';
$user = 'root';
$password = '';

if (isset($_POST['nome'])){
    $freela['nome']  = $_POST['nome'];
    $freela['email'] = $_POST['email'];
    $freela['cpf']   = $_POST['cpf'];
    $freela['senha'] = $_POST['senha'];
} else {
    echo json_encode(['resultado' => false]);
    exit;
}

if($freela['nome'] == ''){echo json_encode(['resultado' => false]); exit;}
if($freela['email'] == ''){echo json_encode(['resultado' => false]); exit;}

try{
    
    $conn = new PDO($dsn, $user, $password);
    
    $query = "INSERT INTO freelancer (nome, email, cpf, senha) VALUES ('".$freela['nome']."','".$freela['email']."', '".$freela['cpf']."', '".$freela['senha']."')";
    if($conn->exec($query)){echo json_encode(['resultado' => true]);}
    
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
    
    echo json_encode(['resultado' => false]);
}

$conn = null;

exit;