<?php
    include_once '../classesDAO/PublicacaoDAO.php';
    class PublicacaoBO{
        
        function inserir($publicacao){
            $publicacaoDAO = new PublicacaoDAO();
                return $publicacaoDAO->inserir($publicacao);
        }
        function recuperar(){
            $publicacaoDAO = new PublicacaoDAO();
            return $publicacaoDAO->recuperar();
        }
}
?>