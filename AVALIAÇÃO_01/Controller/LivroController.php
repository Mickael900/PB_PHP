<?php 
 
 session_start(); //banco de dados
 require_once "./Model/LivrosModel.php";
 
 class LivrosController{
    public function telaCadastro(){
        require "View/CadastroLivro.php";
    }

    public function cadastrar(){
        $livro = $_POST['livro']

        $livro = new Livro($livro);
        $Livro->salvar();
        header('Location: /PB_PHP/AVALIAÇÃO_01/usuario/telaCadastro');
        exit;

    }
    public function ListarLivro(){
        $livro = livro::listar();
        echo"<pre>";
        print_r($livro);
        echo"<pre>";
        require 'View/ListarLivro.php';
    }

    public function telaEditar(){
        $livro = livro::bucar($_GET['id']);
        require 'View/EditarLivrosSS.php';

    }

    public function atualizar(){
        $livro = new livro($_POST['Livro']);
        $livro ->atualizar($_GET['id']);
        header('location:/PB_PHP/AVALIAÇÃO/usuario/telaEditar?id='. ($_GET['id']));
        exit
    }

    public function excluir(){
        livro::excluir($_GET['id']);
        header('location:/PB_PHP/AVALIAÇÃO_01/usuario/listar');
        exit;
    }

    
 }

 ?>