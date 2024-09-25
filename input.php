<?php
	//Agregando el archivo functions para hacer los includes
	require 'includes/functions.php';
	//Llamando a la función para pasarle el parametro del include y hacer los cambios del index en el header
	includeTemplate('header');
?>
	<main class="container section center-content">
		<h1>Guia para la de coración de tu hogar</h1>
        <picture>
            <source srcset="build/img/destacada2.webp" type="image/webp">
            <img loading="lazy" src="build/img/destacada2.jpg" alt="House image">
        </picture>
        <p class="input-date">Escrito el: <span>20/10/2022</span> por: <span>Admin</span></p>
        <div class="house-resume">
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quam mollitia enim obcaecati harum commodi voluptatibus, nobis, animi praesentium dolorum adipisci nisi sit ex expedita voluptas alias ipsa repudiandae iste natus, voluptates quas! Optio, sed sit praesentium mollitia labore, deserunt iure quisquam quod architecto harum exercitationem molestiae adipisci! Optio, nulla, nihil, qui praesentium iure ducimus facilis placeat incidunt vitae facere veritatis.</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur atque itaque dolores facere autem distinctio sint dicta, reiciendis corrupti enim quasi, doloribus numquam quisquam perspiciatis maxime unde in culpa laboriosam.</p>
        </div>
	</main>
<?php
	//Llamando a la función para pasarle el parametro del include y agregar el footer
	includeTemplate('footer');
?>