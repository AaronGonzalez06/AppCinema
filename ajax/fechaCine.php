<?php
//require_once '../config/parameters.php';

session_start();
$conexion = mysqli_connect('localhost', 'root','','cinema');
$conexion->set_charset("utf8");
$fecha = $_POST['enfecha'];
$cine = $_POST['encine'];
$ano = date('y');


        function carteleradia ($dato,$conexion,$cine){
    
         $sql = "select distinct ci.nombre cine, pel.nombre nombre,pel.img img,pel.edad edad,pel.duracion duracion from sala sal 
         inner join cine ci on ci.id=sal.id_cine 
         inner join conexion con on con.id_sala=sal.id 
         inner join pelicula pel on pel.id= con.id_pelicula where ci.nombre='$cine' and date_format(con.dia_accion,'%d-%m-%Y')='$dato';";
     
          $secciones=mysqli_query($conexion, $sql);
          $resul = array();
          if ($secciones && mysqli_num_rows($secciones) !=0) {
              
             $resul = $secciones; 
             return $resul;
          } else{
             return false;
          }
          
          //return $resul;
          
         
      };

function horaFecha ($dato,$conexion,$cine,$pelicula){
    
    $sql = "select distinct pel.nombre nombre,ci.nombre cine,con.dia_accion fecha, con.hora_accion, sal.num_sala, sal.id_cine from sala sal 
    inner join cine ci on ci.id=sal.id_cine 
    inner join conexion con on con.id_sala=sal.id 
    inner join pelicula pel on pel.id= con.id_pelicula
    where ci.nombre='$cine' and date_format(dia_accion,'%d-%m-%Y')='$dato' and pel.nombre='$pelicula';";

     $secciones=mysqli_query($conexion, $sql);
     $resul = array();
     if ($secciones && mysqli_num_rows($secciones) !=0) {
         
        $resul = $secciones; 
        return $resul;
     } else{
        return false;
     }
     
     //return $resul;
     
    
 };

 $fechaCompleta = trim($fecha)."-"."20" .$ano;

 //$horas = horaFecha($fechaCompleta,$conexion,$cine);
 
 $carteleraDia = carteleradia($fechaCompleta,$conexion,$cine);

 //$horitas = "";

while($peli = mysqli_fetch_assoc($carteleraDia)){

  /*$horitas .= $articulo['hora_accion'];
  $horitas .= " ";*/
    
/*echo "<li class='hora horario" .$articulo['id_cine']."'><a href='http://localhost/CineAnd/Pelicula/entrada&film=".$articulo['nombre'].
"&cine=".$articulo['cine']."&hora=".$articulo['hora_accion']."&dia=".$articulo['dia_accion'].
"&sala=".$articulo['num_sala']."'> ". $articulo['hora_accion'] ."</a></li>";*/


echo "<article>";
echo "<a href='http://localhost/CineAnd/Pelicula/info&film=".$peli['nombre']."'><img class='imgBuscador' src='http://localhost/CineAnd/uploads/img/".$peli['img']."' class='card-img-top sepia'></a>";


echo "<ul>";
echo "<li >".$peli['nombre'].".</li>";    
echo "<li >".$peli['duracion']." min.</li>";    
echo "<li >No recomendada para + ".$peli['edad'].".</li>";   
echo "</ul>";

echo "<ul>";
$horas = horaFecha($fechaCompleta,$conexion,$cine,$peli['nombre']);
while($peliTwo = mysqli_fetch_assoc($horas)){

   echo "<li class='infoCine'>";
   echo "<a href='http://localhost/CineAnd/Pelicula/entrada&film=".$peliTwo['nombre']."&cine=".$cine."&hora=".$peliTwo['hora_accion']."&dia=".$peliTwo['fecha']."&sala=".$peliTwo['num_sala']."'>";
   echo $peliTwo['hora_accion'];
   echo "</a>";
   echo "</li>";

}
echo "</ul>";
echo "<div class='clearfix'></div>";
echo "<hr>";
echo "</article>";
echo "<div class='clearfix'></div>";
}



