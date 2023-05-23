<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="../framework/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
  <link rel="stylesheet" href="../framework/all.min.css">
  <script src="../framework/jquery-1.10.1.min.js"></script>
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
  <a href="empleados.php" class="btn btn-drak btn-block" role="button">Empleados</a>
  <a href="servicios.php" class="btn btn-drak btn-block" role="button">Servicios</a>
  <a href="vehiculos.php" class="btn btn-drak btn-block" role="button">Vehiculos</a>
</div>
</div>
  <section class="content">
    <aside class="category">
    </aside>
    <div class="rectangulo">
    <a href="#" class="button-secondary">Añadir Servicio</a>
</div>
    <div class="destaque-prod">
    <?php 
$username = "root"; 
$password = "ASf1*7JOSEM"; 
$database = "taller_augusta"; 
$mysqli = new mysqli("localhost", $username, $password, $database);
$query = "SELECT * FROM servicios";


echo '<table border="1" cellspacing="1" cellpadding="1"> 
      <tr> 
          <td> <font face="Arial">IdServicio</font> </td> 
          <td> <font face="Arial">Reparacion</font> </td>  
      </tr>';

if ($result = $mysqli->query($query)) {
    while ($row = $result->fetch_assoc()) {
        $field1name = $row["IdServicio"];
        $field2name = $row["Reparacion"];

        echo '<tr> 
                  <td>'.$field1name.'</td> 
                  <td>'.$field2name.'</td> 
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