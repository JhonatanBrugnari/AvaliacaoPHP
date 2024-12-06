<?php


require __DIR__ . '\..\model\TarefaModel.php';
require __DIR__ . '\..\model\UserModel.php';




$tarefa = new TarefaModel($db); // criando objeto da model de tarefas
$tarefaU = new UserModel($db); // criando objeto da model de colaboradores

//atribui valores vindos da view para tratar e armazenar no banco de dados
$desc = $_POST['descricao'];
$prioridade = $_POST['prioridade'];
$exec = $_POST['data'];
$resp =$_POST['colaborador'];


$tarefa->createTarefa($desc, $prioridade,$exec,$resp);

$tarefa->getTarefas();
$tarefaU->getUsers();
?>



<a href="/medoo_php/src/view/index.php">Cadastro realizado(voltar ao inicio)</a>

