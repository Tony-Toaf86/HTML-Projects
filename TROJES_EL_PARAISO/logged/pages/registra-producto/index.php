<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="css.css" />
  <title>Registro de productos</title>
</head>

<body>
  <!-- form para registro de productos  -->

  <form class="form" method="post" action="../../app/registra_producto.php">
    <p class="form-title">Registro de productos</p>

    <label for="categoria">Seleccione una categoría:</label>

    <select id="categoria" name="categoria" required>
      <option value="">Seleccione</option>
      <?php
      require_once("../../app/conn.php");
      $conn = new mysqli($servername, $username, $password, $dbname);
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }
      try {
        $stmt = $conn->prepare("SELECT nombre_categoria_producto FROM categoriaproducto");
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            echo "<option value='" . $row["nombre_categoria_producto"] . "'>" . $row["nombre_categoria_producto"] . "</option>";
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
      <input placeholder="Nombre Producto" type="text" />
    </div>

    <div class="input-container">
      <input placeholder="Descripcion" type="text" />
    </div>
    <div class="input-container">
      <input placeholder="Precio" type="number" />
    </div>
    <input type="file" name="file" id="file">
    <button class="submit" type="submit">Registrar</button>
  </form>
</body>

</html>