<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
                <li><a href="tarefa_create.php">Cadastrar tarefas</a></li>

            </ul>
        </div>
    </nav>
    <h1>Cadastro de Colaboradores</h1>
    <div class="card green lighten-4" id="filtro">
        <div class="card-content black-text">

            <form action="/medoo_php/src/controller/user_Controller.php" method="POST">

                <div class="row">
                    <form class="col s12">
                        <div class="row">
                            <div class="input-field col s6">
                                <input id="name" type="text" class="validate" name="name">
                                <label for="name">Nome</label>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <input class="Cpf" id="text" type="text" class="validate" name="cpf">
                                    <label>CPF</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="text" type="email" class="validate" name="email">
                                    <label for="email">Email</label>
                                </div>
                            </div>
                            <div class="row" id="cadastro">
                                <div class="col s12"></div>
                                <button class="btn waves-effect waves-light" type="submit" name="action" id="">Cadastrar
                                    <i class="material-icons right">add</i>
                                </button>
                    </form>

                </div>
        </div>

</body>

</html>