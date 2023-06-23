<?php

session_start();

if (isset($_POST['logout'])) {
  session_unset();
  header("Location: paginaprincipal.php");
  exit();
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["codCl"]) && isset($_POST["nombre"]) && isset($_POST["direccion"]) && isset($_POST["apellidos"]) && isset($_POST["telefono"])) {
  $codCl = $_POST["codCl"];
  $nombre = $_POST["nombre"];
  $direccion = $_POST["direccion"];
  $apellidos = $_POST["apellidos"];
  $telefono = $_POST["telefono"];

  $username = "root"; 
  $password = "ASf1*7JOSEM"; 
  $database = "taller_augusta"; 
  $mysqli = new mysqli("localhost", $username, $password, $database);

  
  $checkQuery = "SELECT Cod_Cl FROM cliente WHERE Cod_Cl = '$codCl'";
  $checkResult = $mysqli->query($checkQuery);
  if ($checkResult->num_rows > 0) {
    echo "El código de cliente ya existe. Por favor, elija otro código.";
  } else {
    $query = "INSERT INTO cliente (Cod_Cl, Nombre, Direccion, Apellidos, Telefono) VALUES ('$codCl', '$nombre', '$direccion', '$apellidos', '$telefono')";

    if ($mysqli->query($query)) {
      echo "El nuevo cliente se ha añadido correctamente a la base de datos.";
    } else {
      echo "Error al añadir el nuevo cliente: " . $mysqli->error;
    }
  }

  $mysqli->close();

  
  header("Location: ".$_SERVER['PHP_SELF']);
}

session_start();

if (isset($_POST['logout'])) {
  session_unset();
  header("Location: paginaprincipal.php");
  exit();
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["codCl_eliminar"])) {
  $codCl_eliminar = $_POST["codCl_eliminar"];

  $username = "root"; 
  $password = "ASf1*7JOSEM"; 
  $database = "taller_augusta"; 
  $mysqli = new mysqli("localhost", $username, $password, $database);

  
  $checkQuery = "SELECT Cod_Cl FROM cliente WHERE Cod_Cl = '$codCl_eliminar'";
  $checkResult = $mysqli->query($checkQuery);
  if ($checkResult->num_rows > 0) {
    $deleteQuery = "DELETE FROM cliente WHERE Cod_Cl = '$codCl_eliminar'";
    if ($mysqli->query($deleteQuery)) {
      echo "El cliente se ha eliminado correctamente de la base de datos.";
    } else {
      echo "Error al eliminar el cliente: " . $mysqli->error;
    }
  } else {
    echo "El código de cliente no existe en la base de datos. Por favor, ingrese un código válido.";
  }

  $mysqli->close();

  
  header("Location: ".$_SERVER['PHP_SELF']);
}
?>

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
  <title>Clientes</title>
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
      <a href="#" class="button-secondary" id="btnAddCliente">Añadir Cliente</a>
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
                <td> <font face="Arial">Nombre</font> </td> 
                <td> <font face="Arial">Direccion</font> </td> 
                <td> <font face="Arial">Apellidos</font> </td> 
                <td> <font face="Arial">Telefono</font> </td> 
            </tr>';

      if ($result = $mysqli->query($query)) {
          while ($row = $result->fetch_assoc()) {
              $field1name = $row["Cod_Cl"];
              $field2name = $row["Nombre"];
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
    <hr>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
      <input type="text" name="codCl_eliminar" placeholder="Código del Cliente a Eliminar" required>
      <button type="submit" class="button-primary">Eliminar Cliente</button>
    </form>
  </section>

  <footer class="footer">
  </footer>    

  <script>
    document.getElementById("btnAddCliente").addEventListener("click", function(event) {
      event.preventDefault(); 

      var form = document.createElement("form");
      form.method = "post";
      form.action = "<?php echo $_SERVER['PHP_SELF']; ?>";

      var inputCodCl = document.createElement("input");
      inputCodCl.type = "text";
      inputCodCl.name = "codCl";
      inputCodCl.placeholder = "Código del Cliente";
      inputCodCl.required = true;

      var inputNombre = document.createElement("input");
      inputNombre.type = "text";
      inputNombre.name = "nombre";
      inputNombre.placeholder = "Nombre";
      inputNombre.required = true;

      var inputDireccion = document.createElement("input");
      inputDireccion.type = "text";
      inputDireccion.name = "direccion";
      inputDireccion.placeholder = "Dirección";
      inputDireccion.required = true;

      var inputApellidos = document.createElement("input");
      inputApellidos.type = "text";
      inputApellidos.name = "apellidos";
      inputApellidos.placeholder = "Apellidos";
      inputApellidos.required = true;

      var inputTelefono = document.createElement("input");
      inputTelefono.type = "text";
      inputTelefono.name = "telefono";
      inputTelefono.placeholder = "Teléfono";
      inputTelefono.required = true;

      var submitButton = document.createElement("button");
      submitButton.type = "submit";
      submitButton.textContent = "Añadir Cliente";

      form.appendChild(inputCodCl);
      form.appendChild(inputNombre);
      form.appendChild(inputDireccion);
      form.appendChild(inputApellidos);
      form.appendChild(inputTelefono);
      form.appendChild(submitButton);

      var btnAddCliente = document.getElementById("btnAddCliente");
      btnAddCliente.parentNode.replaceChild(form, btnAddCliente);
    });
  </script>
</body>
</html>
