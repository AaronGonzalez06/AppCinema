<?php while ($res = $infoFilm->fetch_object()): ?>
<?php $_SESSION['pelicula'] =$res->nombre ?>
<h4><?=$res->nombre?></h4>
<hr/>
<img class="imgInfo" src="<?= base_url ?>/uploads/img/<?=$res->img?>"/>
<div class="infoPeli">
<p>Mayores de <?=$res->edad?>+</p>
<p>Duración: <?=$res->duracion?> min</p>
<h5>Sinopsis</h5>
<hr/>
<p><?=$res->descripcion?></p>
<iframe width="800" height="400" src="<?=$res->trailer?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
</div>
<?php endwhile; ?>
<div class="clearfix"></div>

<h4 class="tituloHorario">Horarios</h4>
<hr/>

<div class="bloqueTotalHora">
<div class="horariosBloque">
<ul>
    <li class="fecha clickfecha1" > Hoy <?php $fecha_actual = date("y-m-d");?> <span class="fecha1"><?=date("d-m");?> </span></li>
    <li class="fecha clickfecha2" > Mañana <span class="fecha2"><?=date("d-m",strtotime($fecha_actual."+ 1 days")) ?></span></li>
    <li class="fecha clickfecha3" ><?=$mostrar = Utils::diaSemana(date("D",strtotime($fecha_actual."+ 2 days")) );?> <span class="fecha3"><?=date("d-m",strtotime($fecha_actual."+ 2 days")) ?></span></li>
    <li class="fecha clickfecha4" ><?=$mostrar = Utils::diaSemana(date("D",strtotime($fecha_actual."+ 3 days")) );?> <span class="fecha4"><?=date("d-m",strtotime($fecha_actual."+ 3 days")) ?></span></li>
    <li class="fecha clickfecha5" ><?=$mostrar = Utils::diaSemana(date("D",strtotime($fecha_actual."+ 4 days")) );?> <span class="fecha5"><?=date("d-m",strtotime($fecha_actual."+ 4 days")) ?></span></li>
</ul>
</div>
<div class="clearfix"></div>
<div class="bloqueHora">
<div class="cine_horario">
    <?php if($cineGet == false):?>
<?php while ($respuesta2 = $cinepeli->fetch_object()): ?>
    <p class="cinebloque cine<?=$respuesta2->idCine?>"><?=$respuesta2->nombre?></p>
<?php endwhile;?>
<?php else:?>
    <p class="cinebloque"><?=$cineGet?></p>
    <?php endif;?>
</div>


<ul class="listaHora">
<?php while ($respuesta = $horario->fetch_object()): ?>
    <li class="hora horario<?=$respuesta->idCine?>">
<a href="<?= base_url ?>Pelicula/entrada&film=<?=$respuesta->nombre?>&cine=<?=$respuesta->cine?>&hora=<?=$respuesta->hora?>&dia=<?=$respuesta->dia?>&sala=<?=$respuesta->sala?>"><?=$respuesta->hora?></a>
</li>
<?php endwhile;?>
</ul>
</div>

</div>

<div class="clearfix"></div>