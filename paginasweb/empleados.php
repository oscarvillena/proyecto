<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <script src="https://code.jquery.com/jquery-1.10.1.min.js"></script>
  <link rel="stylesheet" href="../css/cliente.css">
  <style>
    body, html {
      height: 100%;
    }
  </style>
  <title>Página</title>
</head>
<body>
  <header class="menuheader">
  <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" style="display: inline;">
  <input type="hidden" name="logout">
  <button type="submit" class="button-primary">Cerrar Sesión</button>
</form>   
  </header>
  <div class="lateral">
    <div class="btn-group-vertical">
    <a href="clientes.php" class="btn btn-drak btn-block" role="button">Clientes</a>
  <a href="facturas.php" class="btn btn-drak btn-block" role="button">Facturas</a>
  <a href="servicios.php" class="btn btn-drak btn-block" role="button">Servicios</a>
  <a href="vehiculos.php" class="btn btn-drak btn-block" role="button">Vehiculos</a>
</div>
</div>
  <section class="content">
    <aside class="category">
    </aside>
    <div class="rectangulo">
    <a href="#" class="button-secondary">Añadir Empleado</a>
</div>
    <div class="destaque-prod">
    <?php 
$username = "root"; 
$password = "ASf1*7JOSEM"; 
$database = "taller_augusta"; 
$mysqli = new mysqli("localhost", $username, $password, $database);
$query = "SELECT * FROM empleado";


echo '<table border="1" cellspacing="1" cellpadding="1"> 
      <tr> 
          <td> <font face="Arial">Cod_Em</font> </td> 
          <td> <font face="Arial">Apellidos</font> </td> 
          <td> <font face="Arial">Nombre</font> </td> 
      </tr>';

if ($result = $mysqli->query($query)) {
    while ($row = $result->fetch_assoc()) {
        $field1name = $row["Cod_Em"];
        $field2name = $row["Apellidos"];
        $field3name = $row["Nombre"]; 

        echo '<tr> 
                  <td>'.$field1name.'</td> 
                  <td>'.$field2name.'</td> 
                  <td>'.$field3name.'</td> 
              </tr>';
    }
    $result->free();
} 
?>
<?php
session_start();

if (isset($_POST['logout'])) {
  session_unset();
  header("Location: paginaprincipal.php");
  exit();
}
?>
    </div>    
  </section>
  <footer class="footer">
    
  </footer>
</body>
</html>