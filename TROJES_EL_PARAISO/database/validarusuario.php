<?php
session_start();

if (isset($_SESSION['id_usuario'])) {
    try {
        $base = new PDO("mysql:host=localhost; dbname=trojes", "root", "");
        $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $id_usuario = $_SESSION['id_usuario'];

        $nombre_usuario = $_SESSION['usuario'];


        $sql = "SELECT id_rol FROM usuarios WHERE id_usuario = :id";
        $resultado = $base->prepare($sql);
        $resultado->bindValue(":id", $id_usuario);
        $resultado->execute();

        $row = $resultado->fetch(PDO::FETCH_ASSOC);
         $rol = $row['id_rol'];
        if ($row!=false) {

            if ($rol == 1) {
                //usuario administrador
                // header("Location: ../admin/admin.php");
                header("Location: ../pages/paginausuario/");  

            }elseif ($rol == 2) {
                //usuario comun
                header("Location: ../pages/paginausuario/");  

            }
        } else {
            echo "No se encontró información para el usuario con ID: $id_usuario";
        }
    } catch (Exception $e) {
        die("Error: " . $e->getMessage());
    }
} else {
    echo "ID de usuario no disponible en la sesión.";
}
?>
