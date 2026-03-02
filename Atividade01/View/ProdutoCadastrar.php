<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Cadastro Produto</title>

<body>

<a href="/PDE_PHP/Atividade01/produto/listar">Listar Produtos</a>

<h2>Cadastrar Produto</h2>

<form method="POST" action="salvar">

<input type="text" name="nome" placeholder="Nome Produto" require><br><br>

<input type="number" name="preco" placeholder="Preço" require><br><br>

<input type="number" name="quantidade" placeholder="Quantidade" require><br><br>

<input type="date" name="validade" require><br><br>

<button type="submit">Cadastrar</button>

</form>

</body>
</html>