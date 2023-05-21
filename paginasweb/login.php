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
        <a class="navbar-brand" href="paginaprincipal.php">Inicio</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
    </nav>
  </header>
  <hr>
  <main class="container min-vw-100">
    <div class="row mt-4">
      <div class="col">
        <div class="p-4 bg-light text-center">
          <div class="container">
            <div class="row justify-content-center mt-5">
              <div class="col-md-6">
                <h3>Solo Empleados</h3>
                <hr>
                <div class="card">
                  <div class="card-body">
                    <h1 class="text-center mb-4">Iniciar Sesión</h1>
                    <img src="../imagenes/logo.png" alt="Bienvenido" class="img-fluid">
                    <form method="POST" action="login.php">
                      <div class="mb-3">
                        <label for="email" class="form-label">Codigo Empleado</label>
                        <input type="text" class="form-control" id="cod_em" name="cod_em" placeholder="Ingresa tu código de empleado">
                      </div>
                      <div class="mb-3">
                        <label for="password" class="form-label">Nombre</label>
                        <input type="password" class="form-control" id="nombre" name="nombre" placeholder="Ingresa tu nombre">
                      </div>
                      <div class="text-center">
                        <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
                      </div>
                    </form>
                    <?php
session_start();

if (isset($_SESSION['cod_em']) && isset($_SESSION['nombre'])) {
  header("Location: clientes.php");
  exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $cod_em = $_POST['cod_em'];
  $nombre = $_POST['nombre'];

  $username = "root";
  $password = "ASf1*7JOSEM";
  $database = "taller_augusta";
  $mysqli = new mysqli("localhost", $username, $password, $database);

  if ($mysqli->connect_error) {
    die("Error de conexión: " . $mysqli->connect_error);
  }

  $query = "SELECT Cod_Em, Nombre FROM empleado WHERE Cod_Em = '$cod_em' AND Nombre = '$nombre'";
  $result = $mysqli->query($query);

  if ($result->num_rows === 1) {
    $row = $result->fetch_assoc();
    $cod_em = $row['Cod_Em'];
    $nombre = $row['Nombre'];

    $_SESSION['cod_em'] = $cod_em;
    $_SESSION['nombre'] = $nombre;

    header("Location: clientes.php");
    exit();
  } else {
    echo '<div class="alert alert-danger mt-3">Credenciales incorrectas</div>';
  }

  $mysqli->close();
}
?>


                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <hr>
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

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
