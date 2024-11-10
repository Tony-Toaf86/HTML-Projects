<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" >
    <title>Menu</title>   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  </head>
  <body class="p-3 m-0 border-0 bd-example m-0 border-0">

    <!-- navbar Tony Alonzo -->
    
    <nav class="navbar navbar-expand-lg bg-info bg-opacity-25 border-0 rounded">
    <div class="container-fluid">
    <a class="navbar-brand" href="#">HOME</a>    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Alternar navegación">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
    <li class="nav-item">
    <a class="nav-link" href="../pages/servicios/">Servicios</a>
    </li>
    <li class="nav-item">
    <a class="nav-link" href="../pages/productos/">Productos</a>
    </li>
    <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
    Opsiones
    </a>
    <ul class="dropdown-menu">
      <!-- opsiones del menu desplegable -->
    <li><a class="dropdown-item" href="../pages/registra-usuario/">Registrar Nuevo Usuario</a></li>
    <li><a class="dropdown-item" href="pages/registra-lugar/">Registrar Lugar</a></li>
    <li><a class="dropdown-item" href="pages/registra-producto/">Registrar Producto</a></li>
    <li><a class="dropdown-item" href="pages/mis-datos/">Mis Datos</a></li>
    <li><a class="dropdown-item" href="app/finalizar_sesion.php">Cerrar Sesion</a></li>
    <li>
    <hr class="dropdown-divider">
    </li>
    </ul>
    </li>
  
    </ul>
    <form class="d-flex" role="search">
    <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">
    <button class="btn btn-outline-info  text-dark" type="submit">Buscar</button>
    
    <ul class="nav">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle decoration-none" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fa-solid fa-user-astronaut"></i>
        </a>
          <ul class="dropdown-menu dropdown-menu-end">
            <li><a class="dropdown-item" href="../pages/sobre-nosotros/">Sobre Nosotros</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="pages/editar-perfil/">Editar Mi Perfil</a></li>
            </ul>
        </li>
      </ul>
    
    </form>
    </div>
    </div>
    </nav>
    

  </body>
</html>