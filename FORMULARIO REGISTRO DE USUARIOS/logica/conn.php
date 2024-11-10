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
    
// veficando que la conexion es exitosa
	session_start(); //inicando la coexion

} catch (PDOException $e) {
    // Si hay un error de conexión, mostrarlo
    echo "Error de conexión: " . $e->getMessage();
    die();
}
?>
