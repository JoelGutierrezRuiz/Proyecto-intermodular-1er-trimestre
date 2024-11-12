<?php

//Explicar el funcionamiento
function comprobadorDeCampos($array,$campos){

    $campoNoExiste = 0;
    $camposVacios = 0;

    for($i = 0 ; $i<count($campos);$i++){
        if(!isset($array[$campos[$i]])){
            $campoNoExiste+=1;
        }
        if(empty($array[$campos[$i]])){
            $camposVacios+=1;
        }
    }

    if($campoNoExiste==0 && $camposVacios==0){
        return true;
    }
    else{
        return false;
    }
}