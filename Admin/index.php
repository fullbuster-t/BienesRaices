<?php
	//Agregando el archivo functions para hacer los includes
	require '../includes/functions.php';
	//Llamando a la función para pasarle el parametro del include y hacer los cambios del index en el header
	includeTemplate('header');

	//Autenticando a los usuarios
	$auth = authState();

	if(!$auth){
		header('location: /');
	}

	//Importando la conexión a la base de datos
	require '../includes/config/database.php';
	//Llamando la función para conectar a la base de datos
	$db = conectDB();

	//Agregando el query
	$query = "SELECT * FROM propiedades";

	//Consultando la BD
	$resultQuery = mysqli_query($db, $query);

	//Obteniendo datos despues de la inserción de un registro
	$result = $_GET['result'] ?? null;

	//Verificando e envió de datos a través del método POST
	if($_SERVER['REQUEST_METHOD'] === 'POST'){
		//Creando la variable solo si se hizo un envió de datos a través de POST
		$idDelete = $_POST['id'];
		//Filtrando la variable para verificar si es un entero
		$idDelete = filter_var($idDelete, FILTER_VALIDATE_INT);

		//Si la variables es un entero entonces
		if($idDelete){
			//Creando la consulta para obtener la imagen a eliminar
			$queryImage = "SELECT imagen FROM propiedades WHERE id = ${idDelete};";
			//Ejecutando la consulta de imagen en el servidor
			$queryIResult = mysqli_query($db, $queryImage);
			//Asociando el resultado del query para poder consultarlo
			$propiedad = mysqli_fetch_assoc($queryIResult);
			
			//Eliminar la imagen de la propiedad
			unlink('../images/' . $propiedad['imagen']);

			//Creando la consulta de SQL que elminará las porpiedades
			$queryDelete = "DELETE FROM propiedades WHERE id = ${idDelete};";
			//Ejecutando el query y almaenando el resultado
			$queryResult = mysqli_query($db, $queryDelete);
			
			//Si el query fue satifactorio redireccionamos a el usuario
			if($queryResult){
				header('location: /admin?result=3');
			}
		}
	}

?>
	<main class="container section">
		<h1>Administrador de Bienes Raices</h1>
		<?php if( intval($result) === 1 ): ?>
			<p class="alert success">Anuncio creado correctamente</p>
		<?php elseif( intval($result) === 2 ): ?>
			<p class="alert success">Anuncio actualizado correctamente</p>
		<?php elseif( intval($result) === 3 ): ?>
			<p class="alert success">Anuncio eliminado correctamente</p>
		<?php endif ?>
		<a href="/Admin/properties/create.php" class="btn btn-green">Crear</a>
		<table class="properties-list">
			<thead>
				<tr>
					<th>ID</th>
					<th>Título</th>
					<th>Imagen</th>
					<th>Precio</th>
					<th>Acciones</th>
				</tr>
			</thead>
			<tbody>
				<?php while( $propiedad = mysqli_fetch_assoc($resultQuery)): ?>
				<tr>
					<td><?php echo $propiedad['id']; ?></td>
					<td><?php echo $propiedad['titulo'] ?></td>
					<td><img class="table-image" src="/images/<?php echo $propiedad['imagen']; ?>"></td>
					<td>$<?php echo $propiedad['precio'] ?></td>
					<td>
						<form method="POST" class="w-100">
							<input type="hidden" name="id" value="<?php echo $propiedad['id']; ?>">
							<input type="submit" value="Eliminar" class="btn-red-block">
						</form>
						<a class="btn-yellow-block" href="/admin/properties/update.php?id=<?php echo $propiedad['id']; ?>">Actualizar</a>
					</td>
				</tr>
				<?php endwhile; ?>
			</tbody>
		</table>
	</main>
<?php
	//Llamando a la función para pasarle el parametro del include y agregar el footer
	includeTemplate('footer');

    //Cerrando la conexión a la base de datos
    mysqli_close($db);
?>