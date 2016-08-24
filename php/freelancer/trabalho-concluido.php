<?php
//implementação para teste do frontend:
header('Content-type: application/json; charset=utf-8');
echo json_encode(['planos' => [ 
        [ 'id' => 5, 'nome' => 'Trabalho 5', 'plano' => 2, 'descricao' => 'asdasd' ],
        [ 'id' => 18, 'nome' => 'Trabalho 18', 'plano' => 2, 'descricao' => 'asdasd' ]
        ]]);
exit;