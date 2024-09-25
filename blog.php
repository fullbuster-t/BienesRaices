<?php
	//Agregando el archivo functions para hacer los includes
	require 'includes/functions.php';
	//Llamando a la función para pasarle el parametro del include y hacer los cambios del index en el header
	includeTemplate('header');
?>
	<main class="container section center-content">
		<h1>Nuestro Blog</h1>
        <article class="input-blog">
            <div class="image">
                <picture>
                    <source srcset="build/img/blog1.webp" type="image/webp">
                    <img loading="lazy" src="build/img/blog1.jpg" alt="Blog">
                </picture>
            </div>
            <div class="input-text">
                <a href="input.php">
                    <h4>Terraza en el techo de tu casa</h4>
                    <p class="input-date">Escrito el: <span>20/10/2022</span> por: <span>Admin</span></p>
                    <p>Consejos para construir una terraza en el techo de tu casa con los mejores materiales y ahorrando dinero.</p>
                </a>
            </div>
        </article>
        <article class="input-blog">
            <div class="image">
                <picture>
                    <source srcset="build/img/blog2.webp" type="image/webp">
                    <img loading="lazy" src="build/img/blog2.jpg" alt="Blog">
                </picture>
            </div>
            <div class="input-text">
                <a href="input.php">
                    <h4>Guia para la decoración de tu hogar.</h4>
                    <p class="input-date">Escrito el: <span>20/10/2022</span> por: <span>Admin</span></p>
                    <p>Maximiza el espacio de tu hogar con esta guia, aprende a combinar muebles y colores para darle vida a tu espacio.</p>
                </a>
            </div>
        </article>
        <article class="input-blog">
            <div class="image">
                <picture>
                    <source srcset="build/img/blog3.webp" type="image/webp">
                    <img loading="lazy" src="build/img/blog3.jpg" alt="Blog">
                </picture>
            </div>
            <div class="input-text">
                <a href="input.php">
                    <h4>Terraza en el techo de tu casa</h4>
                    <p class="input-date">Escrito el: <span>20/10/2022</span> por: <span>Admin</span></p>
                    <p>Consejos para construir una terraza en el techo de tu casa con los mejores materiales y ahorrando dinero.</p>
                </a>
            </div>
        </article>
        <article class="input-blog">
            <div class="image">
                <picture>
                    <source srcset="build/img/blog4.webp" type="image/webp">
                    <img loading="lazy" src="build/img/blog4.jpg" alt="Blog">
                </picture>
            </div>
            <div class="input-text">
                <a href="input.php">
                    <h4>Guia para la decoración de tu hogar.</h4>
                    <p class="input-date">Escrito el: <span>20/10/2022</span> por: <span>Admin</span></p>
                    <p>Maximiza el espacio de tu hogar con esta guia, aprende a combinar muebles y colores para darle vida a tu espacio.</p>
                </a>
            </div>
        </article>
	</main>
<?php
	//Llamando a la función para pasarle el parametro del include y agregar el footer
	includeTemplate('footer');
?>