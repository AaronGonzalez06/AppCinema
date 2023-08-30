<?php
$host= $_SERVER["HTTP_HOST"];
$url= $_SERVER["REQUEST_URI"];
$urlActual = "http://" . $host . $url;
if($urlActual == "http://localhost/CineAnd/"):?>
<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">

  <div class="carousel-inner">
    <?php
        $aux = 0;
        $active = "active";
        $mostrar = Utils::img_film();
        while ($image = $mostrar->fetch_object()):?>
        <div class="carousel-item <?php if($aux == 0):?> <?=$active?> <?php endif; $aux++;?>">
        <img src="<?= base_url ?>/uploads/img/<?= $image->img ?>" class="d-block w-100" alt="...">
        </div>
    <?php endwhile; ?>


  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<?php endif;?>
<main >