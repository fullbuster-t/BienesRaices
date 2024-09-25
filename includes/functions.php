<?php
    //Agregando el archivo de app
    require 'app.php';

    function includeTemplate ($name, $start = false){
        //Creando el método para  hacer los includes
        include TEMPLATES_URL . "/${name}.php";
    }

    //Función creada para verificar o validar a un usuario autenticado
    function authState() : bool{
        //Iniciamos la sesión
        //Este inicio de sesión se quedo comentado por que ya se crea dentro de login.php
        //session_start();

        //Extraemos el valor del login de la sesión para hacer las comprobaciones pertinentes
        $auth = $_SESSION['login'];

        //Verificamos el valor que contiene la variable de autenticación
        if($auth){
            //Si el usuario esta aunteticado retornamos el valor de true dentro de la función
            return true;
        }

        //Al no estar autenticado el usuario retornamos el valor de false para evita que se acceda a algunas páginas
        return false; 
    }