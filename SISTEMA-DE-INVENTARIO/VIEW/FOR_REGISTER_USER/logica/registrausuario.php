<?php
require 'conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario y sanearlos
    $nombre = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
    $apellido = filter_var($_POST['apellido'], FILTER_SANITIZE_STRING);
    $correo = filter_var($_POST['correo'], FILTER_SANITIZE_EMAIL);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hashear la contraseña
    $rolid = 2;
    // Verificar si las contraseñas coinciden
    if ($_POST['password'] !== $_POST['truepassword']) {
        echo "Las contraseñas no coinciden.";
        exit();
    }

    try {
        // Verificar si el usuario ya existe (por correo electrónico, por ejemplo)
        $consulta_verificar = $base->prepare("SELECT COUNT(*) FROM usuarios WHERE correo = ?");
        $consulta_verificar->bindParam(1, $correo); // Aquí el índice debe ser 1, no 4
        $consulta_verificar->execute();
        $resultado = $consulta_verificar->fetchColumn();

        if ($resultado > 0) {
            echo "El correo electrónico ya está registrado.";
        } else {
            // Insertar los datos
            $consulta = $base->prepare("INSERT INTO usuarios (nombre, apellido, correo, contrasena, id_rol) VALUES (?, ?, ?, ?, ?)");
            $consulta->bindParam(1, $nombre);
            $consulta->bindParam(2, $apellido);
            $consulta->bindParam(3, $correo);
            $consulta->bindParam(4, $password);
            $consulta->bindParam(5, $rolid); // 2 es el id_rol por defecto, lo puedes cambiar según tu lógica
            $consulta->execute();

            echo "Usuario agregado correctamente.";
        }
    } catch (PDOException $e) {
        echo "Error al agregar usuario: " . $e->getMessage();
        // Registrar el error en un log para análisis posterior
        error_log("Error al insertar usuario: " . $e->getMessage());
    }
} 

else {
    // Esto solo se ejecutará si el formulario no se envió
    echo "No se envió el formulario.";
    exit();
}
