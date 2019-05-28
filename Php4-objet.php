<?php 

function loadClass($class){
    require"Entity/".$class.".php";
}
spl_autoload_register("loadClass");


//Constantes PHP

const TVA = 20;
echo TVA;

 ?>