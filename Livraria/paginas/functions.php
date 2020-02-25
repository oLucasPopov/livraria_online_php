<?php

function returnTableDataHTML($data)
{
    return '<td>' . $data . '</td>';
}

function returnTableDataHTMLLink($data, $link)
{
    switch ($data) {
        case 'detalhe': {
                return '<td> <a href="' . $link . '">'
                    . '<img src="../imagens/detail.png" width=20px type = "submit" name="btnVer"></img>' . '</a></td>';
                break;
            }
        case 'editar': {
                return '<td> <a href="' . $link . '">' . '<img src="../imagens/edit.png" width=20px></img>' . '</a></td>';
                break;
            }
        case 'excluir': {
                return '<td> <a href="' . $link . '">' . '<img src="../imagens/delete.png" width=20px></img>' . '</a></td>';
                break;
            }
    }
}

function acessarListagem($listagem){
    header("Location: Listagem$listagem.php");
    die();
}