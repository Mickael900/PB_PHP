<?php

session_start();

    class Aluno{
        private $nome;
        private $sobrenome;
        private $nota;
        private $data;
        private $idade;

        public function __construct($nome, $sobrenome, $nota, $data){
            $this->nome = $nome;
            $this->sobrenome = $sobrenome;
            $this->nota = $nota;
            $this->data = $data;
            $this->idade = $this->calcularIdade();
        }

        public function salvar(){
            //criar um array caso não exista
            if(!isset($_SESSION['alunos'])){
                $_SESSION['alunos'] = [];
            }
            $_SESSION['alunos'] [] = [
                'nome' => $this->nome,
                'sobrenome' => $this->sobrenome,
                'nota' => $this->nota,
                'data' => $this->data,
                'idade' => $this->idade
            ];
        }

        function calcularIdade(){
            $dataNascimento = new DateTime($this->data);
            $dataAtual = new DateTime(date('Y-m-d'));
            $idade = $dataNascimento->diff($dataAtual);
            return $idade->y;
        }

       
    }

    function calcularMedia($alunosLista){
        $somaNotas = 0;
        $cont = 0;

        foreach($alunosLista as $aluno){
            $somaNotas += $aluno['nota'];
            $cont++;
        }
       
        $media = $somaNotas / $cont;
        return $media;
    }

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $nome = $_POST['nome'];
        $sobrenome = $_POST['sobrenome'];
        $nota = $_POST['nota'];
        $data = $_POST['data'];

        $aluno = new Aluno($nome, $sobrenome, $nota, $data);
        $aluno->salvar();
    }

    if(isset($_GET['reset'])){
        session_destroy();
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Revisão PHP 🐘</title>
    </head>
    <body>
        <h2>Cadastro de Alunos</h2>
        <form action="#" method="POST">
            Nome:
            <input type="text" name="nome" value=""><br>
            Sobrenome:
            <input type="text" name="sobrenome" value=""><br>
            Nota:
            <input type="number" name="nota" min="1" max="10" value=""><br>
            Data de Nascimento:
            <input type="date" name="data" value=""><br>
            <button type="submit"> Cadastrar</button>
        <button type="reset"> Limpar</button>
        </form>
        <?php if(isset($_SESSION['alunos'])): ?>
        <table border="1">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Sobrenome</th>
                    <th>Nota</th>
                    <th>Data de Nascimento</th>
                    <th>Idade</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($_SESSION['alunos'] as $aluno): ?>
                <tr>
                    <td><?= $aluno['nome'] ?></td>
                    <td><?= $aluno['sobrenome'] ?></td>
                    <td><?= $aluno['nota'] ?></td>
                    <td><?= $aluno['data'] ?></td>
                    <td><?= $aluno['idade'] ?></td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
        <h3>Média dos alunos: <?= calcularMedia($_SESSION['alunos']) ?></h3>
        <?php endif; ?>
    </body>
</html>

