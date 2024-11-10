<?php
// Datos de conexión
$host = "localhost";
$dbname = "trojes";
$username = "root";
$password = "";
try {
    $base = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    
    $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $base->exec("SET NAMES utf8");
    
	session_start(); 

} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
    die();
}
?>
