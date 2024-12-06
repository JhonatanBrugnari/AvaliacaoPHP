<?php
require __DIR__ . '\..\model\UserModel.php';
$tarefaModel = new UserModel($db);
$tarefas = $tarefaModel->getUsers();

?>

<!DOCTYPE html>
<html lang="en">

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

        }
    </style>


</head>

<body>
    <nav id="logoNv">
        <div class="nav-wrapper">
            <a href="index.php" class="brand-logo" id="logo">PHP</a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="tarefa_view.php">Lista de Tarefas</a></li>
                <li><a href="colaborador_create.php">Cadastrar colaboradores</a></li>

            </ul>
        </div>
    </nav>
    <h1>Criação de tarefas</h1>
    <div class="card green lighten-4" id="filtro">
        <div class="card-content black-text">
            <div class="container">
                <div class="row">
                    <form method="POST" action="/medoo_php/src/controller/Tarefa_Controller.php">
                        <div class="input-field col s12">
                            <select class="browser-default" id="colaborador" name="colaborador">
                                <?php foreach ($tarefas as $tarefa): ?>
                                    <option value="<?php echo $tarefa['id'] ?>"><?php echo htmlspecialchars($tarefa['nome']); ?>
                                    </option>

                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="input-field col s12">
                            <select class="browser-default" name="prioridade">
                                <option value="" disabled selected>Prioridade</option>
                                <option value="alta">Alta</option>
                                <option value="media">Media</option>
                                <option value="baixa">Baixa</option>
                            </select>
                        </div>
                        <label>Data de inicio da atividade:</label>
                        <input type="date" id="data" name="data">
                </div>
                <div class="input-field col s12">
                    <input type="text" name="descricao" placeholder="Descrição da atividade" required>
                </div>
                <input type="hidden">

                <button class="waves-effect waves-light btn" type="submit">Criar</button>
                </form>
            </div>
        </div>
    </div>
    </div>
    <script>


    </script>
</body>

</html>
