<?php

require_once ('../../functions.php');

function getCategories() {
    try {
        $con = conectaDB();
        $cmd = $con->prepare("SELECT Descricao FROM Categorias");
        $cmd->execute();
        $retorno = array();
        if ($cmd->rowCount() > 0) {
            while($linha = $cmd->fetch(PDO::FETCH_OBJ)){
                array_push($retorno, $linha->Descricao);
            }
            return json_encode($retorno);
        }
    } catch (PDOException $ex) {
        echo $ex->getMessage();
    }
}
