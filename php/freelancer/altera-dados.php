<?php
//implementação para teste do frontend:
header('Content-type: application/json; charset=utf-8');


$freela = array();

use \Firebase\JWT\JWT;
require_once("../vendor/autoload.php");

require_once("../config.php");

//desligar no teste
include("../recebe-jwt.php");

$id = null;

//desligar no teste
$id = $token->data->id;
//desligar no teste
$input = @json_decode(file_get_contents("php://input"));


//Teste - ligar
//$input =   array("nome" => "Fabricio Oficial", "email"=>"fabriciopbrb@gmail.com", "cpf"=>"03939223913","senha"=>"asdf","especialidade"=>[3,6,7,8]); 
//$id = 1;



//TODO: verificar o JWT
if ($id !== null){
    $freela['id_freelancer'] = $id; //recebe via JWT  ???? Procurei aqui nos arquivos e não descobri como pegar o id pelo JWT...
    $freela['nome']  = $input['nome'];
    $freela['email'] = $input['email'];
    $freela['cpf']   = $input['cpf'];
    $freela['senha'] = $input['senha'];
    $esp = $input['especialidade'];
    
    esp($esp,$id,$dsn,$user, $password);
  
    
    /*Não dá pra usar especialidades na mesma tela que altera dados... as especialidades têm que ser acrescentadas em outra tela...
     * Ou a mesma tela vai fazer uma chamada pra ir acrescentando ou deletando uma especialidade por vez....
     */
    
    
} else {
    echo json_encode(['resultado' => false, 'mensagem' => 'Requisição invalida']);
    exit;
}

try{
    $pdo = new PDO($dsn, $user, $password);
    $query = "UPDATE freelancer SET nome = :nome, email = :email, cpf = :cpf, senha = :senha WHERE id_freelancer = :id_freelancer";
    
    $stmt = $pdo->prepare( $query );
    $stmt->bindParam(':nome',$freela['nome']);
    $stmt->bindParam(':email', $freela['email']);
    $stmt->bindParam(':cpf', $freela['cpf']);
    $stmt->bindParam(':senha', $freela['senha']);
    $stmt->bindParam(':id_freelancer', $freela['id_freelancer'],PDO::PARAM_INT);
    
    $result = $stmt->execute();
    
    esp($esp);
    
    if(!$result){
        echo json_encode(['resultado' => false, 'mensagem' => 'Erro no Banco de Dados01']);
        exit;
    } else {
        echo json_encode(['resultado' => true]);
    }
    
} catch (PDOException $e) {
    //O retorno é todo em JSON, jamas faça isso:
    //echo 'Connection failed: ' . $e->getMessage();
    echo json_encode(['resultado' => false, 'mensagem' => 'Erro no Banco de Dados02']);
}

$pdo = null;

exit;

function esp($esp,$id,$dsn, $user, $password){
    
    try {
        

        
        $PDO = new PDO($dsn, $user, $password);
        $sql = "DELETE FROM freelancer_especialidade WHERE id_freelancer = :id";
        $stmt = $PDO->prepare( $sql );
        $stmt->bindParam( ':id', $id );
        $stmt->execute();
        
        foreach($esp as $num){
            $sql = "Insert into freelancer_especialidade(id_freelancer,id_especialidade) values (:id_free, :id_esp)";
            $stmt = $PDO->prepare( $sql );
            $stmt -> bindParam(':id_free', $id, PDO::PARAM_INT);
            $stmt ->bindParam(':id_esp', $num, PDO::PARAM_INT);
            $stmt -> execute();
        }
        $PDO = null;
        
        
        
    } catch (PDOException $e) {
        
    }

    
}
