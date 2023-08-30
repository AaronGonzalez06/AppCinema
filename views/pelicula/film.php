<div class="spacing row col-10 mt-5">
  
<?php while ($res = $resultado->fetch_object()): ?>
<div class=" col-3 ms-3 me-3 mb-4 card" style="width: 18rem;">
<a href="<?= base_url ?>Pelicula/info&film=<?=$res->nombre?>"><img src="./uploads/img/<?= $res->img ?>" class="card-img-top sepia" alt="..."></a>
<div class="card-body">
<a href="<?= base_url ?>Pelicula/info&film=<?=$res->nombre?>"><h5 class="card-title"><?= $res->nombre ?></h5></a>
</div>
</div>
<?php endwhile; ?>
</div>