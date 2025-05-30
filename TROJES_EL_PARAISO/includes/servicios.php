<?php

// Parámetros de conexión a la base de datos
$servername = "localhost"; // El servidor de la base de datos
$username = "root";        // El nombre de usuario de la base de datos
$password = "";            // La contraseña del usuario de la base de datos
$dbname = "trojes";        // El nombre de tu base de datos

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar si la conexión fue exitosa
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Escribir la consulta SQL
$sql = "SELECT nombre_categoria FROM categoriaservicio";

$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categoría de los Servicios</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }
        h1 {
            text-align: center;
        }
        .container {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }
        .column {
            flex: 1;
            margin: 0 10px;
        }
        .column h2 {
            text-align: center;
            border-bottom: 1px solid #000;
        }
        .column ul {
            list-style-type: none;
            padding: 0;
        }
        .column ul li {
            padding: 5px 0;
            text-align: center;
        }
        .column ul li a {
            text-decoration: none;
            color: #007bff;
        }
        .column ul li a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<h1>Categoría de los Servicios</h1>

<div class="container">
    <div class="column">
        <h2>Columna 1</h2>
        <ul>
        <?php
        // Verificar si hay resultados
        if ($result->num_rows > 0) {
            // Dividir los resultados en 3 columnas
            $count = 0;
            $column_size = ceil($result->num_rows / 3);
            // Reiniciamos el puntero de resultado a la primera fila
            mysqli_data_seek($result, 0);

            while ($row = $result->fetch_assoc()) {
                if ($count > 0 && $count % $column_size == 0) {
                    // Cambiar a la siguiente columna después de column_size elementos
                    echo '</ul></div><div class="column"><h2>Columna ' . (ceil($count / $column_size) + 1) . '</h2><ul>';
                }
                echo "<li><a href='#'>" . $row["nombre_categoria"] . "</a></li>";
                $count++;
            }
        } else {
            echo "<li>No hay resultados</li>";
        }
        ?>
        </ul>
    </div>
</div>

<?php
// Cerrar la conexión
$conn->close();
?>

</body>
</html>
