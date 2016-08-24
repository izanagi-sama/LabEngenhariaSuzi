<?php
//implementação para teste do frontend:
header('Content-type: application/json; charset=utf-8');
echo json_encode(['nome' => 'Freelancer1', 'email'=> 'email@example.com', 'cpf'=> '123123123', 'senha'=> 'asdasd', 'espcialidade'=> [2, 5, 7]]);
exit;

