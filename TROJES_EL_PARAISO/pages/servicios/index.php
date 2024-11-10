<!doctype html>
<html lang="en">
  <head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" >
    <title>Servicios</title>   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  </head>
  <style>
        li{
            /* list-style-type:none; */
            
        }
        a{
            text-decoration:none;
        }
  </style>
<body>

    <h1 class="h1 text-center"> Servios disponibles en Este Pueblo</h1>
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

    // Consulta para obtener las categorías
    $sql = "SELECT * FROM categoriaservicio";
    $stmt = $conn->query($sql);
    echo '<div class="container">';
    echo '  <div class="row">';

    $col_count = 0;

    // Verificar si hay resultados en la tabla de categorías
    if ($stmt->rowCount() > 0) {
        // Iterar a través de cada categoría
        while ($categoria = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Controlar el número de columnas por fila
            if ($col_count % 3 == 0 && $col_count != 0) {
                echo '</div><div class="row">'; // Nueva fila después de cada 3 columnas
            }

            // título de la categoría
            echo '<div class="col-lg-4 col-md-6  border border-danger  rounded">';
            echo '<h4  class="text-center">' . htmlspecialchars(string: $categoria["nombre_categoria"]) . '</h4>';

            // Consulta para obtener los servicios de cada categoría
            $sql2 = "SELECT * FROM servicios WHERE id_categoria = ?";
            $stmt2 = $conn->prepare($sql2);
            $stmt2->execute([$categoria["id_categoria"]]);

            // Verificar si hay servicios asociados a esta categoría
            if ($stmt2->rowCount() > 0) {
                echo '<ol>';
                // Mostrar cada servicio asociado a la categoría
                while ($servicio = $stmt2->fetch(PDO::FETCH_ASSOC)) {
                    echo '<li><a href="../../includes/detalle_servicio.php?id_servicio=' . $servicio["id_servicio"] . '">' . htmlspecialchars($servicio["nombre_servicio"]) . '</a></li>';
                }
                echo '</ol>';
            } else {
                echo '<p>No hay servicios en esta categoría.</p>';
            }

            echo '</div>'; 
            $col_count++;
        }
    } else {
        echo '<p>No se encontraron categorías.</p>';
    }
    echo '  </div>';
    echo '</div>';
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}
$conn = null;
?>
</body>
</html>
