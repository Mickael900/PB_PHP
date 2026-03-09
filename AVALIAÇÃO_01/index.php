<?php

require_once "Controller/UsuarioController.php";

$LivroController = new livroController();
$route = $_GET["route"] ?? '';

switch ($route){
    case 'livro/telaCadastro':
        $LivroController->telaCadastro();
        break;

    case "livro/salvar":
        $usuarioController->cadastrar();
        break;
    
    case "livro/listar":
        $livroController->listarLivro();
        break;

     case "livro/telaEditar":
        $usuarioController ->telaEditar();
        break;

    case "livro/atualizar":
        $usuarioController ->atualizar();
        break;
    
    case "livro/excluir":
        $usuarioController->excluir();
        break;

    default:
        echo "Página não encontrada";
        break;
}

    
?>