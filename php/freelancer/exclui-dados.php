<?php
//implementação para teste do frontend:
header('Content-type: application/json; charset=utf-8');

$freela = "";
$dsn = 'mysql:dbname=mporn;host=localhost';
$user = 'root';
$password = '';

if (isset($_POST['id_freelancer'])){
    $freela = $_POST['id_freelancer'];
    
} else {
    echo json_encode(['resultado' => false]);
    exit;
}

try{
    $conn = new PDO($dsn, $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $stmt = $conn->prepare('DELETE FROM freelancer WHERE id_freelancer = :id');
    $stmt->bindParam(':id', $freela); 
    if($stmt->execute()){echo json_encode(['resultado' => true]);}
    
   
    
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
    echo json_encode(['resultado' => false]);
}

$conn = null;

exit;