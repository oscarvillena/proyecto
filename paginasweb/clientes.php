<head>
  <!--
   -Criar um site de "vendas" basico
   -com pagina principal, produtos, cadastro e contatos.
  -->
  <script src="https://code.jquery.com/jquery-1.10.1.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/cliente.css">
</head>
<body>

  <!-- -->
  <header class="menuheader">
      <a class="button-primary" href="#">Iniciar Sesion</a>   
  </header>
  <div class="lateral">
    <div class="btn-group-vertical">
  <a href="empleados.php" class="btn btn-drak btn-block" role="button">Empleados</a>
  <a href="facturas.php" class="btn btn-drak btn-block" role="button">Facturas</a>
  <a href="servicios.php" class="btn btn-drak btn-block" role="button">Servicios</a>
  <a href="vehiculos.php" class="btn btn-drak btn-block" role="button">Vehiculos</a>
</div>
</div>
  <section class="content">
    <aside class="category">
    </aside>
    <div class="rectangulo">
    <a href="#" class="button-secondary">Añadir Cliente</a>
</div>
    <div class="destaque-prod">
    <?php 
$username = "root"; 
$password = "ASf1*7JOSEM"; 
$database = "taller_augusta"; 
$mysqli = new mysqli("localhost", $username, $password, $database);
$query = "SELECT * FROM cliente";


echo '<table border="1" cellspacing="1" cellpadding="1" style="max-width: 500px;"> 
      <tr> 
          <td> <font face="Arial">Cod_Cl</font> </td> 
          <td> <font face="Arial">Descripcion</font> </td> 
          <td> <font face="Arial">Direccion</font> </td> 
          <td> <font face="Arial">Apellidos</font> </td> 
          <td> <font face="Arial">Telefono</font> </td> 
      </tr>';


if ($result = $mysqli->query($query)) {
    while ($row = $result->fetch_assoc()) {
        $field1name = $row["Cod_Cl"];
        $field2name = $row["Descripcion"];
        $field3name = $row["Direccion"];
        $field4name = $row["Apellidos"];
        $field5name = $row["Telefono"]; 

        echo '<tr> 
                  <td>'.$field1name.'</td> 
                  <td>'.$field2name.'</td> 
                  <td>'.$field3name.'</td> 
                  <td>'.$field4name.'</td> 
                  <td>'.$field5name.'</td> 
              </tr>';
    }
    $result->free();
} 
?>
    </div>
  </section>
  <footer class="footer">
  </footer>    
</body>