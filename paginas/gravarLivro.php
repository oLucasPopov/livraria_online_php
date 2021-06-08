<?php

include_once '../Classes/Livro.php';
include_once 'functions.php';



if (isset($_POST["gravar"])) {

    $livro = new Livro();

    //se tiver um ID no POST, ele atualiza o livro daquele ID, senão, ele cria um novo no ELSE
    if (isset($_GET["id"])) {
        $livro->update(
            $_GET["id"],
            $_POST["nome"],
            $_POST["autor"],
            $_POST["ISBN"],
            $_POST["paginas"],
            $_POST["preco"]
        );
        if ($livro->ok) {
            echo '<script>alert("Livro atualizado com sucesso!")</script>';
            acessarListagem("Livros");
        } else {
            echo '<script>alert("' . $livro->message . '");window.history.back();</script>';
        }
    } else { 
        $livro->create(
            $_POST["nome"],
            $_POST["autor"],
            $_POST["ISBN"],
            $_POST["paginas"],
            $_POST["preco"]
        );
        if ($livro->ok) {
            echo '<script>alert("Livro gravado com sucesso!")</script>';
            acessarListagem("Livros");  
        } else {
            echo '<script>alert("' . $livro->message . '");window.history.back();</script>';
        }
    }
    $livro = null;
}
