<!doctype html>
<html lang="en">

<head>

  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="../Css/acceso/inicio.css">
  <link rel=" stylesheet" href="../Css/global.css">

</head>

<body>

  <div class="logo-contenedor">
    <a href="../Controladores/Principal.php"></a>
    <img class="logo-img" src="../Imágenes/portadas/logo.png">
    <p class="logo-text">lúdico</p>
  </div>


  <div class="container">


    <form class="formulario row pt-0 pt-sm-170" onsubmit="login(event)" action="../Controladores/Validar.php"
      method="POST">
      <p>Inicio de sesión</p>
      <p>Email</p>
      <input name="email" id="email-cliente" type="text">
      <p>contraseña</p>
      <div>
        <input name="pwd" id="pwd" type="password">
        <span id="pwd-on" class="material-symbols-rounded">Visibility</span>
        <span id="pwd-off" class="material-symbols-rounded">Visibility_off</span>
      </div>

      <button name="Iniciar" type="submit" id="iniciar-sesion">Iniciar sesión</button>
    </form>

    <div class="navegador justify-content-center row">

      <p class="col-12 d-flex justify-content-center">¿Aún no estas registrado?</p>

      <p id="login-error" class="col-12  justify-content-center">Usuario o contraseña incorrectos</p>
      
      <!--Bootstrap google-->
      <button class="boton-google btn btn-light btn-lg d-flex align-items-center shadow-sm border rounded-pill px-4 py-2">
        <img src="https://img.icons8.com/color/48/000000/google-logo.png" alt="Google Logo" class="me-2" width="24"
          height="24">
      </button>
      
      
      
      <a class="col-12 d-flex justify-content-center" href="../Controladores/Registro.php">
        <button>Registrarse</button>
      </a>

    </div>
  </div>




  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous"></script>

  <script src="../Js/acceso/inicio.js"></script>
</body>

</html>