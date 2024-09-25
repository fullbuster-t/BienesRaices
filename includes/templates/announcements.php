<?php
    //Importando la base de datos
    require __DIR__ . '/../config/database.php';
    $db = conectDB();

    //Creando la consulta y ejecutandola en el servidor
    $query = "SELECT * FROM propiedades LIMIT ${limit};";

    //Obteniendo los resultados de la consulta al servidor
    $result = mysqli_query($db, $query);

?>
        <div class="announcements-container">
            <?php while($propiedad = mysqli_fetch_assoc($result)): ?>
			<div class="announcement">
				<img loading="lazy" src="/images/<?php echo $propiedad['imagen']; ?>" alt="House image">
				<div class="announcement-content">
					<h3><?php echo $propiedad['titulo']; ?></h3>
					<p><?php echo $propiedad['descripcion']; ?></p>
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
					<a href="announcement.php?id=<?php echo $propiedad['id']; ?>" class="btn-yellow-block">Ver propiedad</a>
				</div>
			</div>
            <?php endwhile; ?>
		</div>
<?php
    //Cerrando la conexión a la base de datos
    mysqli_close($db);
?>