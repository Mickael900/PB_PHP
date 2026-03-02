<?php

require_once "Controller/UsuarioController.php";

$usuarioController = new UsuarioController();
$route = $_GET["route"] ?? '';

switch ($route) {
    case 'usuario/telaCadastro':
        $usuarioController->telaCadastro();
        break;

    case "usuario/salvar":
        $usuarioController->cadastrar();
        break;

    case "usuario/listar":
        $usuarioController->listarUsuario();
        break;
    
    case "usuario/telaEditar":
        $usuarioController ->telaEditar();
        break;

    case "usuario/atualizar":
        $usuarioController ->atualizar();
        break;
    
    case "usuario/excluir":
        $usuarioController->excluir();
        break;

    default:
        echo "Página não encontrada";
        break;
}




?>
 
