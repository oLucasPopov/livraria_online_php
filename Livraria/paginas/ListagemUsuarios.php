<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca</title>
    <link rel="stylesheet" href="../css/listagem.css?v2">
    <link rel="stylesheet" href="../css/milligram.min.css?v2">
    <link rel="stylesheet" href="../css/comum.css?v3">
</head>

<body>
    <div id="site">
        <header>
            <a href="http://localhost/TrabalhoPHP/Livraria/paginas/main.php">
                <img id="headerImg" src="http://localhost/TrabalhoPHP/Livraria/imagens/logo.png" alt="logo da livraria" />
            </a>
            <h1>LISTAGEM DE USUÁRIOS</h1>
        </header>

        <main>
            <table>
                <thead>
                    <th>CÓDIGO</th>
                    <th>NOME</th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <!-- <th>EMAIL</th> -->
                </thead>
                <tbody>
                    <?php
                    include_once '../Classes/Usuario.php';
                    include_once 'functions.php';

                    $usuarios = new Usuario();
                    foreach ($usuarios->readAll() as $usuario) {
                        $id = $usuario['IDUSUARIO'];

                        echo '<tr>';
                        echo returnTableDataHTML($id);
                        echo returnTableDataHTML($usuario['NOME']);
                        echo returnTableDataHTMLLink('detalhe', "detalhamentoUsuario.php?id=$id");
                        echo returnTableDataHTMLLink(
                            'editar',
                            'CadastroUsuario.php?id=' . $id
                        );
                        echo returnTableDataHTMLLink('excluir', "excluirUsuario.php?id=$id");
                        echo '</tr>';
                    }
                    $usuarios = null;
                    ?>
                </tbody>
            </table>
        </main>
        <!-- <footer></footer> -->
    </div>
</body>

</html>