<?php
    //Importando la conexión a la base de datos
    require 'includes/config/database.php';
    $db = conectDB();

    //Crear un email y password
    $email = "correo@correo.com";
    $password = "123456";

    //Haciendo un hash a la variable de password
    //En esta función se pueden usar dos valores PASSWORD_DEFAULT o PASSWORD_BCRYPT
    $passwordHash =  password_hash($password, PASSWORD_DEFAULT);

    //Query para crear el usuario
    $query = " INSERT INTO usuarios (email, password) VALUES ( '${email}', '${passwordHash}');";

    //Agregar a la base de datos
    mysqli_query($db, $query);