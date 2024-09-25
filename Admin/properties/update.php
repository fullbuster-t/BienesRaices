<?php
	//Agregando el archivo functions para hacer los includes
	require '../../includes/functions.php';
	//Llamando a la función para pasarle el parametro del include y hacer los cambios del index en el header
	includeTemplate('header');

	//Autenticando a los usuarios
	$auth = authState();

	if(!$auth){
		header('location: /');
	}

	// Obteniendo el id desde la tabla de propiedades
	$idUpdate = $_GET['id'];
	//Filtrando la variable para validar que sea de tipo entero
	$idUpdate =  filter_var($idUpdate,  FILTER_VALIDATE_INT);

	if(!$idUpdate){
		header('Location: /admin');
	}

	//Conexión a la base de datos
	require '../../includes/config/database.php';
	//Llamando la función para conectar a la base de datos
	$db = conectDB();

	//Consulta para obtener la propiedad que se desea actualizar
	$queryUpdate = "SELECT *FROM propiedades WHERE id = ${idUpdate};";
	$resultUpdate = mysqli_query($db, $queryUpdate);
	$propiedadUpdate = mysqli_fetch_assoc($resultUpdate);

	//Consultar para obtener los vendedores
	$sellers = "SELECT * FROM vendedores;";
	$result_sellers  = mysqli_query($db, $sellers);

	//Arreglo con mensajes de error
	$errores = [];

	//Creando las variables de manera global
	$title_pro = $propiedadUpdate['titulo'];
	$price_pro = $propiedadUpdate['precio'];
	$image_pro = $propiedadUpdate['imagen'];
	$description_pro = $propiedadUpdate['descripcion'];
	$bedrooms_pro = $propiedadUpdate['habitaciones'];
	$wc_pro = $propiedadUpdate['wc'];
	$parking_pro = $propiedadUpdate['estacionamientos'];
	$seller_pro = $propiedadUpdate['Vendedores_id'];
	$created = '';

	//Código para insertar una nueva propiedad dentro de la base de datos, se ejecuta despues de que se envia el formulario
	if($_SERVER['REQUEST_METHOD'] === 'POST'){

		//Creando las variables que almacenan los datos del formulario y agregando mysqli_real_escape para evitar inyección sql
		$title_pro = mysqli_real_escape_string( $db, $_POST['title_pro'] );
		$price_pro = mysqli_real_escape_string( $db, $_POST['price_pro'] );
		$description_pro = mysqli_real_escape_string( $db, $_POST['description_pro'] );
		$bedrooms_pro = mysqli_real_escape_string( $db, $_POST['bedrooms_pro'] );
		$wc_pro = mysqli_real_escape_string( $db, $_POST['wc_pro'] );
		$parking_pro = mysqli_real_escape_string( $db, $_POST['parking_pro'] );
		$seller_pro = mysqli_real_escape_string( $db, $_POST['seller_pro'] );
		$created = date('Y/m/d');

		//Validar files hacia una imagen
		$image_pro = $_FILES['image_pro'];

		//Validación y creación de errores
		if(!$title_pro){
			$errores[] = "Debes añadir un título";
		}

		if(!$price_pro){
			$errores[] = "El precio es obligatorio";
		}

		//Validar imagen por tamaño (1mb máximo)
		$image_size = 1000 * 1000;
		if($image_pro['size'] > $image_size){
			$errores[] = "La imagen es muy pesada";
		}

		if( strlen($description_pro) < 60 ){
			$errores[] = "La descripción es obligatoria y debe tener al menos 60 caracteres";
		}

		if(!$bedrooms_pro){
			$errores[] = "El número de habitaciones es obligatorio";
		}

		if(!$wc_pro){
			$errores[] = "El número de baños es obligatorio";
		}

		if(!$parking_pro){
			$errores[] = "El número de lugares de estacionamiento es obligatorio";
		}

		if(!$seller_pro){
			$errores[] = "Elige un vendedor";
		}

		//Validando que el arreglo de errores se encuentre vacio
		if(empty($errores)){

			// Crear carpeta 
			$folderImage = '../../images/';
			
			//Verificando que la carpeta contenedora de las imagenes no exista
			if(!is_dir($folderImage)){
				mkdir($folderImage);
			}

			/*Subida e inserción de archivos*/

			$nameImage = '';

			//Validación para borrar imagen en caso de actualizar
			//Al seleccionar la nueva imagen nos da un nombre, por lo tanto si se subirá una imagen
			if($image_pro['name']){
				//Eliminando la imagen previamente asignada
				unlink($folderImage . $propiedadUpdate['imagen']);

				//Generando un nombre único para las imagenes
				$nameImage = md5( uniqid(rand(), true)) .".jpg";

				//Subir la imagen
				//Usamos move_uploaded para mover la imagen que se alamacena temporalmente en el navegador
				move_uploaded_file($image_pro['tmp_name'], $folderImage . $nameImage);
			}else{
				//Manteniendo el valor previo en caso de que no se suba ninguna imagen
				$nameImage = $propiedadUpdate['imagen'];
			}

			/* Actualizando	dentro de la base de datos */
			//Creando la consulta que se ejecutará dentro de la base de datos
			$query = "UPDATE propiedades SET titulo = '${title_pro}', precio = '${price_pro}', imagen = '${nameImage}', descripcion = '${description_pro}', habitaciones = ${bedrooms_pro}, wc = ${wc_pro}, estacionamientos = ${parking_pro}, Vendedores_id = ${seller_pro} WHERE id = ${idUpdate} ;";

			//Insertando la propiedad a través de php. Esta sentencia toma la conexión a la base de datos y la consulta
			$result = mysqli_query($db, $query);

			if($result){
				//Redireccionando a el usuario
				//
				header('Location: /Admin?result=2');
			}
		}
	}
