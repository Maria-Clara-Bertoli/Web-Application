<?php
include_once '../Estilo.php';
require '../vendor/autoload.php';
use League\OAuth2\Client\Provider\Google;

ob_start();
session_start();

if(empty($_SESSION['userLogin'])){
    //echo("Não Logado");
    //echo("<br>");
    //AUTH GOOGLE
    $google = new Google([
        'clientId' => '1051288541575-8js9n5aa4gpfl0f4lnesj688cs0e142c.apps.googleusercontent.com',
        'clientSecret' => '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',
        'redirectUri' => 'http://localhost/software/Main/Login.php'
    ]);
    $authUrl = $google->getAuthorizationUrl();
    $error = filter_input(INPUT_GET, "error", FILTER_SANITIZE_STRING);
    $code =  filter_input(INPUT_GET, "code", FILTER_SANITIZE_STRING);
   

    if($error){
        echo("Você precisa autorizar para continuar!");
        echo("<br>");
    }
    if($code){
        $token = $google->getAccessToken("authorization_code", [
            "code" => $code
        ]);

        $_SESSION['userLogin'] = serialize($google->getResourceOwner($token));
        header("Location: " . 'http://localhost/software/Main/Login.php');
        exit();
    }
    echo("<div class='centro texto'>");
    echo("<a title='Logar com o Google' href='{$authUrl}'>Logar com o Google</a>");
    echo("</div>");
}
    else{
        //echo("Já Logado");
        //echo("<br>");
        $user = unserialize($_SESSION['userLogin']);
        echo("<div class='centro texto'>");
        echo("<img width='120' src='{$user->getAvatar()}' alt='' title='' />");
        echo("<p>Bem-Vinda(o) {$user->getFirstName()}!</p>");
        echo("<a href='Publicacao.html'>Clique para acessar a aplicação</a>");
        echo("<br>");
        //var_dump($user->toArray());

        echo("<a href='?off=True'>Sair</a>");
        echo("</div>");
        $off = filter_input(INPUT_GET, "off", FILTER_VALIDATE_BOOLEAN);

        if($off){
            unset($_SESSION['userLogin']);
            header("Location: " . 'http://localhost/software/Main/Login.php');
        }
    }

ob_end_flush();
?>