<?php
require_once ('../../models/posts/posts.php');
$dados = getCategories();
print_r($dados);
$ac = filter_input(INPUT_POST, 'ac', FILTER_SANITIZE_STRING);
switch ($ac):
    case 'cadastrar':

        break;

    case 'atualizar':

        break;

    default :

        break;
endswitch;