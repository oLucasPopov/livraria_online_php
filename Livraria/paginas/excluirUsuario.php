<?php
include_once '../Classes/Usuario.php';
include_once 'functions.php';


if(isset($_GET['id'])){
    $usuario = new Usuario();
    $usuario->delete($_GET['id']);
    $usuario = null;
    acessarListagem("Usuarios");  
}
