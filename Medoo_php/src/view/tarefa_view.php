<?php

//require __DIR__ . '\Tarefa_Controller.php';

require __DIR__ . '\..\model\TarefaModel.php';
require __DIR__ . '\..\model\UserModel.php';
//$tarefaController = new Tarefa_Controller($db);
$tarefaModel = new TarefaModel($db);
$userModel = new UserModel($db);

//bloco logico para funcionamento do filtro da linha 12 a 41
if (!empty($_GET['colaborador']) || !empty($_GET['prioridade'])||!empty($_GET['data'])) {

    $ColaboradorName = $_GET['colaborador'] ?? null;
    $prioridade = $_GET['prioridade'] ?? null;
    $data = $_GET['data']??null;


    $where = [];
    if ((isset($ColaboradorName)) && (!empty($ColaboradorName))) {
    
        $userID = $userModel->getResponsavelByName($ColaboradorName) ?? null;
        
        $where['responsavel_id'] = $userID;
}
    if ((isset($prioridade)) && (!empty($prioridade))) {
        $where['prioridade'] = $prioridade; // Adiciona o filtro de prioridade
    }
    if ((isset($data)) && (!empty($data))) {
        $where['data_execucao'] = $data; // Adiciona o filtro de prioridade
    }
 

    $tarefas = $tarefaModel->getByResponsavelId($where);

} else {


    $tarefas = $tarefaModel->getTarefas();
}






?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <link type="text/css" rel="stylesheet" href="css/style.css" />

    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />




    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabela de Registros</title>
    <style>
        body {
            background: linear-gradient(to bottom right, #c8e6c9, #e0f2f1);
            /* Exemplo de gradiente linear */
        }
    </style>
</head>

<body>
    <nav id="logoNv">
        <div class="nav-wrapper">
            <a href="index.php" class="brand-logo" id="logo">PHP</a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="colaborador_create.php">Cadastro de colaboradores</a></li>
                <li><a href="tarefa_create.php">Cadastro de tarefas</a></li>

            </ul>
        </div>
    </nav>

    <div>

        <h1>Lista de Registros</h1>
        <div class="card green lighten-4" id="filtro">
            <div class="card-content black-text">

                <label class="labelF">Filtrar:</label>
                <input type="text" id="colaborador" name="colaborador" placeholder="Colaborador ">
                <select class="browser-default" name="prioridade" id="prioridade">
                    <option value="" disabled selected>Prioridade</option>
                    <option value="Alta">Alta</option>
                    <option value="Media">Media</option>
                    <option value="Baixa">Baixa</option>
                </select>
                <label for="data" id="lData">Selecione a data('Prazo inicial da atividade!')</label>
                <input type="date" id="data" name="data">
                <button onclick="searchData()" type="submit" class="waves-effect waves-light btn">
                    <i class="material-icons">filter_list</i></button>
                <button class="waves-effect waves-light btn"><a href="tarefa_view.php" id='limpar'><i
                            class="material-icons"></i>Limpar</a></button>
            </div>
        </div>
        <div class="card green lighten-4" id="filtro">
            <div class="card-content black-text">
                <table class="highlight">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Descricao</th>
                            <th>Data de inicio</th>
                            <th>Prioridade</th>
                            <th>Prazo limite</th>
                            <th>Colaborador</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($tarefas as $tarefa): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($tarefa['id']); ?></td>
                                <td><?php echo htmlspecialchars($tarefa['descricao']); ?></td>
                                <td><?php echo htmlspecialchars($tarefa['data_execucao']); ?></td>
                                <td><?php echo htmlspecialchars($tarefa['prioridade']); ?></td>
                                <td><?php echo htmlspecialchars($tarefa['prazo_limite']); ?></td>
                                <td><?php if ($tarefa['responsavel_id'] != null) {
                                    echo ($userModel->getByUserId((int) htmlspecialchars($tarefa['responsavel_id'])));
                                } ?>
                                </td>

                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <script>
            var colaborador = document.getElementById('colaborador');
            var prioridade = document.getElementById('prioridade');
            var data = document.getElementById('data')

            function searchData() {
                window.location = 'tarefa_view.php?colaborador=' + colaborador.value + "&prioridade=" + prioridade.value+"&data="+data.value;
            }


            
        </script>

</body>

</html>