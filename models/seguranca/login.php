<?php

require_once('../../functions.php');

function getUsuario($usuario, $senha) {
    try {
        $con = conectaDB();
        $cmd = $con->prepare("SELECT * FROM Usuarios WHERE Usuario = ? AND Senha = ?");
        $cmd->bindValue(1, $usuario, PDO::PARAM_STR);
        $cmd->bindValue(2, $senha, PDO::PARAM_STR);
        $cmd->execute();

        if ($cmd->rowCount() == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    } catch (PDOException $ex) {
        echo $ex->getMessage();
    }
}

function detailsUsuario($usuario) {
    try {
        $con = conectaDB();
        $cmd = $con->prepare("SELECT * FROM Usuarios WHERE Usuario = ?");
        $cmd->bindValue(1, $usuario, PDO::PARAM_STR);
        $cmd->execute();
        if ($cmd->rowCount() == 1) {
            return $cmd->fetch(PDO::FETCH_OBJ);
        }
    } catch (PDOException $ex) {
        echo $ex->getMessage();
    }
};