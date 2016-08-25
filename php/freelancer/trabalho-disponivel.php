<?php
//implementação para teste do frontend:
header('Content-type: application/json; charset=utf-8');
echo json_encode(['trabalhos' => [ 
        [ 'id' => 2, 'nome' => 'Trabalho 2', 'plano' => 2, 'descricao' => 'asdasd' ],
        [ 'id' => 3, 'nome' => 'Trabalho 3', 'plano' => 2, 'descricao' => 'asdasd' ]
        ]]);
exit;
            