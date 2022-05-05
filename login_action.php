<?php
require "config.php";
require 'DAO/Usuario_MySQL.php';


$usuarioDao = new usuarioDaoMysql($pdo);

$usuario = filter_input(INPUT_POST, "usuario", FILTER_SANITIZE_SPECIAL_CHARS) ;
$senha = filter_input(INPUT_POST, "senha");


if($usuario && $senha){
    if($usuarioDao->searchingAll($usuario, $senha) === True){
        $_SESSION["usuario"] = $usuario;
        header("Location: pagina.php");
        exit;
    }
    else{
        header("Location: adicionar.php");
        exit;
    }
}