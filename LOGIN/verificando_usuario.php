<?php
session_start();

if (isset($_SESSION['idUsuario']) && isset($_SESSION['usuario'])) {
    try {
        $base = new PDO("mysql:host=localhost; dbname=inventario", "root", "");
        $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $id_usuario = $_SESSION['idUsuario'];
        $nombre_usuario = $_SESSION['usuario'];

        $sql = "SELECT nombre, apellido, rolUsuario FROM usuarios WHERE idUsuario = :id";
        $resultado = $base->prepare($sql);
        $resultado->bindValue(":id", $id_usuario);
        $resultado->execute();

        $row = $resultado->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            $nombreCompleto = $row['nombre'] . ' ' . $row['apellido'];
            $rol = $row['rolUsuario'];

            echo "<strong>Usuario que inició sesión:</strong> $nombre_usuario<br>";
            echo "<strong>Nombre completo:</strong> $nombreCompleto<br>";

            switch ($rol) {
                case 1:
                    echo "<strong>Rol:</strong> Administrador";
                    break;
                case 2:
                    echo "<strong>Rol:</strong> Usuario normal";
                    break;
                case 3:
                    echo "<strong>Rol:</strong> Usuario lector";
                    break;
                default:
                    echo "<strong>Rol:</strong> Desconocido";
                    break;
            }
        } else {
            echo "No se encontró información para el usuario con ID: $id_usuario";
        }
    } catch (Exception $e) {
        die("Error en la conexión o consulta: " . $e->getMessage());
    }
} else {
    echo "No hay una sesión activa. Por favor, inicie sesión.";
}
?>
