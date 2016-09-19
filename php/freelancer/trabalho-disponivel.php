<?php
//implementação para teste do frontend:
/*
header('Content-type: application/json; charset=utf-8');
echo json_encode(['trabalhos' => [ 
        [ 'id' => 2, 'nome' => 'Trabalho 2', 'plano' => 2, 'descricao' => 'asdasd' ],
        [ 'id' => 3, 'nome' => 'Trabalho 3', 'plano' => 2, 'descricao' => 'asdasd' ]
        ]]);
exit;
*/

header('Content-type: application/json; charset=utf-8');

use \Firebase\JWT\JWT;
require_once("../vendor/autoload.php");
require_once("../config.php");
include("../recebe-jwt.php");

$id = $token->data->id;
//$id = 1;
try{
    $pdo = new PDO($config->bd->dsn, $config->bd->user, $config->bd->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    if($config->debug) {
        //permite que mensagens de erro sejam mostradas
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }
   
   
   
    $stmt = $pdo->prepare('SELECT distinct t.id,t.nome,t.plano, t.descricao FROM trabalho t INNER JOIN plano_especialidade pe INNER JOIN freelancer_especialidade fe WHERE t.id_freelancer is null AND t.plano = pe.id_plano AND pe.id_especialidade = fe.id_especialidade AND fe.id_freelancer = :idfreelancer');
    
    
    
    $stmt->bindValue(':idfreelancer', $id, PDO::PARAM_INT);
    
    $stmt->execute();
    $trab = ['trabalhos'=>[]];
    if($row = $stmt->fetchAll(PDO::FETCH_ASSOC)) {
       // echo json_encode($row);
       
       
       foreach($row as $linha){
          $trab['trabalhos'][] = $linha; 
          
       }
       
       echo json_encode($trab);

    } else {
        //TODO: Enviar a mensagem de erro retornada pelo PDO
        echo json_encode(['resultado' => false, 'mensagem' => 'Erro ao retornar dados do Banco de Dados']);
    }
    
} catch (PDOException $e) {
    echo json_encode(['resultado' => false, 'mensagem' => 'Connection failed: ' . $e->getMessage()]);
}


function utf8_converter($array)
{
    array_walk_recursive($array, function(&$item, $key){
        if(!mb_detect_encoding($item, 'utf-8', true)){
                $item = utf8_encode($item);
        }
    });
 
    return $array;
}

$conn = null;

exit;