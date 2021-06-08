<?php

include_once '../Classes/Usuario.php';
include_once 'functions.php';

if (isset($_POST["gravar"])) {

    $usuario = new Usuario();

    //se tiver um ID no POST, ele atualiza o usuario daquele ID, senão, ele cria um novo no ELSE
    if (isset($_GET["id"])) {
        $usuario->update(
            $_GET["id"],
            $_POST["nome"],
            $_POST["email"],
            $_POST["senha"],
            $_POST["r-senha"]
        );

        if ($usuario->ok) {
            echo '<script>alert("usuário atualizado com sucesso!")</script>';
            acessarListagem("Usuarios");
        } else {
            echo '<script>alert("' . $usuario->message . '");window.history.back();</script>';
        }

    } else { 
        $usuario->create(
            $_POST["nome"],
            $_POST["email"],
            $_POST["senha"],
            $_POST["r-senha"]
        );
        if ($usuario->ok) {
            echo '<script>alert("usuário gravado com sucesso!")</script>';
            acessarListagem("Usuarios");  
        } else {
            echo '<script>alert("' . $usuario->message . '");window.history.back();</script>';
        }
    }
    $usuario = null;
}
