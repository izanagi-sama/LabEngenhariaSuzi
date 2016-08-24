<?php
//implementação para teste do frontend:
header('Content-type: application/json; charset=utf-8');
echo json_encode(['especialidades' => [ 
        [ 'id' => 2, 'nome' => 'HTML',      'descricaoCurta' => 'asdasd' ],
        [ 'id' => 3, 'nome' => 'PHP',       'descricaoCurta' => 'asdasd' ],
        [ 'id' => 7, 'nome' => 'Sysadmin',  'descricaoCurta' => 'asdasd' ]
        ]]);
exit;


