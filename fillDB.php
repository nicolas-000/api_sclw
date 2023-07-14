<?php

include("connection.php");

$query = "INSERT INTO epps (nombre, marca, stock, id_cargo, descripcion)
            VALUES('"."$nombre"."', '"."$marca"."', '"."$stock"."', '"."$id_cargo"."', '"."$descripcion"."');";



?>