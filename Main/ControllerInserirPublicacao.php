<?php
include_once '../classesDTO/Publicacao.php';
include_once '../classesBO/PublicacaoBO.php';

$publicacao = new Publicacao();
$publicacaoBO = new PublicacaoBO();

if(isset($_FILES['image'])){
    $arrayimagem = $_FILES['image'];
}
if(isset($arrayimagem['tmp_name']) && !empty($arrayimagem['tmp_name'])){
    $conteudoimagem = file_get_contents($arrayimagem['tmp_name']);
    $imagembase64 = base64_encode($conteudoimagem);
    $publicacao->setImagem($imagembase64);
}
else{
    $publicacao->setImagem('');
}
if(isset($_POST['titulo']) && !empty($_POST['titulo'])){
    $publicacao->setTitulo($_POST['titulo']);
}
else{
    $publicacao->setTitulo('');
} 
if(isset($_POST['link']) && !empty($_POST['link'])){
    $publicacao->setLink($_POST['link']);
}
else{
    $publicacao->setLink('');
} 
if(isset($_POST['descricao']) && !empty($_POST['descricao'])){
    $publicacao->setDescricao($_POST['descricao']);
}
else{
    $publicacao->setDescricao('');
} 
if(isset($_POST['avaliacao']) && !empty($_POST['avaliacao'])){
    $publicacao->setAvaliacao($_POST['avaliacao']);
}
else{
    $publicacao->setAvaliacao('');
} 
$publicacaoBO->inserir($publicacao);
?>