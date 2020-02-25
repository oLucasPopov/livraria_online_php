<?php

include_once '../Classes/Usuario.php';
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
                echo '<h1>' . $usuario['NOME'] . '</h1>';
            } else {
                echo '<h1>CADASTRO DE USUÁRIO</h1>';
            }
            ?>
        </header>


        <main>
            <div class="form">
                <form method="POST" id="cadLivro" action="gravarUsuario.php<?php echo (isset($_GET["id"])) ? '?id=' . $_GET["id"] : "" ?>">

                    <label for="nome">Nome de Usuario
                        <input type="text" name="nome" id="nome" placeholder="Ex.: Toninho Anderson da Silva">
                    </label>
                    <label for="email">Email
                        <input type="text" name="email" id="email" placeholder="Ex.: tonindasilva@gmail.com">
                    </label>
                    <label for="senha">Senha
                        <input type="password" name="senha" id="senha" placeholder="Digite uma senha">
                    </label>
                    <label for="r-senha">Repetir a senha
                        <input type="password" name="r-senha" id="r-senha" placeholder="Confirme a senha digitada">
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
        echo 'assignValue("nome",    "' . $usuario['NOME'] . '");';
        echo 'assignValue("email",   "' . $usuario['EMAIL'] . '");';

        $usuario = null;

        ?>
    </script>

</body>

</html>