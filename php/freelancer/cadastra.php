<?php
//implementação para teste do frontend:
header('Content-type: application/json; charset=utf-8');

require_once("../config.php");

$freela = array();

include("../recebe-jwt.php"); // Aqui ele já verifica o jwt, mas não sei como é o jwt quando o cliente ainda não é cadastrado
$input = @json_decode(file_get_contents("php://input"));


//Teste interno
//$input = array("nome" => "Astolfa","email" => "juirana@gmail.com", "cpf" => "0344322345", "senha"=>"asdf","especialidade" => [3,6,8]);

if (isset($input['nome'])){
    $freela['nome']  = $input['nome'];
    $freela['email'] = $input['email'];
    $freela['cpf']   = $input['cpf'];
    $freela['senha'] = $input['senha'];
} else {
    echo json_encode(['resultado' => false, 'mensagem' => 'Requisição invalida']);
    exit;
}

if($freela['nome'] == ''){echo json_encode(['resultado' => false]); exit;}
if($freela['email'] == ''){echo json_encode(['resultado' => false]); exit;}

try{
    
    $pdo = new PDO($dsn, $user, $password);
  
    $sql = "INSERT INTO freelancer (nome, email, cpf, senha) VALUES (:nome,:email, :cpf, :senha)";
    
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':nome', $freela['nome']);
    $stmt->bindParam(':email', $freela['email']);
    $stmt->bindParam(':cpf', $freela['cpf']);
    $stmt->bindParam(':senha', md5( $freela['senha'] ));
    $stmt->execute();
    
    $id_freelancer = $pdo->lastInsertId();
   
    
    foreach ($input['especialidade'] as $esp){
     
        $sql = "Insert into freelancer_especialidade values (:free,:esp)";
        
        $stmt = $pdo->prepare( $sql );
        $stmt->bindParam(':free', $id_freelancer,PDO::PARAM_INT);
        $stmt->bindParam(':esp', $esp,PDO::PARAM_INT);
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
