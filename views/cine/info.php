
<h3>Horarios de <span id="CineNombre"><?=$cine?><span></h3>

<div class="horariosBloqueInfo">
<ul>
    <li class="fecha clickfechaCine1  <?=date("d")?>" > Hoy <?php $fecha_actual = date("y-m-d");?> <span class="fecha1"><?=date("d-m");?> </span></li>
    <li class="fecha clickfechaCine2  <?=date("d",strtotime($fecha_actual."+ 1 days"))?>" > Mañana <span class="fecha2"><?=date("d-m",strtotime($fecha_actual."+ 1 days")) ?></span></li>
    <li class="fecha clickfechaCine3  <?=date("d",strtotime($fecha_actual."+ 2 days"))?>" ><?=$mostrar = Utils::diaSemana(date("D",strtotime($fecha_actual."+ 2 days")) );?> <span class="fecha3"><?=date("d-m",strtotime($fecha_actual."+ 2 days")) ?></span></li>
    <li class="fecha clickfechaCine4  <?=date("d",strtotime($fecha_actual."+ 3 days"))?>" ><?=$mostrar = Utils::diaSemana(date("D",strtotime($fecha_actual."+ 3 days")) );?> <span class="fecha4"><?=date("d-m",strtotime($fecha_actual."+ 3 days")) ?></span></li>
    <li class="fecha clickfechaCine5  <?=date("d",strtotime($fecha_actual."+ 4 days"))?>" ><?=$mostrar = Utils::diaSemana(date("D",strtotime($fecha_actual."+ 4 days")) );?> <span class="fecha5"><?=date("d-m",strtotime($fecha_actual."+ 4 days")) ?></span></li>
</ul>
</div>
<div id="allFilm" class="listaPeliculas">
<?php while ($res = $infoFilm->fetch_object()): ?>
    <article>

<a href="<?= base_url ?>Pelicula/info&film=<?=$res->nombre?>&cine=<?=$cine?>"><img class="imgBuscador" src="<?= base_url ?>uploads/img/<?= $res->img ?>" class="card-img-top sepia" alt="..."></a>

<ul>
    <li ><?= $res->nombre ?>.</li>
    <li ><?= $res->duracion ?> min.</li>
    <li >No recomendada para + <?= $res->edad ?>.</li>
</ul>
<ul class="">
<?php
$infoFilmHora = $info->showFilmHorario($cine,$res->nombre);
 while ($resTwo = $infoFilmHora->fetch_object()): ?>
 <li class="infoCine">
<a href="<?= base_url ?>Pelicula/entrada&film=<?=$resTwo->nombre?>&cine=<?=$cine?>&hora=<?=$resTwo->hora_accion?>&dia=<?=$resTwo->fecha?>&sala=<?=$resTwo->num_sala?>">
 <?=$resTwo->hora_accion?>
</a>
</li>

<?php endwhile; ?>
 </ul>
 <div class="clearfix"></div>
 <hr>
 
 </article>
 <div class="clearfix"></div>
<?php endwhile; ?>
</div>