<?php
include_once '../Classes/Livro.php';
include_once 'functions.php';


if(isset($_GET['id'])){
    $livro = new Livro();
    $livro->delete($_GET['id']);
    $livro = null;
    acessarListagem("Livros");  
}
