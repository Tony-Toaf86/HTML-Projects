<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Detalles del Servicio</title>
</head>
<body>
    <div class="container mt-5">
        <?php
        // Configuración de la conexión a la base de datos
        $servidor = "localhost";
        $usuario = "root";
        $contraseña = "";
        $base_datos = "trojes";

        try {
            // Crear la conexión
            $conn = new PDO("mysql:host=$servidor;dbname=$base_datos", $usuario, $contraseña);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Verificar si se ha pasado un id_servicio en la URL
            if (isset($_GET["id_servicio"])) {
                $id_servicio = $_GET["id_servicio"];

                // Preparar y ejecutar la consulta para obtener el servicio específico
                $sql = "SELECT * FROM servicios WHERE id_servicio = ?";
                $stmt = $conn->prepare($sql);
                $stmt->execute([$id_servicio]);

                // Verificar si se encontró el servicio
                if ($stmt->rowCount() > 0) {
                    $servicio = $stmt->fetch(PDO::FETCH_ASSOC);
                    
                    // Mostrar los detalles del servicio
                    echo '<h2>' . htmlspecialchars($servicio["nombre_servicio"]) . '</h2>';
                    echo '<p><strong>Descripción:</strong> ' . htmlspecialchars($servicio["descripcion"]) . '</p>';
                    // echo '<p><strong>Precio:</strong> $' . htmlspecialchars($servicio["precio"]) . '</p>';
                } else {
                    echo '<p>Servicio no encontrado.</p>';
                }
            } else {
                echo '<p>No se ha especificado un servicio.</p>';
            }
        } catch (PDOException $e) { 
            echo "Error de conexión: " . $e->getMessage();
        }
        
        // Cerrar la conexión
        $conn = null;
        ?>
    </div>
</body>
</html>
