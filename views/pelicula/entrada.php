<?php

$_SESSION['sala']=$sala;
$_SESSION['cine']=$cine;
$_SESSION['hora']=$hora;
$_SESSION['dia']=$dia;
$_SESSION['flim']= $film;

?>
<div id="pantalla">
    <p>PANTALLA</p>
</div>



<?php
$butacas = array();
$aux = 0;
$aux2 = 55;
$aux3 = 55;
$aux4 = 55;
$mostrar = Utils::verificarSitio($film,$sala,$hora,$dia,$cine);
while ($pre = $mostrar->fetch_object()):?>
  
  <?php $butacas[$aux] = $pre->id_butaca;$aux++; ?>

<?php endwhile; ?>




<ul class="datos_entrada">
    <li><strong>Pelicula:<?=$film?></strong></li>
    <li><strong>Fecha:<?=$dia?></strong></li>
    <li><strong>Hora:<?=$hora?></strong></li>
    <li><strong>Cine:<?=$cine?></strong></li>
    <li><strong>Sala:<?=$sala?></strong></li>
</ul>

<p id="pay">Pagar</p>
<p id="ticked">Entradas: 0 </p>
<div id="pruebaEntrad"></div>


<div class="oeste">
<table class="oeste_butacas">
<?php
for($x=1; $x< 10; $x++){
    echo "<tr>";
    for($y=1; $y< 5; $y++){
        $oeste = $x."-".$y."-oeste";

        for($z=0;$z<count($butacas);$z++){
            if($oeste == $butacas[$z]){
                echo "<td class='ocupado'> ".$x."-".$y."</td>";
                $aux2=0;
            }

        }

        if($aux2 != 0 ){
            echo "<td> ".$x."-".$y."</td>";  
        }
        $aux2 = 1;


    }
    echo "</tr>";
}
?>
</table>  
</div>


<table class="centro_butacas" >
<?php
for($w=1; $w< 10; $w++){
    echo "<tr>";
    for($v=1; $v< 12; $v++){

        $centro = $w."-".$v."-centro";

        for($z=0;$z<count($butacas);$z++){
            if($centro == $butacas[$z]){
                echo "<td class='ocupado'> ".$w."-".$v."</td>";
                $aux3=0;
            }

        }

        if($aux3 != 0 ){
            echo "<td> ".$w."-".$v."</td>";  
        }
        $aux3 = 1;
 

    }
    echo "</tr>";
}
?>
</table>  


<div class="este">
<table >
<?php
for($f=1; $f< 10; $f++){
    echo "<tr>";
    for($g=1; $g< 5; $g++){

        $este = $f."-".$g."-este";

        for($z=0;$z<count($butacas);$z++){
            if($este == $butacas[$z]){
                echo "<td class='ocupado'> ".$f."-".$g."</td>";
                $aux4=0;
            }

        }

        if($aux4 != 0 ){
            echo "<td> ".$f."-".$g."</td>";  
        }
        $aux4 = 1;
 


    }
    echo "</tr>";
}
?>
</table>  
</div>
<div class="clearfix"></div>
