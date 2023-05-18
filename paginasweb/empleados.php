<head>
  <!--
   -Criar um site de "vendas" basico
   -com pagina principal, produtos, cadastro e contatos.
  -->
  <script src="https://code.jquery.com/jquery-1.10.1.min.js"></script>
  <link rel="stylesheet" href="../css/cliente.css">
</head>
<body>
  <!-- -->
  <header class="menuheader">
    <ul>
      <li><a class="link-menu" href="#">Iniciar Sesion</a></li>      
    </ul>
  </header>
  <div class="lateral">
<ul class="menuVert">
<li><a href="clientes.php">Clientes</a></li>
<li><a href="facturas.php">Facturas</a></li>
<li><a href="servicios.php">Servicios</a></li>
<li><a href="vehiculos.php">Vehiculos</a></li>
</ul>
</div>
  <section class="content">
    <aside class="category">
    </aside>
    <div class="rectangulo">
    <a href="#">Añadir Empleado</a>
</div>
    <div class="destaque-prod">
    <?php 
$username = "root"; 
$password = "root"; 
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
    </div>    
  </section>
  <footer class="footer">
    
  </footer>
</body>