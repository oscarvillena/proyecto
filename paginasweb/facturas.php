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
  <title>Facturas</title>
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
      <a href="clientes.php" class="btn btn-drak btn-block" role="button">Clientes</a>
      <a href="servicios.php" class="btn btn-drak btn-block" role="button">Servicios</a>
      <a href="vehiculos.php" class="btn btn-drak btn-block" role="button">Vehiculos</a>
    </div>
  </div>

  <section class="content">
    <aside class="category">
    </aside>
    <div class="rectangulo">
      <a href="#" class="button-secondary" id="btnAddFacturas">Añadir Facturas</a>
    </div>
    <div class="destaque-prod">
      <?php 
      
      
      $username = "root"; 
      $password = "ASf1*7JOSEM"; 
      $database = "taller_augusta"; 
      $mysqli = new mysqli("localhost", $username, $password, $database);
      $query = "SELECT * FROM facturas";

      echo '<table border="1" cellspacing="1" cellpadding="1" style="max-width: 500px;"> 
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

      <?php
      session_start();

      if (isset($_POST['logout'])) {
        session_unset();
        header("Location: paginaprincipal.php");
        exit();
      }

      if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["idFactura"]) && isset($_POST["fecha"]) && isset($_POST["estado"]) && isset($_POST["cod_Cl"]) && isset($_POST["idServicio"])) {
        $idFactura = $_POST["idFactura"];
        $fecha = $_POST["fecha"];
        $estado = $_POST["estado"];
        $cod_Cl = $_POST["cod_Cl"];
        $idServicio = $_POST["idServicio"];

        $username = "root"; 
        $password = "ASf1*7JOSEM"; 
        $database = "taller_augusta"; 
        $mysqli = new mysqli("localhost", $username, $password, $database);

        
        $checkQuery = "SELECT IdFactura FROM facturas WHERE IdFactura = '$idFactura'";
        $checkResult = $mysqli->query($checkQuery);
        if ($checkResult->num_rows > 0) {
          echo "El código de factura ya existe. Por favor, elija otro código.";
        } else {
          $query = "INSERT INTO facturas (IdFactura, Fecha, Estado, Cod_Cl, IdServicio) VALUES ('$idFactura', '$fecha', '$estado', '$cod_Cl', '$idServicio')";

          if ($mysqli->query($query)) {
            echo "La nueva factura se ha añadido correctamente a la base de datos.";
          } else {
            echo "Error al añadir la nueva factura: " . $mysqli->error;
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

      if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["codFa_eliminar"])) {
        $codFa_eliminar = $_POST["codFa_eliminar"];

        $username = "root"; 
        $password = "ASf1*7JOSEM"; 
        $database = "taller_augusta"; 
        $mysqli = new mysqli("localhost", $username, $password, $database);

        
        $checkQuery = "SELECT IdFactura FROM facturas WHERE IdFactura = '$codFa_eliminar'";
        $checkResult = $mysqli->query($checkQuery);
        if ($checkResult->num_rows > 0) {
          $deleteQuery = "DELETE FROM facturas WHERE IdFactura = '$codFa_eliminar'";
          if ($mysqli->query($deleteQuery)) {
            echo "La nueva factura se ha eliminado correctamente de la base de datos.";
          } else {
            echo "Error al eliminar la factura: " . $mysqli->error;
          }
        } else {
          echo "El código de la factura no existe en la base de datos. Por favor, ingrese un código válido.";
        }

        $mysqli->close();

        
        header("Location: ".$_SERVER['PHP_SELF']);
      }
      ?>
      <hr>
      <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <input type="text" name="codFa_eliminar" placeholder="Código de la Factura a Eliminar" required>
        <button type="submit" class="button-primary">Eliminar Facturas</button>
      </form>
    </div>
  </section>

  <footer class="footer">
  </footer>    

  <script>
    document.getElementById("btnAddFacturas").addEventListener("click", function(event) {
      event.preventDefault(); 

     
      var form = document.createElement("form");
      form.method = "post";
      form.action = "<?php echo $_SERVER['PHP_SELF']; ?>";

      var inputIdFactura = document.createElement("input");
      inputIdFactura.type = "text";
      inputIdFactura.name = "idFactura";
      inputIdFactura.placeholder = "Código de factura";
      inputIdFactura.required = true;

      var inputFecha = document.createElement("input");
      inputFecha.type = "text";
      inputFecha.name = "fecha";
      inputFecha.placeholder = "Fecha";
      inputFecha.required = true;

      var inputEstado = document.createElement("input");
      inputEstado.type = "text";
      inputEstado.name = "estado";
      inputEstado.placeholder = "Estado";
      inputEstado.required = true;

      var inputCod_Cl = document.createElement("input");
      inputCod_Cl.type = "text";
      inputCod_Cl.name = "cod_Cl";
      inputCod_Cl.placeholder = "Codigo del cliente";
      inputCod_Cl.required = true;

      var inputIdServicio = document.createElement("input");
      inputIdServicio.type = "text";
      inputIdServicio.name = "idServicio";
      inputIdServicio.placeholder = "IdServicio";
      inputIdServicio.required = true;

      var submitButton = document.createElement("button");
      submitButton.type = "submit";
      submitButton.textContent = "Añadir Factura";

      
      form.appendChild(inputIdFactura);
      form.appendChild(inputFecha);
      form.appendChild(inputEstado);
      form.appendChild(inputCod_Cl);
      form.appendChild(inputIdServicio);
      form.appendChild(submitButton);

      
      var btnAddFacturas = document.getElementById("btnAddFacturas");
      btnAddFacturas.parentNode.replaceChild(form, btnAddFacturas);
    });
  </script>
</body>
</html>
