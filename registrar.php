<?php
require("config.php");
        
//evitar inserccion de cualquier caracter que no sea letra o numero


    $ciudad = $_POST['ciudad'];
    $tipo = $_POST['tipo'];
    $habitacion = $_POST['habitaciones'];
    
    //consulta mysql para insertar los datos del empleados
    $nombre ='hola';
    $habitaciones = '2';
    $sentencia = $base_de_datos->prepare("INSERT INTO busquedas2(ciudad, habitaciones) VALUES (?,?);");
    $resultado = $sentencia->execute([$ciudad, $habitacion]); # Pasar en el mismo orden de los ?

    
    
    if($resultado)
    {            
        echo "busqueda guardada Correctamente";
    }
    

?>