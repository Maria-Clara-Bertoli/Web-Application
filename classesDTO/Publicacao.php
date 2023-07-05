
<?php

class Publicacao{
    private $titulo;
    private $imagem;
    private $link;
    private $descricao;
    private $avaliacao;

    function __construct(){

    }
    function setTitulo($titulo){
        $this->titulo = $titulo;
    }
    function getTitulo(){
        return $this->titulo;
    }
    function setImagem($imagem){
        $this->imagem = $imagem;
    }
    function getImagem(){
        return $this->imagem;
    }
    function setLink($link){
        $this->link = $link;
    }
    function getLink(){
        return $this->link;
    }
    function setDescricao($descricao){
        $this->descricao = $descricao;
    }
    function getDescricao(){
        return $this->descricao;
    }
    function setAvaliacao($avaliacao){
        $this->avaliacao = $avaliacao;
    }
    function getAvaliacao(){
        return $this->avaliacao;
    }
    function getArray(){
        $array_publicacao = array(
            'titulo' => $this->getTitulo(),
            'imagem' => $this->getImagem(),
            'link' => $this->getLink(),
            'descricao' => $this->getDescricao(),
            'avaliacao' => $this->getAvaliacao(),
        );
        return $array_publicacao;
    }
}
?>