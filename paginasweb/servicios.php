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
      <a href="facturas.php" class="btn btn-drak btn-block" role="button">Facturas</a>
      <a href="servicios.php" class="btn btn-drak btn-block" role="button">Empleados</a>
      <a href="vehiculos.php" class="btn btn-drak btn-block" role="button">Vehiculos</a>
    </div>
  </div>

  <section class="content">
    <aside class="category">
    </aside>
    <div class="rectangulo">
      <a href="#" class="button-secondary" id="btnAddServicio">Añadir Servicio</a>
    </div>
    <div class="destaque-prod">
      <?php 
      $username = "root"; 
      $password = "ASf1*7JOSEM"; 
      $database = "taller_augusta"; 
      $mysqli = new mysqli("localhost", $username, $password, $database);
      $query = "SELECT * FROM servicios";

      echo '<table border="1" cellspacing="1" cellpadding="1" style="max-width: 500px;"> 
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

      if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["idServicio"]) && isset($_POST["reparacion"])) {
        $idServicio = $_POST["idServicio"];
        $reparacion = $_POST["reparacion"];

        $username = "root"; 
        $password = "ASf1*7JOSEM"; 
        $database = "taller_augusta"; 
        $mysqli = new mysqli("localhost", $username, $password, $database);

        
        $checkQuery = "SELECT IdServicio FROM servicios WHERE IdServicio = '$idServicio'";
        $checkResult = $mysqli->query($checkQuery);
        if ($checkResult->num_rows > 0) {
          echo "El código de servicio ya existe. Por favor, elija otro código.";
        } else {
          $query = "INSERT INTO servicios (IdServicio, Reparacion) VALUES ('$idServicio', '$reparacion')";

          if ($mysqli->query($query)) {
            echo "El nuevo servicio se ha añadido correctamente a la base de datos.";
          } else {
            echo "Error al añadir el nuevo servicio: " . $mysqli->error;
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

      if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["codSe_eliminar"])) {
        $codSe_eliminar = $_POST["codSe_eliminar"];

        $username = "root"; 
        $password = "ASf1*7JOSEM"; 
        $database = "taller_augusta"; 
        $mysqli = new mysqli("localhost", $username, $password, $database);

        
        $checkQuery = "SELECT IdServicio FROM servicios WHERE IdServicio = '$codSe_eliminar'";
        $checkResult = $mysqli->query($checkQuery);
        if ($checkResult->num_rows > 0) {
          $deleteQuery = "DELETE FROM servicios WHERE IdServicio = '$codSe_eliminar'";
          if ($mysqli->query($deleteQuery)) {
            echo "El servicio se ha eliminado correctamente de la base de datos.";
          } else {
            echo "Error al eliminar el servicio: " . $mysqli->error;
          }
        } else {
          echo "El código de servicio no existe en la base de datos. Por favor, ingrese un código válido.";
        }

        $mysqli->close();

        
        header("Location: ".$_SERVER['PHP_SELF']);
      }
      ?>
      <hr>
      <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <input type="text" name="codSe_eliminar" placeholder="Código del servicio a Eliminar" required>
        <button type="submit" class="button-primary">Eliminar Servicio</button>
      </form>
    </div>
  </section>

  <footer class="footer">
  </footer>    

  <script>
  document.getElementById("btnAddServicio").addEventListener("click", function(event) {
    event.preventDefault();

    var form = document.createElement("form");
    form.method = "post";
    form.action = "<?php echo $_SERVER['PHP_SELF']; ?>";

    var inputIdServicio = document.createElement("input");
    inputIdServicio.type = "text";
    inputIdServicio.name = "idServicio";
    inputIdServicio.placeholder = "Código del Servicio";
    inputIdServicio.required = true;

    var inputReparcion = document.createElement("input");
    inputReparcion.type = "number";
    inputReparcion.name = "reparacion";
    inputReparcion.placeholder = "Reparacion";
    inputReparcion.required = true;

    var submitButton = document.createElement("button");
    submitButton.type = "submit";
    submitButton.textContent = "Añadir Servicio";

    form.appendChild(inputIdServicio);
    form.appendChild(inputReparcion);
    form.appendChild(submitButton);


    var btnAddServicio = document.getElementById("btnAddServicio");
    btnAddServicio.parentNode.replaceChild(form, btnAddServicio);
  });
</script>

</body>
</html>
