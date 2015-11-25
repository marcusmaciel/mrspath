<?php

require_once('../../models/categorias/categorias.php');
$informacoes = listaCategorias();

$ac = filter_input(INPUT_POST, 'ac', FILTER_SANITIZE_STRING);

switch ($ac) {
    case 'cadastrar':
        sleep(3);
        $categoria = filter_input(INPUT_POST, 'categoria', FILTER_SANITIZE_STRING);
        try {
            cadastrarCategoria($categoria);
            echo 'cadastrou';
        } catch (Exception $ex) {
            echo 'deupau';
        }
        break;
    case 'alterar':
        sleep(3);
        $categoria = filter_input(INPUT_POST, 'categoria', FILTER_SANITIZE_STRING);
        $id = filter_input(INPUT_POST, 'ID', FILTER_SANITIZE_NUMBER_INT);
        try {
            alterarCategoria($categoria, $id);
            echo 'alterou';
        } catch (Exception $ex) {
            echo 'deupau';
        }
        break;
    default :
        $informacoes = listaCategorias();
        echo $informacoes;
        break;
}