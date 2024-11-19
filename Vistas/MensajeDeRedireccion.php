<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Modal en Bootstrap 4</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <!-- Modal -->
  <div class="modal show" tabindex="-1" id="myModal" role="dialog" aria-hidden="false" style="display: block;">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Recordatorio</h5>
        </div>
        <div class="modal-body">
          <p>Debes iniciar sesión para poder seguir con la compra.</p>
        </div>
        <form method="POST" class="modal-footer" action="../Controladores/Redireccionamiento.php">
          <button type="submit" name="cancelar" class="btn btn-secondary">Cancelar</button>
          <button type="submit" name="aceptar" class="btn btn-primary">Aceptar</button>
        </form>
      </div>
    </div>
  </div>

  <!-- jQuery (requerido para Bootstrap 4) -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

  <!-- Popper.js (requerido para Bootstrap 4) -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.0/dist/umd/popper.min.js"></script>

  <!-- JS de Bootstrap -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
