<?php
include_once '../classesDTO/Publicacao.php';
include_once '../classesBO/PublicacaoBO.php';
include_once '../Estilo.php';

$publicacaoBO = new PublicacaoBO();

$recuperar = $publicacaoBO->recuperar();

foreach($recuperar as $valor){
    echo("<div class='centro texto'>");
        if(!empty($valor->getTitulo())){
        echo($valor->getTitulo());
        echo("<br>");
        }
        if(!empty($valor->getImagem())){
            echo('<img src="data:image/jpeg;base64,' . $valor->getImagem() . '" alt="Imagem" width="300px" height="300px">');
            echo("<br>");
        }
        if(!empty($valor->getDescricao())){
            echo($valor->getDescricao());
            echo("<br>");
        }
        if(!empty($valor->getLink())){
            echo($valor->getLink());
            echo("<br>");
        }
        if(!empty($valor->getAvaliacao())){
            echo($valor->getAvaliacao());
            echo("<br>");
       }
    echo("</div>");
}
?>