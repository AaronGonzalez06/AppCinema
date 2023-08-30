
<nav id="filtro_genero" class="navbar navbar-expand-lg navbar-light bg-light">

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
      <?php
        $mostrar = Utils::genero();
         while ($pro = $mostrar->fetch_object()):?>
        <li class="nav-item">
          <a class="nav-link active <?= $pro->genero ?>" aria-current="page" href="#"><?= $pro->genero ?></a>
        </li>
       <?php endwhile; ?>
      </ul>
    </div>
</nav>




<div id="allFilm">
<?php while ($res = $filmInfo->fetch_object()): ?>
    <article class="<?=$res->genero?>">

<a href="<?= base_url ?>Pelicula/info&film=<?=$res->nombre?>"><img class="imgBuscador" src="<?= base_url ?>uploads/img/<?= $res->img ?>" class="card-img-top sepia" alt="..."></a>

<ul>
    <li ><?= $res->nombre ?>.</li>
    <li ><?= $res->duracion ?> min.</li>
    <li >No recomendada para + <?= $res->edad ?>.</li>
    <li><a href="<?= base_url ?>Pelicula/info&film=<?=$res->nombre?>"><button type="button" class="btn btn-primary">Información</button></a></li>
    <li><a href="<?= base_url ?>Pelicula/info&film=<?=$res->nombre?>"><button type="button" class="btn btn-primary">Trailer</button></a></li>
</ul>


<div class="formInfo">
<iframe width="400" height="200" src="<?=$res->trailer?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

 </div>




 <div class="clearfix"></div>
 <hr>
 </article>
 <div class="clearfix"></div>
<?php endwhile; ?>
</div>