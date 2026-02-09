<?php

    session_start();

    class Usuario{
        private $nome;
        private $email;
        private $senha;

        public function __construct($nome, $email, $senha){
            $this->nome = $nome;
            $this->email =$email;
            $this->senha = $senha;
        }

        public function salvar(){
            //criar o array se ainda nao existir
            if(!isset($_SESSION['usuarios'])){
                $_SESSION['usuarios'] = [];
            }
            $_SESSION['usuarios'][]= [
                'nome' => $this->nome,
                'email' => $this->email,
                'senha' => $this->senha
            ];
        }
    }

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $usuario = new Usuario($nome, $email, $senha);
        $usuario->salvar();
    }
    if(isset($_GET['reset'])){
    Session_destroy();
    }

    echo"<pre>";
    print_r($_SESSION);
    echo"</pre>";

?>


<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Formulário</title>
    </head>
    <body>
        <h2 style="color:darkblue; font-family:Arial"> Cadastro Usuário </h2>
        <form action="#" method="POST" style="background:#f2f2f2; padding:15px; border-radius:8px; width: 300px;">
        Nome: <br>
        <input type="text" name="nome" value="" style="width:100%;  margin-bottom:10px" >
        Email: <br>
        <input type="email" name="email" value="" style="width:100%; margin-bottom:10px" >
        Senha: <br>
        <input type="password" name="senha" value="" style="width:100%; margin-bottom:10px" >
        <button type="submit" style="background:green; color:white; padding: 5px 10px;"> Cadastrar</button>
        <button type="reset" style="background:red; color:white; padding: 5px 10px;"> Limpar</button>
        </form>
        <?php if(isset($_SESSION['usuarios'])): ?>
        <table border="1">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Senha</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($_SESSION['usuarios'] as $usuario): ?>
                <tr>
                    <td><?= $usuario['nome'] ?></td>
                    <td><?= $usuario['email'] ?></td>
                    <td><?= $usuario['senha'] ?></td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
        <?php endif; ?>
    </body>
</html>
