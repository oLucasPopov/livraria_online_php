<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca</title>
    <link rel="stylesheet" href="../css/main.css?v3">
    <link rel="stylesheet" href="../css/milligram.min.css?v2">
    <link rel="stylesheet" href="../css/comum.css?v3">
</head>

<body onresize="setSize()" onload="setSize()">
    <div id="site">
        <header id="header">
            <a href=""><img id="headerImg" src="http://localhost/TrabalhoPHP/Livraria/imagens/logo.png" alt="logo da livraria"></img></a>
            <h1>PÁGINA INICIAL</h1>
        </header>

        <nav id="nav">
            <dl>
                <dt class="listTitle">USUARIOS</dt>
                <dd class="listItems"><a href="CadastroUsuario.php">cadastro</a></dd>
                <dd class="listItems"><a href="ListagemUsuarios.php">listagem</a></dd>
            </dl>

            <dl>
                <dt class="listTitle">LIVROS</dt>
                <dd class="listItems"><a href="CadastroLivro.php">cadastro</a></dd>
                <dd class="listItems"><a href="ListagemLivros.php">listagem</a></li>
            </dl>


        </nav>
        <main id="main"></main>
    </div>
 <script src="../javascript/pages.js"></script>
</body>

</html>