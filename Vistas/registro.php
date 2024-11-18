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
  <link rel="stylesheet" href="../Css/acceso/registro.css">
    <link rel=" stylesheet" href="../Css/global.css">

</head>

<body>

  <div class="logo-contenedor">
    <a href="../Controladores/Principal.php"></a>
    <img class="logo-img" src="../Imágenes/portadas/logo.png">
    <p class="logo-text">lúdico</p>
  </div>



  <div class="container">



    <form class="formulario row pt-0 pt-sm-170" onsubmit="register(event)" action="" method="POST">
      <p>Registro</p>
      <p>email</p>
      <input id="email-cliente" name="email-cliente" type="email">
      <p>Nombre</p>
      <input id="nombre-cliente" name="nombre" type="text">
      <p>Dirección</p>
      <input id="direccion-cliente" name="direccion" type="text">
      <p>contraseña</p>
      <input id="pwd-cliente" name="pwd" type="password">
      <button>Registrarse</button>
    </form>

    <div class="navegador row">

      <p class="col-12 d-flex justify-content-center">¿Ya tienes una cuenta?</p>
            
      <p id="login-error" class="col-12  justify-content-center">Mensaje de error</p>
      
      <a class="col-12 d-flex justify-content-center" href="../Controladores/validar.php">
        <button>Iniciar sesión</button>
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
      <script src="../Js/acceso/registro.js"></script>
</body>

</html>