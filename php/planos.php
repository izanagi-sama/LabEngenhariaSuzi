<?php
//implementação para teste do frontend:
/**
header('Content-type: application/json; charset=utf-8');
echo json_encode(['planos' => [ 
        [ 'id' => 2, 'nome' => 'Trabalho 2', valor => 10.0, 'descricaoCurta' => 'asdasd' ],
        [ 'id' => 3, 'nome' => 'Trabalho 3', valor => 10.0, 'descricaoCurta' => 'asdasd' ],
        [ 'id' => 7, 'nome' => 'Trabalho 7', valor => 10.0, 'descricaoCurta' => 'asdasd' ]
        ]]);
exit;
/**/

header('Content-type: application/json; charset=utf-8');

use \Firebase\JWT\JWT;
require_once("vendor/autoload.php");
require_once("config/config.php");
include("recebe-jwt.php");

$id = $token->data->id;

try{
    $pdo = new PDO($config->bd->dsn, $config->bd->user, $config->bd->password);
    if($config->debug) {
        //permite que mensagens de erro sejam mostradas
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }
   
    $stmt = $pdo->prepare('SELECT * FROM planos');
    $stmt->execute();
    
    if($row = $stmt->fetchAll(PDO::FETCH_ASSOC)) {
            $dados = ['planos' => $row];
           $return = json_encode($dados);
        echo $return;
    } else {
        //TODO: Enviar a mensagem de erro retornada pelo PDO
        echo json_encode(['resultado' => false, 'mensagem' => 'Erro ao retornar dados do Banco de Dados']);
    }
    
} catch (PDOException $e) {
    echo json_encode(['resultado' => false, 'mensagem' => 'Connection failed: ' . $e->getMessage()]);
}

$conn = null;

exit;