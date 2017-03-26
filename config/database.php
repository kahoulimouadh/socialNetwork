<?php

 // var_dump(PDO::getAvailableDrivers()); affiche les drivers disponibles

define('DB_HOST','localhost');
define('DB_NAME','id1055579_boom');
define('DB_USERNAME','root');//id1055579_social
define('DB_PASSWORD','');//social

try{
	$db = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USERNAME,DB_PASSWORD);
	$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
	die('Erreur: '.$e->getMessage());
}