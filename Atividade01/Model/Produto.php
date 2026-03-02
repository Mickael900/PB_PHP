<?php


class Produto{
    private $nome;
    private $preco;
    private $quantidade;
    private $validade;

    public function __construct($nome, $preco, $quantidade, $validade){
        $this->nome = $nome;
        $this->preco = $preco;
        $this->quantidade = $quantidade;
        $this->validade = $validade;
    }

    public function salvar(){
        if(!isset($_SESSION['produtos'])){
            $_SESSION['produtos'] = [];
        }

        $_SESSION['produtos'][] = [
            'nome' => $this->nome,
            'preco' => $this->preco,
            'quantidade' => $this->quantidade,
            'validade' => $this->validade
        ];
    }

    public static function listar(){
        return $_SESSION['produtos']?? [];
    }
    public static function buscar($id){
        return $_SESSION['produtos'][$id] ?? null;
    }

    public function atualizar($id){
        if(isset($_SESSION['produtos'][$id])){
            $_SESSION['produtos'][$id] = [
                'nome' => $this->nome,
                'preco' => $this->preco,
                'quantidade' => $this->quantidade,
                'validade' => $this->validade
            ];
        }
    }


    public static function excluir($id){
        if(isset($_SESSION['produtos'][$id])){
            unset($_SESSION['produtos'][$id]);
        }
    }


}
