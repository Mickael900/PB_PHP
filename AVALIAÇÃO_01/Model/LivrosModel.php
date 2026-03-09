<?php

require_once "./database/Database.php";

class Usuario{
    private $livro;


    public function __construct ($livro){
        $this-> Livro = $livro;
    }

    public function salvar(){
        $pdo = Database::conectar();
        $sql = "INSERT INTO usuarios (nome,email) VALUES (:livro)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['livro' => $this->livro]);

          $_SESSION['usuarios'][] = [
            'livro' => $this->nome,
            
        ];
    }

    public static function listar(){
        $pdo = Database::conectar();
        $stmt = $pdo->query("SELECT * FROM livro");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

    public static function buscar ($id){
        $pdo = Database::conectar();
        $stmt = $pdo->prepare("SELECT * FROM livros WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);

    }

    public function atualizar($id){
        $pdo = Database::conectar();
        $stmt = $pdo->prepare("UPDATE usuarios SET nome = :nome");
        $stmt->execute(['id' => $id, 'Livro' => $this->Livro]);
        
        }

    public static function excluir($id){
        $pdo = Database::conectar();
        $stmt = $pdo->prepare("DELETE FROM livro WHERE id = :id");
        $stmt->execute(['id' => $id]);
    }

}

?>