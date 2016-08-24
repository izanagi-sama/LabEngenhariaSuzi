<?php
//implementação para teste do frontend:
header('Content-type: application/json; charset=utf-8');
echo json_encode(['planos' => [ 
        [ 'id' => 2, 'nome' => 'Trabalho 2', valor => 10.0, 'descricaoCurta' => 'asdasd' ],
        [ 'id' => 3, 'nome' => 'Trabalho 3', valor => 10.0, 'descricaoCurta' => 'asdasd' ],
        [ 'id' => 7, 'nome' => 'Trabalho 7', valor => 10.0, 'descricaoCurta' => 'asdasd' ]
        ]]);
exit;