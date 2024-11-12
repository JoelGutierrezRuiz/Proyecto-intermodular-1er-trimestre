<?

session_start();

if($_SESSION['dniCliente'] && $_SESION['nombre']){
    header("location:../index.php");
}
else if($_POST['dniCliente'] && $_POST['nombre']){
    $_SESION['dniCliente']= $_POST['dniCliente'];
    $_SESION['nombre'] = $_POST['nombre'];
}
else{
    header("location:../Vistas/registro.php");
}