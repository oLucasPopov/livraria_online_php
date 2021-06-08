<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca</title>
    <link rel="stylesheet" href="../css/milligram.min.css?v3">
    <link rel="stylesheet" href="../css/listagem.css?v4">
    <link rel="stylesheet" href="../css/comum.css?v5">
</head>

<body>
    <div id="site">
        <header>
            <a href="main.php">
                <img id="headerImg" src="http://localhost/TrabalhoPHP/Livraria/imagens/logo.png" alt="logo da livraria" />
            </a>

            <h1>LISTAGEM DE LIVROS</h1>
        </header>

        <main>
            <table>
                <thead>
                    <th>CÓDIGO</th>
                    <th>NOME</th>
                    <th>AUTOR</th>
                    <th></th>
                    <th></th>
                    <th></th>
                </thead>
                <tbody>
                    <?php
                    include_once '../Classes/Livro.php';
                    include_once 'functions.php';

                    $livros = new Livro();
                    foreach ($livros->readAll() as $livro) {
                        $id      = $livro['idLivro'];
                        $nome    = $livro['nome'];
                        $preco   = $livro['preco'];
                        $autor   = $livro['autor'];
                        $paginas = $livro['paginas'];
                        $isbn    = $livro['ISBN'];

                        echo '<tr>';
                        echo returnTableDataHTML($id);
                        echo returnTableDataHTML($nome);
                        echo returnTableDataHTML($autor);
                        echo returnTableDataHTMLLink('detalhe', "detalhamentoLivro.php?id=$id");
                        echo returnTableDataHTMLLink(
                            'editar',
                            'CadastroLivro.php?id=' . $id
                        );
                        echo returnTableDataHTMLLink('excluir', "excluirLivro.php?id=$id");
                        echo '</tr>';
                    }
                    $livros = null;
                    ?>
                </tbody>
            </table>
        </main>
        <!-- <footer></footer> -->
    </div>
</body>

</html>