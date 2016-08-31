<?php
    // instancia objeto PDO, conectando no Mysql
    try {
    
    
    /* Connect to a MySQL database using driver invocation */
$dsn = 'mysql:dbname=mporn;host=localhost';
$user = 'root';
$password = '';

try {
    $conn = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
    
    //Carregando especialidades
    /**
    $conn->exec("INSERT INTO especialidade (nome, descricao) VALUES ('JAVA','Java para web')");
    $conn->exec("INSERT INTO especialidade (nome, descricao) VALUES ('JAVA','Java para desktop')");
    $conn->exec("INSERT INTO especialidade (nome, descricao) VALUES ('PHP','Desenvolvimento Web Back-End')");
    $conn->exec("INSERT INTO especialidade (nome, descricao) VALUES ('C#','Desenvolvimento desktop')");
    $conn->exec("INSERT INTO especialidade (nome, descricao) VALUES ('C#','Desenvolvimento web')");
    $conn->exec("INSERT INTO especialidade (nome, descricao) VALUES ('Python','Desenvolvimento web')");
    $conn->exec("INSERT INTO especialidade (nome, descricao) VALUES ('HTML5','Linguagem de marcação')");
    $conn->exec("INSERT INTO especialidade (nome, descricao) VALUES ('CSS3','Folhas de estilos')");
    $conn->exec("INSERT INTO especialidade (nome, descricao) VALUES ('JavaScript','Desenvolvimento web')");
    $conn->exec("INSERT INTO especialidade (nome, descricao) VALUES ('JQuery','Framework')");
    $conn->exec("INSERT INTO especialidade (nome, descricao) VALUES ('AngularJS','Framework')");
    /**/
    
    //Carregando freelancers
    /**
    $conn->exec("INSERT INTO freelancer (nome, email, cpf, senha) VALUES ('Fabricio','fabriciopbrb@gmail.com', '03939223913', '123456')");
    $conn->exec("INSERT INTO freelancer (nome, email, cpf, senha) VALUES ('Paulo','paulolindo@hotmail.com', '02993224512', '123456')");
    $conn->exec("INSERT INTO freelancer (nome, email, cpf, senha) VALUES ('Rubens','rubensbraga@gmail.com', '46467982465', '123456')");
    $conn->exec("INSERT INTO freelancer (nome, email, cpf, senha) VALUES ('Arthur','arthurbrasil@gmail.com', '46582795426', '123456')");
    $conn->exec("INSERT INTO freelancer (nome, email, cpf, senha) VALUES ('Capucho','capuchobarbieri@gmail.com', '01247885296', '123456')");
    /**/
    
    //Carrega freelancer_especialidade
    /**
    $conn->exec("INSERT INTO freelancer_especialidade (id_freelancer, id_especialidade) VALUES ('1','3')");
    $conn->exec("INSERT INTO freelancer_especialidade (id_freelancer, id_especialidade) VALUES ('1','6')");
    $conn->exec("INSERT INTO freelancer_especialidade (id_freelancer, id_especialidade) VALUES ('1','7')");
    $conn->exec("INSERT INTO freelancer_especialidade (id_freelancer, id_especialidade) VALUES ('1','8')");
    
    $conn->exec("INSERT INTO freelancer_especialidade (id_freelancer, id_especialidade) VALUES ('2','1')");
    $conn->exec("INSERT INTO freelancer_especialidade (id_freelancer, id_especialidade) VALUES ('2','2')");
    $conn->exec("INSERT INTO freelancer_especialidade (id_freelancer, id_especialidade) VALUES ('2','10')");
    $conn->exec("INSERT INTO freelancer_especialidade (id_freelancer, id_especialidade) VALUES ('2','11')");
    
    $conn->exec("INSERT INTO freelancer_especialidade (id_freelancer, id_especialidade) VALUES ('3','1')");
    $conn->exec("INSERT INTO freelancer_especialidade (id_freelancer, id_especialidade) VALUES ('3','2')");
    $conn->exec("INSERT INTO freelancer_especialidade (id_freelancer, id_especialidade) VALUES ('3','3')");
    $conn->exec("INSERT INTO freelancer_especialidade (id_freelancer, id_especialidade) VALUES ('3','4')");
    
    $conn->exec("INSERT INTO freelancer_especialidade (id_freelancer, id_especialidade) VALUES ('4','4')");
    $conn->exec("INSERT INTO freelancer_especialidade (id_freelancer, id_especialidade) VALUES ('4','5')");
    $conn->exec("INSERT INTO freelancer_especialidade (id_freelancer, id_especialidade) VALUES ('4','10')");
    $conn->exec("INSERT INTO freelancer_especialidade (id_freelancer, id_especialidade) VALUES ('4','11')");
    
    $conn->exec("INSERT INTO freelancer_especialidade (id_freelancer, id_especialidade) VALUES ('5','4')");
    $conn->exec("INSERT INTO freelancer_especialidade (id_freelancer, id_especialidade) VALUES ('5','5')");
    $conn->exec("INSERT INTO freelancer_especialidade (id_freelancer, id_especialidade) VALUES ('5','7')");
    $conn->exec("INSERT INTO freelancer_especialidade (id_freelancer, id_especialidade) VALUES ('5','8')");
    /**/
    
    //fecha conexão
    $conn = null;
    }
    catch (PDOException $e) {
        // caso ocorra uma exceção, exibe na tela
        print "Erro!: ".$e->getMessage()."\n";
    }
?>