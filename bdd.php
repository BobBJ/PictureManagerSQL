<?php

try
{
	$bdd = new PDO('mysql:host=localhost;dbname=p1911736;charset=utf8', 'p1911736', 'Taking96Gently');
}
catch (Exception $e)
{
	die('Erreur : '.$e->getMessage());
}

session_start();
?>