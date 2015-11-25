<?php

require_once('../../functions.php');

function listaCategorias() {
    try {
        $con = conectaDB();
        $cmd = $con->prepare("SELECT * FROM Categorias");
        $cmd->execute();
        if ($cmd->rowCount() > 0) {
            $return = array();
            while ($linha = $cmd->fetch(PDO::FETCH_OBJ)) {
                array_push($return, $linha);
            }
            return json_encode($return);
        }
    } catch (PDOException $ex) {
        echo $ex->getMessage();
    }
}

function cadastrarCategoria($categoria) {
    try {
        $con = conectaDB();
        $cmd = $con->prepare("INSERT INTO Categorias (Descricao) Values (?)");
        $cmd->bindValue(1, $categoria, PDO::PARAM_STR);
        $cmd->execute();
    } catch (PDOException $ex) {
        echo $ex->getMessage();
    }
}

function alterarCategoria($categoria, $ID) {
    try {
        $con = conectaDB();
        $cmd = $con->prepare("UPDATE Categorias SET Descricao = ? WHERE ID = ?");
        $cmd->bindValue(1, $categoria, PDO::PARAM_STR);
        $cmd->bindValue(2, $ID, PDO::PARAM_STR);
        $cmd->execute();
    } catch (PDOException $ex) {
        echo $ex->getMessage();
    }
}
