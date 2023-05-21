<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
 
  <style>
    body, html {
      height: 100%;
    }
  </style>
  <title>Página básica con Bootstrap 5</title>
  
</head>
<body class="vh-100">
  <header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
        <a class="navbar-brand" href="login.php">Iniciar Sesion</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
    </nav>
  </header>

  <main class="container min-vw-100">
    <div class="row mt-4">
      <div class="col">
        <div class="p-4 bg-light text-center">
          <h1>Bienvenido</h1>
          <img src="../imagenes/logo.png" alt="Bienvenido" class="img-fluid">
          <hr>
          <h3>¡Confía en nuestros expertos para el mantenimiento y reparación de tu vehículo!</h3>
          <h3>Si quieres pedir cita puedes darle al boton qué tienes justo debajo</h3>
          <h3>Tambien si quieres ir directamente a nuestro taller lo puedes visitar o dar al segundo boton el cual te llevara a donde nos ubicamos y un poco historia de nuestro taller</h3>
          
          <div class="my-3">
          <hr>
            <a href="citacliente.php" class="btn btn-primary">Pedir Cita</a>
          </div>
          <hr>
          <div>
            <a href="quienessomos.php" class="btn btn-secondary">Quienes Somos</a>
          </div>
          <div class="mt-4">
            <h4>Síguenos en redes sociales:</h4>
            <ul class="list-inline">
              <li class="list-inline-item">
                <a href="#" target="_blank"><i class="fab fa-facebook-square"></i></a>
              </li>
              <li class="list-inline-item">
                <a href="#" target="_blank"><i class="fab fa-twitter-square"></i></a>
              </li>
              <li class="list-inline-item">
                <a href="#" target="_blank"><i class="fab fa-instagram-square"></i></a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </main>

  <footer class="bg-dark text-light py-3">
    <div class="container">
      <div class="row">
        <div class="col text-center">
          <p>Derechos de autor &copy; 2023 Mi Sitio. Todos los derechos reservados.</p>
        </div>
      </div>
    </div>
  </footer>
</body>
</html>
