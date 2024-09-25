<?php
    //Importando la base de datos
    require 'includes/config/database.php';
    $db = conectDB();

    //Creando la variable solo si se hizo un envió de datos a través de POST
	$id = $_GET['id'];
	//Filtrando la variable para verificar si es un entero
	$id = filter_var($id, FILTER_VALIDATE_INT);

    //Si la variable es un entero entonces
	if($id){
		//Creando la consulta para obtener la propiedad seleccionada
		$query = "SELECT * FROM propiedades WHERE id = ${id};";
		//Ejecutando la consulta de imagen en el servidor
		$result = mysqli_query($db, $query);

        //Validando que el resultado o id de porpiedad exista dentro de la base de datos
        if($result->num_rows === 0){
            //Redireccionando a el usuario en caso de que no exista la propiedad
            header('location: /');
        }

		//Asociando el resultado del query para poder consultarlo
		$propiedad = mysqli_fetch_assoc($result);
    }else{
        //Redireccionando en caso de que el contenido de id no sea un entero
        header('location: /');
    }
    
	//Agregando el archivo functions para hacer los includes
	require 'includes/functions.php';
	//Llamando a la función para pasarle el parametro del include y hacer los cambios del index en el header
	includeTemplate('header');
?>
	<main class="container section center-content">
		<h1><?php echo $propiedad['titulo']; ?></h1>
        <img loading="lazy" src="images/<?php echo $propiedad['imagen']; ?>" alt="House image">
        <div class="house-resume">
            <p class="price">$<?php echo $propiedad['precio']; ?></p>
            <ul class="characteristics-icons">
                <li>
                    <img class="icon-house" loading="lazy" src="build/img/icono_wc.svg" alt="characteristic icon">
                    <p><?php echo $propiedad['wc']; ?></p>
                </li>
                <li>
                    <img class="icon-house" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="characteristic icon">
                    <p><?php echo $propiedad['estacionamientos']; ?></p>
                </li>
                <li>
                    <img class="icon-house" loading="lazy" src="build/img/icono_dormitorio.svg" alt="characteristic icon">
                    <p><?php echo $propiedad['habitaciones']; ?></p>
                </li>
            </ul>
            <p><?php echo $propiedad['descripcion']; ?>/p>
        </div>
	</main>
<?php
	//Llamando a la función para pasarle el parametro del include y agregar el footer
	includeTemplate('footer');
?>