?>
	<main class="container section">
		<h1>Actualizar</h1>
		<a href="/Admin" class="btn btn-green">Volver</a>
		<?php foreach($errores as $error): ?>
     	<div class="alert error">
			<?php echo $error; ?>
		</div>
 		<?php endforeach; ?>
		<form class="form" method="POST" enctype="multipart/form-data">
			<fieldset>
				<legend>Información general</legend>
				<label for="title_pro">Título:</label>
				<input type="text" id="title_pro" name="title_pro" placeholder="Ingresa el título de la propiedad" value="<?php echo $title_pro ?>">
				<label for="price_pro">Precio:</label>
				<input type="number" id="price_pro" name="price_pro" placeholder="Ingresa el precio de la propiedad" value="<?php echo $price_pro ?>">
				<label for="image_pro">Imagen:</label>
				<input type="file" id="image_pro" name="image_pro" accept="image/jpeg, image/png">
				<img class="image-update" src="/images/<?php echo $image_pro; ?>">
				<label for="description-pro">Descripción</label>
				<textarea id="description_pro" name="description_pro"><?php echo $description_pro ?></textarea>
			</fieldset>
			<fieldset>
				<legend>Información de la propiedad</legend>
				<label for="bedrooms_pro">Habitaciones:</label>
				<input type="number" id="bedrooms_pro" name="bedrooms_pro" min="1" max="9" placeholder="Ej: 3" value="<?php echo $bedrooms_pro ?>">
				<label for="wc_pro">Baños:</label>
				<input type="number" id="wc_pro" name="wc_pro" min="1" max="9" placeholder="Ej: 3" value="<?php echo $wc_pro ?>">
				<label for="parking_pro">Estacionamientos:</label>
				<input type="number" id="parking_pro" name="parking_pro" min="1" max="9" placeholder="Ej: 3" value="<?php echo $parking_pro ?>">
			</fieldset>
			<fieldset>
				<legend>Vendedor</legend>
				<select name="seller_pro">
					<option value="" selected>--- Seleccione un vendedor ---</option>
					<?php while($row = mysqli_fetch_assoc($result_sellers)): ?>
					<option <?php echo $seller_pro === $row['id'] ? 'selected' : ''; ?> value="<?php echo $row['id'];?>"><?php echo $row['nombres']." ".$row['apellido'];?></option>
					<?php endwhile; ?>
				</select>
			</fieldset>
			<input type="submit" value="Actualizar propiedad" class="btn btn-green">
		</form> 
	</main>
<?php
	//Llamando a la función para pasarle el parametro del include y agregar el footer
	includeTemplate('footer');

    //Cerrando la conexión a la base de datos
    mysqli_close($db);
?>