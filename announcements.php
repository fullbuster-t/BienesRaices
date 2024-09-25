<?php
	//Agregando el archivo functions para hacer los includes
	require 'includes/functions.php';
	//Llamando a la función para pasarle el parametro del include y hacer los cambios del index en el header
	includeTemplate('header');
?>
	<main class="container section">
		<h2>Casas y depas en venta</h2>
		<?php
			//Limitando el número de porpiedades
			$limit = 250;
			include 'includes/templates/announcements.php';
		?>
	</main>
<?php
	//Llamando a la función para pasarle el parametro del include y agregar el footer
	includeTemplate('footer');
?>