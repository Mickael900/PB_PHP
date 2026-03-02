<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Produtos</title>
</head>
<body>
    <a href="/PB_PHP/Atividade01/produto/telaCadastro">Voltar a tela telaCadastro</a>
    <h2>Produtos</h2>
    <table border="1">
        <tr>
            <th>Nome</th>
            <th>Preco</th>
            <th>Quantidade</th>
            <th>Validade</th>
            <th>Ações</th>
</tr>
<?php foreach($produtos as $id => $p): ?>
    <tr>
        <td><?= $p['nome']?></td>
        <td><?= $p['preco']?></td>
        <td><?= $p['quantidade']?></td>
        <td><?= $p['validade']?></td>
        <td>
            <a href="/PB_PHP/Atividade01/produto/telaEditar?id=<?= $id ?>">
                Editar
            </a>
            <a href="/PB_PHP/Atividade01/produto/excluir?id=<?= $id ?>">
                Excluir
            </a>
        </td>
</tr>
<?php endforeach; ?>

</table>
</body>
</html>
