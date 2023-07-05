<?php
require '../vendor/autoload.php';
include '../Main/Log.php';
use Predis\Client;

class PublicacaoDAO{

    const PUBLICACAO = 'publicacao';
    
    //Insere no banco
    function inserir($publicacao){
        $redis = new Client();
        $redis->connect('localhost', 6379);
        $redis->rpush(self::PUBLICACAO, json_encode($publicacao->getArray()));
        echo("Publicação Inserida com sucesso!");
    }
    //Recupera a lista de publicações do banco
    function recuperar(){
        $listaObjetoPublicacao = [];
        $redis = new Client();
        $redis->connect('localhost', 6379);
        $conjuntoPublicacaoJson = $redis->lrange(self::PUBLICACAO, 0, -1);
        $conjuntoPublicacao = array_map('json_decode', $conjuntoPublicacaoJson);

            foreach($conjuntoPublicacao as $pb){
                    $publicacao = new Publicacao();
                    $publicacao->setTitulo($pb->titulo);
                    $publicacao->setDescricao($pb->descricao);
                    $publicacao->setLink($pb->link);
                    $publicacao->setAvaliacao($pb->avaliacao);
                    $publicacao->setImagem($pb->imagem);
                    array_push($listaObjetoPublicacao, $publicacao);
            }
            return $listaObjetoPublicacao;
        }
}   
?>