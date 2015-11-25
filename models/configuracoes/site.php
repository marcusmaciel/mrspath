<?php

require_once ('../../functions.php');

function listaDadosSite() {
    try {
        $con = conectaDB();
        $cmd = $con->prepare("SELECT * FROM CONFIGURACOES LIMIT 0,1");
        $cmd->execute();
        if ($cmd->rowCount() > 0) {
            return $cmd->fetch(PDO::FETCH_OBJ);
        }
    } catch (PDOException $ex) {
        echo $ex->getMessage();
    }
}

function atualizaInformacoes($titulo, $email, $descricao, $facebook, $twitter, $youtube) {
    try {
        $con = conectaDB();
        $cmd = $con->prepare("UPDATE Configuracoes SET Titulo = ?, Email = ?, Descricao = ?, Facebook = ?, Twitter = ?, Youtube = ?");
        $cmd->bindValue(1, $titulo, PDO::PARAM_STR);
        $cmd->bindValue(2, $email, PDO::PARAM_STR);
        $cmd->bindValue(3, $descricao, PDO::PARAM_STR);
        $cmd->bindValue(4, $facebook, PDO::PARAM_STR);
        $cmd->bindValue(5, $twitter, PDO::PARAM_STR);
        $cmd->bindValue(6, $youtube, PDO::PARAM_STR);

        $cmd->execute();
        return 'atualizou';
    } catch (PDOException $ex) {
        echo $ex->getMessage();
    }
}

function atualizaInformacoesSEO($keys, $ga) {
    try {
        $con = conectaDB();
        $cmd = $con->prepare("UPDATE Configuracoes SET Keywords = ?, Ga = ?");
        $cmd->bindValue(1, $keys, PDO::PARAM_STR);
        $cmd->bindValue(2, $ga, PDO::PARAM_STR);

        $cmd->execute();
        return 'atualizou';
    } catch (PDOException $ex) {
        echo $ex->getMessage();
    }
}
