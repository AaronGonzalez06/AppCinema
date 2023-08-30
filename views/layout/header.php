<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, user-scalable=no" />
    <title>Cine</title>
    <link rel="stylesheet" href="<?= base_url ?>bootstrap/css/bootstrap.min.css" />
    <link type="text/css" rel="stylesheet" href="<?= base_url ?>style.css" />
    <script type="text/javascript" src="<?= base_url ?>JS/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="<?= base_url ?>bootstrap/js/bootstrap.min.js"></script>
    <script src="<?= base_url ?>JS/main.js"></script>
    
</head>

<body>

    <div class="container-fluid centro">
        
        <header class="row">
        
               <h1 class="col-2 margen_h1"><a href="<?= base_url ?>">Cine sur</a></h1>
               <nav class="col-5 navbar margen_nav">
                <div class="container-fluid">
                  <form class="d-flex" method="POST" action="<?= base_url ?>Cine/peliculas">
                  <select name="provincia" class="form-select SelectCineCiudad" aria-label="Default select example">   
<?php
$mostrar = Utils::provincia();
  while ($pro = $mostrar->fetch_object()):?>
<option  value="<?= $pro->provincia ?>"><?= $pro->provincia ?></option>

<?php endwhile; ?>
</select>
<select name="cine" class="form-select SelectCine" aria-label="Default select example">

</select>
                    <button class="btn btn-outline-success" type="submit">Search</button>
                  </form>
                </div>
              </nav>            
               
        </header>
        <hr/>
        <nav class=" col-5 navbar navbar-expand-lg navbar-light bg-light navegador">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url ?>Pelicula/all">
          <img class="imgHeader" src="<?= base_url ?>/uploads/icono/cine.png"/>
            <img class="imgHeader" src="<?= base_url ?>/uploads/icono/entrada.png"/>
             Peliculas <img class="imgHeader" src="<?= base_url ?>/uploads/icono/entrada.png"/> 
             <img class="imgHeader" src="<?= base_url ?>/uploads/icono/cine.png"/>
            </a>
          
        </li>

      </ul>
    </div>
  </div>
</nav>







