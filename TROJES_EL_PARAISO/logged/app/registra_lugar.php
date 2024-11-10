<?php
require 'conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario y sanearlos
    $nombre_lugar = filter_var($_POST['nombre_lugar'], FILTER_SANITIZE_STRING);
    $direccion = filter_var($_POST['direccion'], FILTER_SANITIZE_STRING);
    $latitud = filter_var($_POST['latitud'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    $longitud = filter_var($_POST['longitud'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    $telefono = filter_var($_POST['telefono'], FILTER_SANITIZE_NUMBER_INT);
    $enlace = filter_var($_POST['enlace'], FILTER_SANITIZE_URL); // Considera usar FILTER_VALIDATE_URL para una validación más estricta
    // $id_categoria = filter_var($_POST['id_categoria'], FILTER_SANITIZE_NUMBER_INT);
    // $id_categoria =2;

    // linea que obtiene el id de la categoria del foro
    // pendiente de rescatar el id del usuario 
    if (isset($_SESSION['id_categoria'])) {
        $id_categoria = $_SESSION['id_categoria'];
        // Validar si se recibió un ID de categoría válido
        if (empty($id_categoria)) {
            echo "Debe seleccionar una categoría.";
            exit();
        }

    }



    try {
        // Verificar si el lugar ya existe por nombre
        $consulta_verificar = $base->prepare("SELECT COUNT(*) FROM registralugar WHERE nombre_lugar = ?");
        $consulta_verificar->bindParam(1, $nombre_lugar);
        $consulta_verificar->execute();
        $resultado = $consulta_verificar->fetchColumn();

        if ($resultado > 0) {
            echo "El lugar a registrar ya existe.";
        } else {
            // Insertar los datos
            $consulta = $base->prepare("INSERT INTO registralugar (nombre_lugar, direccion, latitud,
             longitud, enlace, id_categoria, id_usuario, telefono) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
            $consulta->bindParam(1, $nombre_lugar);
            $consulta->bindParam(2, $direccion);
            $consulta->bindParam(3, $latitud);
            $consulta->bindParam(4, $longitud);
            $consulta->bindParam(5, $enlace);
            $consulta->bindParam(6, $id_categoria);
            $consulta->bindParam(7, $id_usuario);  // pendiente de configurar
            $consulta->bindParam(8, $telefono);
          
            $consulta->execute();

            echo "Lugar agregado correctamente.";
        }
    } catch (PDOException $e) {
        echo "Error al agregar lugar: " . $e->getMessage();
        error_log("Error al insertar lugar: " . $e->getMessage());
    }
} else {
    echo "No se envió el formulario.";
    exit();
}


?>