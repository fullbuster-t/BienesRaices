<?php
    //Función creada para conectar a la base de datos
    function conectDB() : mysqli{
        //Almacenamos la conexión en una variable, usamos mysqli_connect la cual nos pide los valores del nombre el servidor, usuario, contraseña y nombre de la base de datos.
        $db = mysqli_connect('localhost', 'root', '', 'bienesraices_crud');

        //Condicional que valida la conexión que se establece a la base de datos 
        if(!$db){
            echo "Error en la conexión a la base datos";
            exit;
        }

        return $db;
    }
