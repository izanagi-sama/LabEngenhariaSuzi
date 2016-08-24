<?php
//implementação para teste do frontend:
header('Content-type: application/json; charset=utf-8');
echo json_encode(['especialidades' => [ 
        [ 'id' => 2, 'nome' => 'HTML',      'descricao-curta' => 'asdasd' ],
        [ 'id' => 3, 'nome' => 'PHP',       'descricao-curta' => 'asdasd' ],
        [ 'id' => 7, 'nome' => 'Sysadmin',  'descricao-curta' => 'asdasd' ]
        ]]);
exit;


