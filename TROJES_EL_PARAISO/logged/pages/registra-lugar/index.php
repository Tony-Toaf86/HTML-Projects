<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css.css" />
    <title>Registro de lugar</title>
  </head>
  <body>
    <form class="form" method="post" action="../../app/registra_lugar.php">
      <p class="form-title">Registro de lugares</p>

      <label for="categoria">Seleccione una categoría de servicio:</label>
      <select id="categoria" name="categoria" required>
      <option value="">Seleccione</option>
      <?php
      require_once("../../app/conn.php");
      $conn = new mysqli($servername, $username, $password, $dbname);
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }
      try {
        $stmt = $conn->prepare("SELECT id_categoria,  nombre_categoria FROM categoriaservicio");
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            // echo "<option value='" . $row["nombre_categoria"] . "'>" . $row["nombre_categoria"] . "</option>";
            echo "<option value='" . $row["id_categoria"] . "'>" . $row["nombre_categoria"] . "</option>";
            $_SESSION['id_categoria'] = $row['id_categoria'];

          }
        } else {
          echo "<option value=''>No hay categorías disponibles</option>";
        }
      } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
      }
      $conn->close();
      ?>
    </select>
      <div class="input-container">
        <input placeholder="Nombre del lugar" type="text" name="nombre_lugar" />
      </div>

      <div class="input-container">
        <input placeholder="Direccion" type="text" name="direccion"/>
      </div>

      <div class="input-container">
        <input placeholder="latitud" type="" name="latitud"/>
      </div>

      <div class="input-container">
        <input placeholder="Longitud" type="" name="longitud" />
      </div>

      <div class="input-container">
        <input placeholder="Telefono" type="number" name="telefono" />
      </div>

      <div class="input-container">
        <input placeholder="Enlace de google" type="text" name="enlace" />
      </div>

      <button class="submit" type="submit">Registrar Lugar</button>
    </form>
  </body>
</html>
