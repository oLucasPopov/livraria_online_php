<?php
include_once '../Classes/Livro.php';
include_once 'functions.php';

$livro = new Livro();

if (isset($_GET['id'])) {
    $livro = $livro->readOne($_GET['id']);
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
        <a href="http://localhost/TrabalhoPHP/Livraria/paginas/main.php">
            <img id="headerImg" src="http://localhost/TrabalhoPHP/Livraria/imagens/logo.png" alt="logo da livraria"/>
        </a>
            <h1><?php echo $livro['nome']; ?></h1>
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
                    echo returnTableDataHTML('<b>Título</b>');
                    echo returnTableDataHTML($livro['nome']);
                    echo '</tr>';
                    echo '<tr>';
                    echo returnTableDataHTML('<b>Autor</b>');
                    echo returnTableDataHTML($livro['autor']);
                    echo '</tr>';
                    echo '<tr>';
                    echo returnTableDataHTML('<b>Páginas</b>');
                    echo returnTableDataHTML($livro['paginas']);
                    echo '</tr>';
                    echo '<tr>';
                    echo returnTableDataHTML('<b>ISBN</b>');
                    echo returnTableDataHTML($livro['ISBN']);
                    echo '</tr>';
                    echo '<tr>';
                    echo returnTableDataHTML('<b>Preço</b>');
                    echo returnTableDataHTML(str_replace(".", ",", "R$ " . $livro['preco']));
                    echo '</tr>';

                    ?>
                </tbody>
            </table>
        </main>
        <!-- <footer></footer> -->
    </div>
</body>

</html>