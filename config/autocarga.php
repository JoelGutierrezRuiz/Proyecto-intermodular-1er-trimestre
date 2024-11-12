<?php
spl_autoload_register(function ($clase) {
 include "../Clases/$clase.php";
});