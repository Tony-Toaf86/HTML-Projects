<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css.css">
    <title>Registrar Usuarios</title>
</head>
<body>
    <!-- foro de registro de usuariosfe -->
<form class="form">
    <p class="title">Registrarse </p>
    <p class="message">Registrase para total acceso. </p>
        <div class="flex">
        <label class="input_text">
            <input class="input" type="text" placeholder="" required="">
            <span>Primer Nombre</span>
        </label>

        <label class="input_text">
            <input class="input " type="text" placeholder="" required="">
            <span>Apellido</span>
        </label>
    </div>  
            
    <label>
        <input class="input" type="email" placeholder="" required="">
        <span>Email</span>
    </label> 
        
    <label>
        <input class="input" type="password" placeholder="" required="">
        <span>Contraseña</span>
    </label>
    <label>
        <input class="input" type="password" placeholder="" required="">
        <span>Confirmar Conraseña</span>
    </label>
    <div class="submit">
        <a href="../../includes/registrausuario.php" class="">Registrar Usuario</a>
    </div>
    <!-- pendietne de reparar el texto centrado -->
    
    <p class="signin">Ya tienes cuenta ? <a href="../login/">Iniciar</a> </p>
</form>

</body>
</html>