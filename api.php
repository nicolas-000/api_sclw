<?php

include("connection.php");
include("imagenes_epp.php");

header("Content-Type:application/json");

if(isset($_GET['id'])){
    $id_get = $_GET['id'];
    $query = "SELECT id_epp, nombre, marca, stock, id_cargo, descripcion FROM epps WHERE id_epp = '"."$id_get"."'";

    $resultado = mysqli_query($connect, $query);
    $datos = mysqli_fetch_assoc($resultado);

    $datos["imagenes"] = getImagenes($datos["id_epp"]);

    $respuesta_json = json_encode($datos);
}else{
    $query = "SELECT id_epp, nombre, marca, stock, id_cargo, descripcion FROM epps";
    $resultado = mysqli_query($connect, $query);

    $respuesta_json = "";

    while($datos = mysqli_fetch_assoc($resultado)) {
        $datos["imagenes"] = getImagenes($datos["id_epp"]);
        $respuesta_json .= json_encode($datos);
        $respuesta_json .= ",";
    }

    $respuesta_json = "[" . rtrim($respuesta_json, ",") . "]";
}

mysqli_close($connect);

echo $respuesta_json;

?>
