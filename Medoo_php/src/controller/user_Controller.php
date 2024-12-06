<?php
require __DIR__ . '/../model/UserModel.php';



$userID = new UserModel($db);

//atribui valores vindos da view para tratar e armazenar no banco de dados
$name = $_POST['name'];
$email = $_POST['email'];
$cpf= $_POST['cpf'];



$userID->createUser($name,$email, $cpf);
?>





<a href="/medoo_php/src/view/index.php">Cadastro realizado(voltar ao inicio)</a>