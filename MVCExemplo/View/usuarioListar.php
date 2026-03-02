<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuario</title>
</head>
<body>
    <a href="/PB_PHP/MVCExemplo/usuario/telaCadastro"> Ir para tela Usario Cadastrar</a>
    <h2>Usuários</h2>
    <table border= "1">
        <tr>
            <th>Nome</th>
            <th>Email</th>
            <th>Ações</th>
       </tr>
       <?php foreach($usuarios as $id => $u): ?>
        <tr>
            <td><?= $u['nome']?></td>
            <td><?= $u['email']?></td>
            <td>
            <a href= "/PB_PHP/MVCExemplo/usuario/telaEditar?id=<?=$id?>">Editar</a>
            <a href= "/PB_PHP/MVCExemplo/usuario/excluir?id=<?= $id ?>">Excluir</a>
       </td>
       </tr>
       <?php endforeach; ?>
    </table>
 </body>
</html>




