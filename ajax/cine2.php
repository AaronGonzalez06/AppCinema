<?php
//require_once '../config/db.php';
//require_once '../helpers/utils.php';
$conexion = mysqli_connect('localhost', 'root','','cinema');
$ciudad = $_POST['enciudad'];


function cines ($ciudad,$conexion){
    
    $sql = "select nombre from cine where ciudad='$ciudad';";

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

 $cines = cines($ciudad,$conexion);


while($cine = mysqli_fetch_assoc($cines)){


    echo "<option  value='". $cine['nombre'] ."'>".$cine['nombre']."</option>" ;

}






//echo $horitas;


