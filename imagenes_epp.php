<?php

function getImagenes($id_epp){
    include("connection.php");

    $query = "SELECT id_imagen, imagen FROM imagenes WHERE id_epp = '"."$id_epp"."'";
    $resultado = mysqli_query($connect, $query);

    $respuesta_json = array();

    while($datos = mysqli_fetch_assoc($resultado)) {
        array_push($respuesta_json, $datos);
    }

    mysqli_close($connect);
    return $respuesta_json;
}

?>