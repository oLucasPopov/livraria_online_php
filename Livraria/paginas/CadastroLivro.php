<?php

include_once '../Classes/Livro.php';
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
    <link rel="stylesheet" href="../css/cadastro.css?v2">
    <link rel="stylesheet" href="../css/milligram.min.css?v2">
    <link rel="stylesheet" href="../css/comum.css?v2">
</head>

<body>
    <div id="site">
        <header>
            <a href="http://localhost/TrabalhoPHP/Livraria/paginas/main.php">
                <img id="headerImg" src="http://localhost/TrabalhoPHP/Livraria/imagens/logo.png" alt="logo da livraria" />
            </a>

            <?php

            if (isset($_GET["id"])) {
                echo '<h1>' . $livro['nome'] . '</h1>';
            } else {
                echo '<h1>CADASTRO DE LIVROS</h1>';
            }
            ?>
        </header>


        <main>
            <div class="form">
                <form method="POST" id="cadLivro" action="gravarLivro.php<?php echo (isset($_GET["id"])) ? '?id=' . $_GET["id"] : "" //if(isset($_GET["id"])) echo '?id=' . $_GET["id"] 
                                                                            ?>">

                    <label for="nome">Nome do Livro
                        <input type="text" name="nome" id="nome" placeholder="Ex.: O Nome do Vento, O Temor do Sábio, etc..">
                    </label>
                    <label for="autor">Nome do Autor
                        <input type="text" name="autor" id="autor" placeholder="Ex.: Machado de Assis, Patrick Rothfuss, etc..">
                    </label>
                    <label for="ISBN">ISBN
                        <input type="number" name="ISBN" id="isbn" placeholder="Deve conter 10 ou 13 dígitos">
                    </label>
                    <label for="paginas">Nº de Páginas
                        <input type="number" name="paginas" id="paginas" placeholder="Quantidade de páginas que o livro contém">
                    </label>
                    <label for="preco">Preço do Livro
                        <input type="number" name="preco" id="preco" placeholder="Preço de venda do livro" step="0.01" />
                    </label>

                    <?php
                    echo '<button type="submit" name="gravar" id="gravar">GRAVAR</button>';
                    ?>

                </form>
            </div>

        </main>
        <!-- <footer></footer> -->
    </div>
    <script>
        function assignValue(elementName, value) {
            document.getElementById(elementName).value = value;
        }

        <?php
        echo 'assignValue("nome",    "' . $livro['nome'] . '");';
        echo 'assignValue("autor",   "' . $livro['autor'] . '");';
        echo 'assignValue("isbn",    "' . $livro['ISBN'] . '");';
        echo 'assignValue("paginas", "' . $livro['paginas'] . '");';
        echo 'assignValue("preco",   "' . $livro['preco'] . '");';

        $livro = null;

        ?>
    </script>

</body>

</html>