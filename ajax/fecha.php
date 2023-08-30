<?php
//require_once '../config/parameters.php';

session_start();
$conexion = mysqli_connect('localhost', 'root','','cinema');
$conexion->set_charset("utf8");
$fecha = $_POST['enfecha'];
$ano = date('y');

function horaFecha ($dato,$conexion,$pelicula){
    
    $sql = "select ci.nombre cine, ci.id id_cine,pel.nombre,sal.num_sala,con.dia_accion,con.hora_accion
    from sala sal 
    inner join cine ci on ci.id=sal.id_cine 
    inner join conexion con on con.id_sala=sal.id 
    inner join pelicula pel on pel.id= con.id_pelicula 
    where date_format(dia_accion,'%d-%m-%Y')='$dato' and pel.nombre='$pelicula';";

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

 $horas = horaFecha($fechaCompleta,$conexion,$_SESSION['pelicula']);

 //$horitas = "";

while($articulo = mysqli_fetch_assoc($horas)){

  /*$horitas .= $articulo['hora_accion'];
  $horitas .= " ";*/
    
  echo "<li class='hora horario" .$articulo['id_cine']."'><a href='http://localhost/CineAnd/Pelicula/entrada&film=".$articulo['nombre']."&cine=".$articulo['cine']."&hora=".$articulo['hora_accion']."&dia=".$articulo['dia_accion']."&sala=".$articulo['num_sala']."'> ". $articulo['hora_accion'] ."</a></li>";

 
}

