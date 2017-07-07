<?php
$api_key = $_POST['_API_KEY_'] ?? "";

/*
 * API get ALL rows from table words
 *
 * @copyright NGenchevEOOD
 **/
header('Access-Control-Allow-Origin: http://localhost:4200'); 
require_once('autoload.php');

$sql = "SELECT * FROM words";
$get = (new DBConnection())->pdo_conn();
$get = $get->prepare($sql);
$get->execute();
$get = $get->fetchAll();

echo json_encode($get);
