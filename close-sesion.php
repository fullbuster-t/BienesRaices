<?php
    //Iniciando la sesión para poder obtener datos de la superglobal
    session_start();

    //Para cerrar la sesión reseteamos los valores del arreglo de $_SESSION
    $_SESSION = [];

    //Redireccionamos a el usuario a la raiz del proyecto
    header('location: /');