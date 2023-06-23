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
  <title>Vehiculos</title>
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
      <a href="clientes.php" class="btn btn-drak btn-block" role="button">Clientes</a>
    </div>
  </div>

  <section class="content">
    <aside class="category">
    </aside>
    <div class="rectangulo">
      <a href="#" class="button-secondary" id="btnAddVehiculo">Añadir Vehiculo</a>
    </div>
    <div class="destaque-prod">
      <?php 
      $username = "root"; 
      $password = "ASf1*7JOSEM"; 
      $database = "taller_augusta"; 
      $mysqli = new mysqli("localhost", $username, $password, $database);
      $query = "SELECT * FROM vehiculo";

      echo '<table border="1" cellspacing="1" cellpadding="1" style="max-width: 500px;"> 
            <tr> 
                <td> <font face="Arial">Matricula</font> </td> 
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
              $field1name = $row["Matricula"];
              $field2name = $row["Modelo"];
              $field3name = $row["Orden"];
              $field4name = $row["Marca"];
              $field5name = $row["Color"];
              $field6name = $row["Cod_Em"];
              $field7name = $row["Cod_Cl"];
              $field8name = $row["Tipo_Vehiculo"]; 

              echo '<tr> 
                        <td>'.$field1name.'</td> 
                        <td>'.$field2name.'</td> 
                        <td>'.$field3name.'</td> 
                        <td>'.$field4name.'</td> 
                        <td>'.$field5name.'</td>
                        <td>'.$field6name.'</td> 
                        <td>'.$field7name.'</td> 
                        <td>'.$field8name.'</td> 
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

      if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["Matricula"]) && isset($_POST["Modelo"]) && isset($_POST["Orden"]) && isset($_POST["Marca"]) && isset($_POST["Color"])&& isset($_POST["Cod_Em"]) && isset($_POST["Cod_Cl"]) && isset($_POST["Tipo_Vehiculo"])) {
        $Matricula = $_POST["Matricula"];
        $Modelo = $_POST["Modelo"];
        $Orden = $_POST["Orden"];
        $Marca = $_POST["Marca"];
        $Color = $_POST["Color"];
        $Cod_Em = $_POST["Cod_Em"];
        $Cod_Cl = $_POST["Cod_Cl"];
        $Tipo_Vehiculo = $_POST["Tipo_Vehiculo"];

        $username = "root"; 
        $password = "ASf1*7JOSEM"; 
        $database = "taller_augusta"; 
        $mysqli = new mysqli("localhost", $username, $password, $database);

        
        $checkQuery = "SELECT Matricula FROM vehiculo WHERE Matricula = '$Matricula'";
        $checkResult = $mysqli->query($checkQuery);
        if ($checkResult->num_rows > 0) {
          echo "La matricula ya existe. Por favor, elija otro código.";
        } else {
          $query = "INSERT INTO vehiculo (Matricula, Modelo, Orden, Marca, Color, Cod_Em, Cod_Cl, Tipo_Vehiculo) VALUES ('$Matricula', '$Modelo', '$Orden', '$Marca', '$Color', '$Cod_Em', '$Cod_Cl', '$Tipo_Vehiculo')";

          if ($mysqli->query($query)) {
            echo "El nuevo vehiculo se ha añadido correctamente a la base de datos.";
          } else {
            echo "Error al añadir el nuevo vehiculo: " . $mysqli->error;
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

      if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["codVe_eliminar"])) {
        $codVe_eliminar = $_POST["codVe_eliminar"];

        $username = "root"; 
        $password = "ASf1*7JOSEM"; 
        $database = "taller_augusta"; 
        $mysqli = new mysqli("localhost", $username, $password, $database);

        
        $checkQuery = "SELECT Matricula FROM vehiculo WHERE Matricula = '$codVe_eliminar'";
        $checkResult = $mysqli->query($checkQuery);
        if ($checkResult->num_rows > 0) {
          $deleteQuery = "DELETE FROM vehiculo WHERE Matricula = '$codVe_eliminar'";
          if ($mysqli->query($deleteQuery)) {
            echo "El vehiculo se ha eliminado correctamente de la base de datos.";
          } else {
            echo "Error al eliminar el vehiculo: " . $mysqli->error;
          }
        } else {
          echo "La matricula no existe en la base de datos. Por favor, ingrese un código válido.";
        }

        $mysqli->close();

        
        header("Location: ".$_SERVER['PHP_SELF']);
      }
      ?>
      <hr>
      <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <input type="text" name="codVe_eliminar" placeholder="La matricula a Eliminar" required>
        <button type="submit" class="button-primary">Eliminar Vehiculo</button>
      </form>
    </div>
  </section>

  <footer class="footer">
  </footer>    

  <script>
    document.getElementById("btnAddVehiculo").addEventListener("click", function(event) {
      event.preventDefault(); 

     
      var form = document.createElement("form");
      form.method = "post";
      form.action = "<?php echo $_SERVER['PHP_SELF']; ?>";

      var inputMatricula = document.createElement("input");
      inputMatricula.type = "text";
      inputMatricula.name = "Matricula";
      inputMatricula.placeholder = "Matricula";
      inputMatricula.required = true;

      var inputModelo = document.createElement("input");
      inputModelo.type = "text";
      inputModelo.name = "Modelo";
      inputModelo.placeholder = "Modelo";
      inputModelo.required = true;

      var inputOrden = document.createElement("input");
      inputOrden.type = "text";
      inputOrden.name = "Orden";
      inputOrden.placeholder = "Orden";
      inputOrden.required = true;

      var inputMarca = document.createElement("input");
      inputMarca.type = "text";
      inputMarca.name = "Marca";
      inputMarca.placeholder = "Marca";
      inputMarca.required = true;

      var inputColor = document.createElement("input");
      inputColor.type = "text";
      inputColor.name = "Color";
      inputColor.placeholder = "Color";
      inputColor.required = true;

      var inputCod_Em = document.createElement("input");
      inputCod_Em.type = "text";
      inputCod_Em.name = "Cod_Em";
      inputCod_Em.placeholder = "Cod_Em";
      inputCod_Em.required = true;

      var inputCod_Cl = document.createElement("input");
      inputCod_Cl.type = "text";
      inputCod_Cl.name = "Cod_Cl";
      inputCod_Cl.placeholder = "Cod_Cl";
      inputCod_Cl.required = true;

      var inputTipo_Vehiculo = document.createElement("input");
      inputTipo_Vehiculo.type = "text";
      inputTipo_Vehiculo.name = "Tipo_Vehiculo";
      inputTipo_Vehiculo.placeholder = "Tipo_Vehiculo";
      inputTipo_Vehiculo.required = true;

      var submitButton = document.createElement("button");
      submitButton.type = "submit";
      submitButton.textContent = "Añadir Vehiculo";

      
      form.appendChild(inputMatricula);
      form.appendChild(inputModelo);
      form.appendChild(inputOrden);
      form.appendChild(inputMarca);
      form.appendChild(inputColor);
      form.appendChild(inputCod_Em);
      form.appendChild(inputCod_Cl);
      form.appendChild(inputTipo_Vehiculo);
      form.appendChild(submitButton);

      
      var btnAddVehiculo = document.getElementById("btnAddVehiculo");
      btnAddVehiculo.parentNode.replaceChild(form, btnAddVehiculo);
    });
  </script>
</body>
</html>
