<?php
try {
    $base = new PDO("mysql:host=localhost; dbname=trojes", "root", "");
    $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT id_usuario, correo, contrasena, id_rol FROM usuarios WHERE correo = :login AND contrasena = :password";

    $resultado = $base->prepare($sql);

    $login = htmlentities(addslashes($_POST["usuario"]));
    $password = htmlentities(addslashes($_POST["password"]));

    $resultado->bindValue(":login", $login);
    $resultado->bindValue(":password", $password);

    $resultado->execute();

    $numero_registro = $resultado->rowCount();

    if ($numero_registro != 0) {
        session_start();
        $row = $resultado->fetch(PDO::FETCH_ASSOC);
        $_SESSION['id_usuario'] = $row['id_usuario'];
        $_SESSION['usuario'] = $row['correo'];
        $_SESSION['id_rol'] = $row['id_rol'];

        header("Location: validarusuario.php");
    } else {
        header("Location: ../includes/Sesion_no_iniciada.php");
    }

} catch (Exception $e) {
    die("Error: " . $e->getMessage());
}
?>
