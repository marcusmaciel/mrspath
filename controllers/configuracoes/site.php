<?php

require_once('../../models/configuracoes/site.php');

//Atualizar informações
$ac = filter_input(INPUT_POST, 'ac', FILTER_SANITIZE_STRING);
switch ($ac):
    case 'atualizarSite':
        sleep(3);
        $titulo = filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING);
        $facebook = filter_input(INPUT_POST, 'facebook', FILTER_SANITIZE_STRING);
        $twitter = filter_input(INPUT_POST, 'twitter', FILTER_SANITIZE_STRING);
        $youtube = filter_input(INPUT_POST, 'youtube', FILTER_SANITIZE_STRING);

        try {
            atualizaInformacoes($titulo, $email, $descricao, $facebook, $twitter, $youtube);
            echo 'atualizou';
        } catch (Exception $ex) {
            echo 'deupau';
        }
        break;
    case 'atualizarSEO':
        sleep(3);
        $keys = filter_input(INPUT_POST, 'keys', FILTER_SANITIZE_STRING);
        $ga = filter_input(INPUT_POST, 'ga', FILTER_SANITIZE_STRING);

        try {
            atualizaInformacoesSEO($keys, $ga);
            echo 'atualizou';
        } catch (Exception $ex) {
            echo 'deupau';
        }
        break;
    default :
        $dados = array();
        $lista = listaDadosSite();

//Passa valores para os campos
        $dados['titulo'] = $lista->Titulo;
        $dados['descricao'] = $lista->Descricao;
        $dados['email'] = $lista->Email;
        $dados['Facebook'] = $lista->Facebook;
        $dados['Twitter'] = $lista->Twitter;
        $dados['Youtube'] = $lista->Youtube;
        $dados['Keywords'] = $lista->Keywords;
        $dados['ga'] = $lista->Ga;

//Passsa o JSON
        echo json_encode($dados);

        break;
endswitch;
