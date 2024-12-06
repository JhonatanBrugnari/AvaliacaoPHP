<?php 
require __DIR__ .'/../vendor/autoload.php';

// config. do banco de dados usando  Medoo .
use Medoo\Medoo;
 
$db = new Medoo([
	// [required]
	'type' => 'mysql',
	'host' => 'localhost',
	'database' => 'colab',
	'username' => 'root',
	'password' => 'admin',
]);
