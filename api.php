<?php

include("connection.php");

header("Content-Type:application/json");

if($_GET){
    if($_GET){
        $id_get = $_GET['id'];
        $query = "SELECT id_epp, nombre, marca, stock, id_cargo, descripcion FROM epps WHERE id_epp = '"."$id_get"."'";

        $resultado = mysqli_query($connect, $query);
        $datos = mysqli_fetch_assoc($resultado);

        $respuesta_json = json_encode($datos);
    }else{
        $query = "SELECT id_epp, nombre, marca, stock, id_cargo, descripcion FROM epps";
        $resultado = mysqli_query($connect, $query);

        $respuesta_json = "";

        while($datos = mysqli_fetch_assoc($resultado)) {
            $respuesta_json .= json_encode($datos);
            $respuesta_json .= ",";
        }

        $respuesta_json = "[" . rtrim($respuesta_json, ",") . "]";    
    }
}else{
    $query = "SELECT id_epp, nombre, marca, stock, id_cargo, descripcion FROM epps";
    $resultado = mysqli_query($connect, $query);

    $respuesta_json = "";

    while($datos = mysqli_fetch_assoc($resultado)) {
        $respuesta_json .= json_encode($datos);
        $respuesta_json .= ",";
    }

    $respuesta_json = "[" . rtrim($respuesta_json, ",") . "]";
}

echo $respuesta_json;

?>
