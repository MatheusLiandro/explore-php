<?php

//Recebe os campos do formulario
$nome = $_POST['nome'];
$email = $_POST['email'];
$sexo = $_POST['sexo'];
$telefone = $_POST['telefone'];
$senha = $_POST['senha'];
$idade = $_POST['idade'];
$estado = $_POST['estado'];
$cidade = $_POST['cidade'];
$destinos = $_POST['destinos'];
$hospedagem = $_POST['hospedagem'];
$mensagem = $_POST['menssagem'];
$dt_cadastro = date('Y-m-d');

//para investigar variaveis e expressões

// var_dump($_POST);

//CONECTA AO BANCO E GRAVA OS DADOS (insert com PDO)
try {
    //tenta fazer algo

    //instancia o banco por meio do pdo
    $pdo = new PDO('mysql:host=localhost;dbname=explore', 'root', '');
    //INSERT na tabela  de users
    $sql = $pdo->prepare('INSERT into users(
        nome, email, sexo, telefone, senha, idade, estado, cidade, destinos, hospedagem,
        mensagem, dt_cadastro)
        values(:nome, :email, :sexo, :telefone, :senha, :idade, :estado, :cidade, :destinos, :hospedagem,
        :mensagem, :dt_cadastro)');
    $sql->execute(array(
        ':nome' => $nome,
        ':email' => $email,
        ':sexo' => $sexo,
        ':telefone' => $telefone,
        ':senha' => md5($senha),
        ':idade' => $idade,
        ':estado' => $estado,
        ':cidade' => $cidade,
        ':destinos' => $destinos,
        ':hospedagem' => $hospedagem,
        ':mensagem' => $mensagem,
        ':dt_cadastro' => $dt_cadastro

    ));

    echo '<h1>Usuário cadastrado</h1>';
    var_dump($_POST);
} catch (PDOException $erro) {
    //se der erro, exibe o erro aqui
    echo $erro;
}
