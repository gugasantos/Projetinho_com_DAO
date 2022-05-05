<?php
session_start();
require "config.php";
require 'DAO/Usuario_MySQL.php';

$usuarioDao = new usuarioDaoMysql($pdo);


$nome = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_SPECIAL_CHARS);
$senha = filter_input(INPUT_POST,"senha");
$email = filter_input(INPUT_POST,"email", FILTER_SANITIZE_EMAIL);

if($nome && $email){
    if($usuarioDao->findByEmail($email) === False){
        $novoUsuario = new Usuario();
        $novoUsuario->setNome($nome);
        $novoUsuario->setSenha($senha);
        $novoUsuario->setEmail($email);

        $usuarioDao->add($novoUsuario);
        header("Location: login.php");
        exit;
    }
    else{
        header("Location: adicionar.php");
        exit;
    }
}
else {
    header("Location: adicionar.php");
    exit;
}


/* #é para e-mails duplicados não serem inseridos
    $sql = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email");
    $sql->bindValue(':email',$email);
    $sql->execute();

    if($sql->rowCount() === 0){
    $sql = $pdo->prepare("INSERT INTO usuarios (nome,senha,email) VALUES (:nome,:senha,:email)");
    $sql->bindValue("nome",$nome);
    $sql->bindValue("senha",$senha);
    $sql->bindValue("email",$email);
    $sql->execute();
    }
    
    header("Location: login.php");
    exit;
}
else{
    header("Location: adicionar.php");
    exit;
} */