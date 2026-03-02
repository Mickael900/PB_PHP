<!DOCTYPE html> 
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <title>Tela Editar</title>
</head>
<body>
    <h2>Editar Produtos</h2>
    <a href="/PB_PHP/Atividade01/produto/listar">Ir para a tela Listar</a>

    <form method="POST" action="atualizar?id=<?= $_GET['id'] ?>">
        <input type="text" name="id" value="<?=htmlspecialchars($_GET['id'])?>"disabled>
        <input type="text" name="nome" value="<?=htmlspecialchars($produto['nome'])?>"require>
        <input type="number" name="preco" value="<?=htmlspecialchars($produto['preco'])?>"require>
        <input type="number" name="quantidade" value="<?=htmlspecialchars($produto['quantidade'])?>"require>
        <input type="date" name="validade" value="<?=htmlspecialchars($produto['validade'])?>"require>
        <button type="submit">Editar</button>
</form>
</body>
</html>
