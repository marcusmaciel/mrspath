<?php

require_once ('../../models/seguranca/login.php');

ob_start();
session_start();

//Pega os dados
$usuario = filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_STRING);
$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);

if (getUsuario($usuario, $senha)) {
    $_SESSION['logado'] = detailsUsuario($usuario);
    echo 'login';
} else {
    $dados = detailsUsuario($usuario);
    if (!$dados) {
        echo 'naoexiste';
    } elseif ($dados->Senha != $senha) {
        echo 'errado';
    }
}

ob_end_flush();
