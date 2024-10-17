<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css.css" />
    <title>Registro de lugar</title>
  </head>
  <body>
    <!-- form para el registro de lugares  -->
    <form class="form">
      <p class="form-title">Registro de lugares</p>

      <label for="categoria">Seleccione una categoría de servicio:</label>
      <select id="categoria" name="categoria" required>
        <option value="">--Seleccione--</option>
        <!-- Opción predeterminada -->
        <option value="1">Servicios Básicos</option>
        <!-- Agrega más opciones según sea necesario -->
      </select>
      <!-- pendiente de configurar las categorias con el php -->

      <div class="input-container">
        <input placeholder="Nombre del lugar" type="text" />
      </div>

      <div class="input-container">
        <input placeholder="Direccion" type="text" />
      </div>

      <div class="input-container">
        <input placeholder="latitud" type="number" />
      </div>

      <div class="input-container">
        <input placeholder="Longitud" type="number" />
      </div>

      <div class="input-container">
        <input placeholder="Telefono" type="number" />
      </div>

      <div class="input-container">
        <input placeholder="Enlace de google" type="text" />
      </div>

      <button class="submit" type="submit">Registrar Lugar</button>
    </form>
  </body>
</html>
