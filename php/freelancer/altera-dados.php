<?php
//implementação para teste do frontend:
header('Content-type: application/json; charset=utf-8');

require_once("../config.php");

$freela = array();

//Teste
//$input =   array("id_freelancer" => 1, "nome" => "Fabricio Mudado", "email"=>"fabriciopbrb@gmail.com", "cpf"=>"03939223913","senha"=>"asdf");  

$input = @json_decode(file_get_contents("php://input"));

//TODO: verificar o JWT
if (isset($input['id_freelancer'])){
    $freela['id_freelancer'] = $input['id_freelancer']; //recebe via JWT  ???? Procurei aqui nos arquivos e não descobri como pegar o id pelo JWT...
    $freela['nome']  = $input['nome'];
    $freela['email'] = $input['email'];
    $freela['cpf']   = $input['cpf'];
    $freela['senha'] = $input['senha'];
    
  
    
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
    
    if(!$result){
        echo json_encode(['resultado' => false, 'mensagem' => 'Erro no Banco de Dados']);
    } else {
        echo json_encode(['resultado' => true]);
    }
    
} catch (PDOException $e) {
    //O retorno é todo em JSON, jamas faça isso:
    //echo 'Connection failed: ' . $e->getMessage();
    echo json_encode(['resultado' => false, 'mensagem' => 'Erro no Banco de Dados']);
}

$pdo = null;

exit;
