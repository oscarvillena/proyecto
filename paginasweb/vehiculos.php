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
  <a href="empleados.php" class="btn btn-drak btn-block" role="button">Empleados</a>
</div>
</div>
  <section class="content">
    <aside class="category">
    </aside>
    <div class="rectangulo">
    <a href="#" class="button-secondary">Añadir Vehiculo</a>
</div>
    <div class="destaque-prod">
    <?php 
$username = "root"; 
$password = "ASf1*7JOSEM"; 
$database = "taller_augusta"; 
$mysqli = new mysqli("localhost", $username, $password, $database);
$query = "SELECT * FROM vehiculo";


echo '<table border="1" cellspacing="1" cellpadding="1"> 
      <tr> 
          <td> <font face="Arial">Modelo</font> </td> 
          <td> <font face="Arial">Orden</font> </td> 
          <td> <font face="Arial">Marca</font> </td> 
          <td> <font face="Arial">Color</font> </td> 
          <td> <font face="Arial">Cod_Em</font> </td>
          <td> <font face="Arial">Cod_Cl</font> </td> 
          <td> <font face="Arial">Tipo_Vehiculo</font> </td> 
      </tr>';

if ($result = $mysqli->query($query)) {
    while ($row = $result->fetch_assoc()) {
        $field1name = $row["Modelo"];
        $field2name = $row["Orden"];
        $field3name = $row["Marca"];
        $field4name = $row["Color"];
        $field5name = $row["Cod_Em"];
        $field6name = $row["Cod_Cl"]; 
        $field7name = $row["Tipo_Vehiculo"];  

        echo '<tr> 
                  <td>'.$field1name.'</td> 
                  <td>'.$field2name.'</td> 
                  <td>'.$field3name.'</td> 
                  <td>'.$field4name.'</td> 
                  <td>'.$field5name.'</td>
                  <td>'.$field6name.'</td>
                  <td>'.$field7name.'</td>
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