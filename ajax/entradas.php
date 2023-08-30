<?php
session_start();
//require_once '../config/db.php';
//require_once '../helpers/utils.php';
$conexion = mysqli_connect('localhost', 'root','','cinema');
$conexion->set_charset("utf8");
$sitios = json_decode($_POST['sitios']);

$fecha = $_SESSION['dia'];
$hora =  $_SESSION['hora'];
$sala = $_SESSION['sala'];
$cine = $_SESSION['cine'];
$_SESSION['butacas'] = $sitios;

//echo "<p> " . var_dump(count($sitios)) . "</p>";



for( $x=0;$x<count($sitios);$x++ ){
    $butaca = $sitios[$x];
    $butacatrim = trim($butaca); 
    $sql = "insert into ocupado values ('$butacatrim', (select id from sala where num_sala =$sala and id_cine =(select id from cine where nombre='$cine')) ,'$fecha','$hora');";

    $secciones=mysqli_query($conexion, $sql);
    
    if ($secciones) {

        //header('Location: http://localhost/CineAnd/');
        //exit;
        //echo "a";
        
       
    } else{
        echo "b";
    }

}













//insert into ocupado values ("1-2-oeste", (select id from sala where num_sala =10 and id_cine =(select id from cine where nombre="Cine surloco")) ,"2022-01-25","13:00");