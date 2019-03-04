<?php

try
{
	$pdo = new PDO("mysql:host=localhost;dbname=projeto_esqueciasenha",'root', 'mysql');
}catch(PDOException $e)
{
	die($e->getMessage());
}