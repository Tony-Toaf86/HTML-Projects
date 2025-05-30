<?php
try {
    $base = new PDO("mysql:host=localhost; dbname=inventario", "root", "");
    $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Asegurarse de que los datos vienen por POST
    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        $login = htmlentities(addslashes($_POST["usuario"]));
        $password = htmlentities(addslashes($_POST["password"]));

        // Buscar solo por el usuario
        $sql = "SELECT * FROM usuarios WHERE usuario = :login";
        $resultado = $base->prepare($sql);
        $resultado->bindValue(":login", $login);
        $resultado->execute();

        $row = $resultado->fetch(PDO::FETCH_ASSOC);

        // Si se encontró el usuario y la contraseña coincide
        if ($row && password_verify($password, $row["contrasena"])) {
            session_start();
            $_SESSION["usuario"] = $row["usuario"];
            //$_SESSION["idUsuario"] = $row["idUsuario"];
            //$_SESSION["rolUsuario"] = $row["rolUsuario"];
        
            header("Location: verificando_usuario.php");
        } else {
            echo "No se inició sesión. Usuario o contraseña incorrectos.";
            // header("Location: ../index.php");
        }

    } else {
        echo "Acceso no válido.";
    }

} catch (Exception $e) {
    die("Error: " . $e->getMessage());
}
?>
