<head>
  <!--
   -Criar um site de "vendas" basico
   -com pagina principal, produtos, cadastro e contatos.
  -->
  <script src="https://code.jquery.com/jquery-1.10.1.min.js"></script>
  <link rel="stylesheet" href="../css/login.css">
  
</head>
<body>
  <!-- -->
  <header class="menu">
    <ul>
      <li><a class="link-menu" href="paginaprincipal.php">Inicio</a></li>      
    </ul>
  </header>
  <div class="wrapper">
    <form class="form-signin">       
      <h2 class="form-signin-heading">Iniciar</h2>
      <input type="text" class="form-control" name="username" placeholder="Empleado" required="" autofocus="" />
      <input type="password" class="form-control" name="password" placeholder="Cod_Em" required=""/>      
      <p><button class="btn btn-lg btn-primary btn-block" type="submit">Login</button></p> 
    </form>
  </div>
  <footer class="footer">
    
  </footer>
</body>