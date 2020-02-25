<?php

function connect()
{
    try {
        return new PDO('mysql:host=localhost;dbname=livraria', 'root', '');
    } catch (PDOException $e) {
        return "Error!: " . $e->getMessage() . "<br/>";
        die();
    }
}
