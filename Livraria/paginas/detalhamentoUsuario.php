<?php
include_once '../Classes/Usuario.php';
include_once 'functions.php';

$usuario = new Usuario();

if (isset($_GET['id'])) {
    $usuario = $usuario->readOne($_GET['id']);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca</title>
    <link rel="stylesheet" href="../css/listagem.css?v2">
    <link rel="stylesheet" href="../css/milligram.min.css?v2">
    <link rel="stylesheet" href="../css/comum.css?v1">
</head>

<body>
    <div id="site">
        <header>
            <a href="http://localhost/TrabalhoPHP/Livraria/main.php">
                <img id="headerImg" src="http://localhost/TrabalhoPHP/Livraria/imagens/logo.png" alt="logo da livraria" />
            </a>
            <h1><?php echo $usuario['NOME']; ?></h1>
        </header>

        <main>
            <table>
                <thead>
                    <th></th>
                    <th></th>
                </thead>
                <tbody>
                    <?php

                    echo '<tr>';
                    echo returnTableDataHTML('<b>Nome</b>');
                    echo returnTableDataHTML($usuario['NOME']);
                    echo '</tr>';

                    echo '<tr>';
                    echo returnTableDataHTML('<b>Email</b>');
                    echo returnTableDataHTML($usuario['EMAIL']);
                    echo '</tr>';

                    ?>
                </tbody>
            </table>
        </main>
        <!-- <footer></footer> -->
    </div>
</body>

</html>