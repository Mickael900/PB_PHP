<?php

class Usuario{
    private $nome;
    private $email;


    public function __construct ($nome, $email){
        $this-> nome = $nome;
        $this-> email = $email;
    }

    public function salvar(){
        if(!isset($_SESSION['usuarios'])){
            $_SESSION['usuarios'] = [];
        }

        $_SESSION['usuarios'][] = [
            'nome' => $this->nome,
            'email' => $this->email
        ];
    }
    public static function listar(){
        return $_SESSION['usuarios'] ?? [];
    }

    public static function buscar ($id){
        return $_SESSION ['usuarios'][$id] ?? null;

    }

    public function atualizar($id){
        if(isset($_SESSION['usuarios'][$id])){
            $_SESSION['usuarios'][$id]=[
                'nome' => $this -> nome,
                'email' => $this -> email
            ];
        }
    }
    public static function excluir($id){
        if(isset($_SESSION['usuarios'][$id])){
            unset($_SESSION['usuarios'][$id]);
        }
            
    }
}




?>


