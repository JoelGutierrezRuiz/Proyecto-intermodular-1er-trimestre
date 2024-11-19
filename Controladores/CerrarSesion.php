<?php
session_start();
unset($_SESSION["email"]);
unset($_SESSION["nombre"]);
header("location:Principal.php");

?>