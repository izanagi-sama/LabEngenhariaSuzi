<?php
//implementação para teste do frontend:
header('Content-type: application/json; charset=utf-8');
echo json_encode(['nome' => 'Freelancer1', 'email'=> 'email@example.com', 'cpfcnpj'=> '12312312313', 'senha'=> 'asdasd', 'especialidade'=> ["2", "3", "7"]]);
exit;

