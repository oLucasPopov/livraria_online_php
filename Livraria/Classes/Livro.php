<?php
include_once '../bd/db.php';

class Livro
{
    private int $idLivro;
    private string $nome;
    private string $autor;
    private string $isbn;
    private int $paginas;
    private float $preco;

    private function validate($nome, $autor, $isbn, $paginas, $preco)
    {
        $ok = true;
        $this->message = "";

        if (!empty($nome))
            $this->nome = $nome;
        else {
            $ok = false;
            $this->message = "O nome não pode estar vazio!";
        }

        if (!empty($autor) and $ok)
            $this->autor = $autor;
        else {
            $ok = false;
            $this->message = "O nome do autor não pode estar vazio!";
        }

        if (!empty($isbn))
            $this->isbn = $isbn;
        else {
            $ok = false;
            $this->message = "O ISBN não pode estar vazio!";
        }

        if (!(strlen((string) $isbn) == 10 or strlen((string) $isbn) == 13)) {
            $ok = false;
            $this->message = "O ISBN deve ter 10 ou 13 caracteres!";
        }

        if (!empty($paginas))
            $this->paginas = $paginas;
        else {
            $ok = false;
            $this->message = "O número de páginas não pode estar vazio!";
        }

        if (!empty($preco) and $preco > 0)
            $this->preco = $preco;
        else {
            $ok = false;
            $this->message = "O preço deve ser maior que zero!";
        }

        return $ok;
    }

    public function create($nome, $autor, $isbn, $paginas, $preco)
    {
        $this->ok = $this->validate($nome, $autor, $isbn, $paginas, $preco);

        if ($this->ok) {
            try {
                $conn = connect();
                $insert = $conn->prepare("INSERT INTO LIVROS(NOME, AUTOR, ISBN, PAGINAS, PRECO) VALUES(?,?,?,?,?)");
                $insert->execute([
                    $this->nome,
                    $this->autor,
                    $this->isbn,
                    $this->paginas,
                    $this->preco
                ]);
                $conn = null;
            } catch (PDOException $e) {
                $this->ok = false;
                $this->message =  "Error!: " . $e->getMessage();
                die();
            }
        }
    }

    public function readOne($id)
    {
        try {
            $conn = connect();
            $select = $conn->prepare("SELECT * FROM LIVROS WHERE IDLIVRO = ?");
            $select->execute([$id]);
            $livro = $select->fetch();
            $conn = null;
            return $livro;
        } catch (PDOException $e) {
            $this->ok = false;
            $this->message =  "Error!: " . $e->getMessage();
            die();
        }
    }

    public function readAll()
    {
        $conn = connect();
        $select = $conn->query("SELECT * FROM LIVROS");
        $conn = null;

        return $select;
    }
    
    public function update($id, $nome, $autor, $isbn, $paginas, $preco)
    {
        $this->idLivro = $id;
        $this->ok = $this->validate($nome, $autor, $isbn, $paginas, $preco);

        if ($this->ok) {
            try {
                $conn = connect();
                $insert = $conn->prepare("UPDATE LIVROS 
                                             SET NOME    = ?
                                                ,AUTOR   = ?
                                                ,ISBN    = ?
                                                ,PAGINAS = ?
                                                ,PRECO   = ? 
                                           WHERE IDLIVRO = ?");
                $insert->execute([
                    $this->nome,
                    $this->autor,
                    $this->isbn,
                    $this->paginas,
                    $this->preco,
                    $this->idLivro
                ]);
                $conn = null;
            } catch (PDOException $e) {
                $this->ok = false;
                $this->message = "Error!: " . $e->getMessage();
                die();
            }
        }
    }

    public function delete($id)
    {
        $this->ok = false;
        $this->idLivro = $id;
        try {
            $conn = connect();
            $delete = $conn->prepare("delete from livros where idLivro = ?");
            $delete->execute([$this->idLivro]);
            $conn = null;
            $this->ok = true;
        } catch (PDOException $e) {
            return "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }
}
