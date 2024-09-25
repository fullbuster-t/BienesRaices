<?php
    //Importando la conexión a la base de datos
    require 'includes/config/database.php';
    $db = conectDB();

    //Creando el arreglo de errores para mostrar a el usuario
    $errores = [];

    //Autenticar el usuario
    //Si se enviaron los datos a través de POST, se incia el proceso de autenticación
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        //Creando la variable de email y asignando el valor obtenido a través del POST, asu vez la pasamos por un filtro de email
        //Sanitizamos la variable con el uso de mysqli_real_escape_string
        $email = mysqli_real_escape_string($db, filter_var( $_POST['email'], FILTER_VALIDATE_EMAIL) );
        //Sanitizamos la variable con el uso de mysqli_real_escape_string
        $password = $_POST['password'];

        //Estructura condicional que valida el correo
        if(!$email){
            //Agregando el error al arreglo para posteriormente mostrarlos
            $errores[] = "El e-mail es obligatorio o no es válido";
        }

        //Estructura condicional que váida la contraseña
        if(!$password){
            //Agregando el error al arreglo para posteriormente mostrarlos
            $errores[] = "La contraseña es obligatoria";
        }

        //Si el arreglo de errores esta vacio ejecutaremos las validaciones que autentican a el usuario
        if(empty($errores)){
            //Revisamos si el usuario existe dentro de la base de datos
            $query = "SELECT * FROM usuarios WHERE email = '${email}';";
            //Asignamos el resultado de la consulta a una variable
            $result = mysqli_query($db, $query);

            //Si num_rows es igual a cero, es decir no se encontró ningún registro dentro de la base de datos
            if( $result->num_rows ){
                //Si el usuario existe ahora debemos revisar que la contraseña ingresada sea la correcta
                $user = mysqli_fetch_assoc($result);

                //Verificar si el password es correcto o no
                $auth = password_verify($password, $user['password']);

                if($auth){
                    //El usuario esta autenticado
                    session_start();

                    //Llenando el arreglo de la sesión
                    $_SESSION['user'] = $user['email'];
                    $_SESSION['login'] = true;

                    //Redireccionando a el usuario al panel de administración en caso de autenticación exitosa
                    header('location: /admin');
                }else{
                    $errores[] = "La contraseña es incorrecta";
                }
            }else{
                //Si el usuario no existe entonces agregamos un error al arreglo para mostrarlo
                $errores[] = "El usuario no existe";
            }
        }
    }

	//Agregando el archivo functions para hacer los includes
	require 'includes/functions.php';
	//Llamando a la función para pasarle el parametro del include y hacer los cambios del index en el header
	includeTemplate('header');
?>
	<main class="container section">
		<h1>Iniciar Sesión</h1>
        <?php foreach($errores as $error): ?>
            <div class="alert error">
                <?php echo $error; ?>
            </div>
        <?php endforeach; ?>
        <form class="form" method="POST">
            <fieldset>
				<legend>Ingresa tu e-mail y contraseña</legend>
				<label for="email">E-mail</label>
				<input id="email" type="email" name="email" placeholder="Ingresa tu e-mail" required>
				<label for="password">Contraseña</label>
				<input id="password" type="password" name="password" placeholder="Ingresa tu contraseña de inicio de sesión">
			</fieldset>
            <input type="submit" value="Iniciar sesión" class="btn-green">
        </form>
	</main>
<?php
	//Llamando a la función para pasarle el parametro del include y agregar el footer
	includeTemplate('footer');
?>