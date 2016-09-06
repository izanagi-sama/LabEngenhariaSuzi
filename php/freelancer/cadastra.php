<?php
//implementação para teste do frontend:
header('Content-type: application/json; charset=utf-8');

require_once("../config.php");

$input = @json_decode(file_get_contents("php://input"));


if(!isset($input->nome)){echo json_encode(['resultado' => false]); exit;}
if(!isset($input->email)){echo json_encode(['resultado' => false]); exit;}

try{
    
    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
  
    $sql = "INSERT INTO freelancer (nome, email, cpf, senha) VALUES (:nome, :email, :cpf, :senha)";
    
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':nome', $input->nome, PDO::PARAM_STR);
    $stmt->bindParam(':email', $input->email, PDO::PARAM_STR);
    $stmt->bindParam(':cpf', $input->cpfcnpj, PDO::PARAM_STR);
    $stmt->bindParam(':senha', md5($input->senha), PDO::PARAM_STR);
    $stmt->execute();
    
    $id_freelancer = $pdo->lastInsertId();
   
    foreach ($input->especialidade as $esp){
     
        $sql = "Insert into freelancer_especialidade values (:free,:esp)";
        
        $stmt = $pdo->prepare( $sql );
        $stmt->bindParam(':free', $id_freelancer, PDO::PARAM_INT);
        $stmt->bindParam(':esp', $esp, PDO::PARAM_INT);
        $stmt->execute();
    }
    
    echo json_encode(['resultado' => true]);
    
} catch (PDOException $e) {
    //O retorno é todo em JSON, jamas faça isso:
    //echo 'Connection failed: ' . $e->getMessage();
    echo json_encode(['resultado' => false, 'mensagem' => 'Erro no Banco de Dados']);
}

$conn = null;

exit;
