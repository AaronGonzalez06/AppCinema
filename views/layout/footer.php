</main>

<footer>

<div class="cines">
<?php
$mostrar = Utils::footer();
while ($pre = $mostrar->fetch_object()):?>
  <ul>
  <li class="lista_footer"><a href="<?= base_url ?>Cine/peliculas&cine=<?=$pre->nombre?>"><?= $pre->nombre ?> (<?= $pre->ciudad ?>)</a> </li>
</ul>
<?php endwhile; ?>
</div>

<ul class="redes">
    <li><a><img src="<?= base_url ?>/uploads/icono/facebook.png"/></a></li>
    <li><a><img src="<?= base_url ?>/uploads/icono/gorjeo.png"/></a></li>
    <li><a><img src="<?= base_url ?>/uploads/icono/instagram.png"/></a></li>
    <li><a><img src="<?= base_url ?>/uploads/icono/linkedin.png"/></a></li>
</ul>

</footer>
</body>
</html>