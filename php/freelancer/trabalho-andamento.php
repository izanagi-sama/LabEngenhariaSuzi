<?php
//implementação para teste do frontend:
header('Content-type: application/json; charset=utf-8');
echo json_encode(['trabalhos' => [ 
        [ 'id' => 4, 'nome' => 'Trabalho 4', 'plano' => 2, 'descricao' => 'asdasd' ],
        [ 'id' => 7, 'nome' => 'Trabalho 7', 'plano' => 2, 'descricao' => 'asdasd' ]
        ]]);
exit;