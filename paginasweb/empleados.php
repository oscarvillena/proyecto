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
  <title>Empleados</title>
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
      <a href="#" class="button-secondary" id="btnAddEmpleado">Añadir Empleado</a>
    </div>
    <div class="destaque-prod">
      <?php 
      $username = "root"; 
      $password = "ASf1*7JOSEM"; 
      $database = "taller_augusta"; 
      $mysqli = new mysqli("localhost", $username, $password, $database);
      $query = "SELECT * FROM empleado";

      echo '<table border="1" cellspacing="1" cellpadding="1" style="max-width: 500px;"> 
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

      if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["codEm"]) && isset($_POST["apellidos"]) && isset($_POST["nombre"])) {
        $codEm = $_POST["codEm"];
        $nombre = $_POST["nombre"];
        $apellidos = $_POST["apellidos"];

        $username = "root"; 
        $password = "ASf1*7JOSEM"; 
        $database = "taller_augusta"; 
        $mysqli = new mysqli("localhost", $username, $password, $database);

        
        $checkQuery = "SELECT Cod_Em FROM empleado WHERE Cod_Em = '$codEm'";
        $checkResult = $mysqli->query($checkQuery);
        if ($checkResult->num_rows > 0) {
          echo "El código de empleado ya existe. Por favor, elija otro código.";
        } else {
          $query = "INSERT INTO empleado (Cod_Em, Apellidos, Nombre) VALUES ('$codEm', '$apellidos', '$nombre')";

          if ($mysqli->query($query)) {
            echo "El nuevo empleado se ha añadido correctamente a la base de datos.";
          } else {
            echo "Error al añadir el nuevo empleado: " . $mysqli->error;
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

      if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["codEm_eliminar"])) {
        $codEm_eliminar = $_POST["codEm_eliminar"];

        $username = "root"; 
        $password = "ASf1*7JOSEM"; 
        $database = "taller_augusta"; 
        $mysqli = new mysqli("localhost", $username, $password, $database);

        
        $checkQuery = "SELECT Cod_Em FROM empleado WHERE Cod_Em = '$codEm_eliminar'";
        $checkResult = $mysqli->query($checkQuery);
        if ($checkResult->num_rows > 0) {
          $deleteQuery = "DELETE FROM empleado WHERE Cod_Em = '$codEm_eliminar'";
          if ($mysqli->query($deleteQuery)) {
            echo "El empleado se ha eliminado correctamente de la base de datos.";
          } else {
            echo "Error al eliminar el empleado: " . $mysqli->error;
          }
        } else {
          echo "El código de empleado no existe en la base de datos. Por favor, ingrese un código válido.";
        }

        $mysqli->close();

        
        header("Location: ".$_SERVER['PHP_SELF']);
      }
      ?>
      <hr>
      <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <input type="text" name="codEm_eliminar" placeholder="Código del empleado a Eliminar" required>
        <button type="submit" class="button-primary">Eliminar Empleado</button>
      </form>
    </div>
  </section>

  <footer class="footer">
  </footer>    

  <script>
  document.getElementById("btnAddEmpleado").addEventListener("click", function(event) {
    event.preventDefault();

    var form = document.createElement("form");
    form.method = "post";
    form.action = "<?php echo $_SERVER['PHP_SELF']; ?>";

    var inputCodEm = document.createElement("input");
    inputCodEm.type = "text";
    inputCodEm.name = "codEm";
    inputCodEm.placeholder = "Código del Empleado";
    inputCodEm.required = true;

    var inputApellidos = document.createElement("input");
    inputApellidos.type = "text";
    inputApellidos.name = "apellidos";
    inputApellidos.placeholder = "Apellidos";
    inputApellidos.required = true;

    var inputNombre = document.createElement("input");
    inputNombre.type = "text";
    inputNombre.name = "nombre";
    inputNombre.placeholder = "Nombre";
    inputNombre.required = true;

    var submitButton = document.createElement("button");
    submitButton.type = "submit";
    submitButton.textContent = "Añadir Empleado";

    form.appendChild(inputCodEm);
    form.appendChild(inputApellidos);
    form.appendChild(inputNombre);
    form.appendChild(submitButton);

    var btnAddEmpleado = document.getElementById("btnAddEmpleado");
    btnAddEmpleado.parentNode.replaceChild(form, btnAddEmpleado);
  });
</script>

</body>
</html>
