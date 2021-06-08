<?php
include_once '../bd/db.php';

class Usuario
{
    private string $nome;
    private string $email;
    private string $senha;

    private function validate($nome, $email, $senha, $confirmacaoSenha)
    {
        $ok = true;

        if (!empty(trim($nome))) {
            $this->nome = $nome;
        } else {
            $ok = false;
            $this->message = "O nome de usuário não pode ficar vazio!";
        }

        if (!empty(trim($email))) {
            $this->email = $email;
        } else {
            $ok = false;
            $this->message = "O email não pode ficar vazio!";
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $ok = false;
            $this->message = "Email inválido!";
        }

        if (!empty($senha)) {
            $this->senha = $senha;
        } else {
            $ok = false;
            $this->message = "A senha não pode ficar vazia!";
        }

        if (!($senha == $confirmacaoSenha)) {
            $ok = false;
            $this->message = "As senhas informadas não batem!";
        }

        return $ok;
    }

    public function create($nome, $email, $senha, $confirmacaoSenha)
    {
        $this->ok = $this->validate($nome, $email, $senha, $confirmacaoSenha);

        try {
            if ($this->ok) {
                $conn = connect();
                $insert = $conn->prepare("INSERT INTO USUARIOS(NOME, EMAIL, SENHA) VALUES(?,?,MD5(?))");
                $insert->execute([
                    $this->nome,
                    $this->email,
                    $this->senha
                ]);
                $conn = null;
            }
        } catch (PDOException $e) {
            $this->ok = false;
            $this->message =  "Error!: " . $e->getMessage();
            die();
        }
    }
    public function readOne($id)
    {
        $conn = connect();
        $select = $conn->prepare("SELECT NOME, EMAIL FROM USUARIOS WHERE IDUSUARIO = ?");
        $select->execute([$id]);
        $usuario = $select->fetch();
        $conn = null;

        return $usuario;
    }
    public function readAll()
    {
        $conn = connect();
        $select = $conn->query("SELECT IDUSUARIO, NOME, EMAIL FROM USUARIOS");
        $conn = null;

        return $select;
    }
    public function update($id, $nome, $email, $senha, $confirmacaoSenha)
    {
        $this->ok = $this->validate($nome, $email, $senha, $confirmacaoSenha);
        $this->id = $id;
        try {
            if ($this->ok) {
                $conn = connect();
                $update = $conn->prepare("UPDATE USUARIOS 
                                             SET NOME  = ?
                                                ,EMAIL = ?
                                                ,SENHA = MD5(?)
                                           WHERE IDUSUARIO = ?");
                $update->execute([
                    $this->nome,
                    $this->email,
                    $this->senha,
                    $id
                ]);
                $conn = null;
            }
        } catch (PDOException $e) {
            $this->ok = false;
            $this->message =  "Error!: " . $e->getMessage();
            die();
        }
    }
    public function delete($id)
    {
        $this->ok = false;
        $this->idLivro = $id;
        try {
            $conn = connect();
            $delete = $conn->prepare("DELETE FROM USUARIOS WHERE IDUSUARIO = ?");
            $delete->execute([$this->idLivro]);
            $conn = null;
            $this->ok = true;
        } catch (PDOException $e) {
            return "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    private function validateLogin($email, $senha)
    {
        $ok = true;

        if (!empty(trim($email))) {
            $this->email = $email;
        } else {
            $ok = false;
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $ok = false;
        }

        if (!empty($senha)) {
            $this->senha = $senha;
        } else {
            $ok = false;
        }

        return $ok;
    }

    public function login($email, $senha)
    {
        if ($this->validateLogin($email, $senha)) {
            $conn = connect();
            $login = $conn->prepare('SELECT EMAIL AS RES FROM USUARIOS WHERE EMAIL = ? AND SENHA = MD5(?)');
            $login->execute([
                $this->email,
                $this->senha
            ]);
            $login = $login->fetch();
            $conn = null;

            return $login['RES'] ?? '';
        } else {
            return '';
        }
    }
}
