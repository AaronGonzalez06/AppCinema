<?php
$conexion = mysqli_connect('localhost', 'root','','cinema');






/*oeste*/
for($x=1;$x<10;$x++){
    for($y=1;$y<5;$y++){

        $dato = $x."-".$y."-oeste";
        $sql = "insert into butaca values ('$dato') ";

        $insertar=mysqli_query($conexion, $sql);
                $resul = array();
            if ($insertar) {
                  echo "<p>datos introducido</p>" ;
                } else{
                     echo "error" ;
                }



    }
}


/*centro*/
for($t=1;$t<10;$t++){
    for($u=1;$u<12;$u++){

        $dato = $t."-".$u."-centro";
        $sql = "insert into butaca values ('$dato') ";

        $insertar=mysqli_query($conexion, $sql);
                $resul = array();
            if ($insertar) {
                  echo "<p>datos introducido</p>" ;
                } else{
                     echo "error" ;
                }



    }
}



/** este */
for($j=1;$j<10;$j++){
    for($f=1;$f<5;$f++){

        $dato = $j."-".$f."-este";
        $sql = "insert into butaca values ('$dato') ";

        $insertar=mysqli_query($conexion, $sql);
                $resul = array();
            if ($insertar) {
                  echo "<p>datos introducido</p>" ;
                } else{
                     echo "error" ;
                }



    }
}




