<?php

include_once '../Classes/Usuario.php';

$usuario = new Usuario();
$login = $usuario->login($_POST['email'], $_POST['senha']);

if ($login <> '') {
    echo "<script>localStorage.setItem('LivrariaDigitalUID','$login')</script>";
    header("Location: main.php");
    die();
} else {
    echo "<script>alert('Falha ao fazer login!');window.history.back();</script>";
}
