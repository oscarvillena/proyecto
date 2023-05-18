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
<li><a href="empleados.php">Empleados</a></li>
<li><a href="clientes.php">Clientes</a></li>
<li><a href="servicios.php">Servicios</a></li>
<li><a href="vehiculos.php">Vehiculos</a></li>
</ul>
</div>
  <section class="content">
    <aside class="category">
    </aside>
    <div class="rectangulo">
    <a href="#">Añadir Facturas</a>
</div>
    <div class="destaque-prod">
    <?php 
$username = "root"; 
$password = "ASf1*7JOSEM"; 
$database = "taller_augusta"; 
$mysqli = new mysqli("localhost", $username, $password, $database);
$query = "SELECT * FROM facturas";


echo '<table border="1" cellspacing="1" cellpadding="1"> 
      <tr> 
          <td> <font face="Arial">IdFactura</font> </td> 
          <td> <font face="Arial">Fecha</font> </td> 
          <td> <font face="Arial">Estado</font> </td> 
          <td> <font face="Arial">Cod_Cl</font> </td> 
          <td> <font face="Arial">IdServicio</font> </td> 
      </tr>';

if ($result = $mysqli->query($query)) {
    while ($row = $result->fetch_assoc()) {
        $field1name = $row["IdFactura"];
        $field2name = $row["Fecha"];
        $field3name = $row["Estado"];
        $field4name = $row["Cod_Cl"];
        $field5name = $row["IdServicio"]; 

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