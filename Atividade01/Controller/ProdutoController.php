<?php

session_start();
require_once "./model/Produto.php";

class ProdutoController{

    public function telaCadastro(){
        require "View/ProdutoCadastrar.php";
    }

    public function cadastrar(){
        $nome = $_POST['nome'];
        $preco = $_POST['preco'];
        $quantidade = $_POST['quantidade'];
        $validade = $_POST['validade'];

        $produto = new Produto($nome, $preco, $quantidade, $validade);
        $produto->salvar();
        header('Location: /PB_PHP/Atividade01/produto/telaCadastro');
        exit;
    }

    public function listarProdutos(){
        $produtos = Produto::listar();
        echo"<pre>";
        print_r($produtos);
        echo"<pre>";
        require 'View/ProdutoListar.php';

    }

     public function telaEditar(){
        $produto = Produto::buscar($_GET['id']);
        require 'View/produtoEditar.php';
    }

    public function atualizar(){
        $produto = new Produto($_POST['nome'],$_POST['preco'],$_POST['quantidade'],$_POST['validade'],);
        $produto->atualizar($_GET['id']);
        header('Location: /PB_PHP/Atividade01/produto/telaEditar?id='.($_GET['id']));
        exit;

    }

    public function excluir(){
        Produto::excluir($_GET['id']);
        header('Location: /PB_PHP/Atividade01/produto/listar');
        exit;
    }


}

