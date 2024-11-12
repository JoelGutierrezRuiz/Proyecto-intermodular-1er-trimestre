<?
include "../config/autocarga.php";
session_start();
$db = new Db();



if (isset($_SESSION['email'])) {
    header("location:Principal.php");
}
else if(isset($_POST['email'])) {
    $user = new Cliente($_POST['email'], $_POST['pwd']);
    $result = $user->validar($db->link);
    if (isset($result['email'])) {
        $_SESSION['email'] = $result['email'];
        $_SESSION['nombre'] = $result['nombre'];
        header("location:Principal.php");
    }
    else{
        header("location:../Vistas/inicio.php");
    }

}
else{
    header("location:../Vistas/inicio.php");
}

