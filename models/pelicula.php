<?php

class Pelicula {

    private $id;
    private $nombre;
    private $descripcion;
    private $img;
    private $img2;
    private $fecha_estreno;
    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    function getId() {
        return $this->id;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getImg() {
        return $this->img;
    }

    function getImg2() {
        return $this->img2;
    }

    function getFecha_estreno() {
        return $this->fecha_estreno;
    }

    //--------------

    

    function setId($id) {
        $this->id = $id;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setImg($img) {
        $this->img = $img;
    }

    function setImg2($img2) {
        $this->img2 = $img2;
    }

    function setFecha_estreno($fecha_estreno) {
        $this->fecha_estreno = $fecha_estreno;
    }





    public function show() {
        $sql = "select * from pelicula;";
        $film = $this->db->query($sql);  
        return $film;
        
    }


    public function film($nombre) {
        $sql = "select * from pelicula where nombre='$nombre';";
        $film = $this->db->query($sql);  
        return $film;
        
    }

    public function imgFilm() {
        $sql = "select img from pelicula limit 5;";
        $film = $this->db->query($sql);  
        return $film;
        
    }

    public function genero() {
        $sql = "select distinct genero from pelicula;";
        $genero = $this->db->query($sql);  
        return $genero;
        
    }


    public function horarios($pelicula) {
        $sql = "select ci.nombre cine, ci.id idCine,pel.nombre nombre,sal.num_sala sala ,con.dia_accion dia,con.hora_accion hora from sala sal inner join cine ci on ci.id=sal.id_cine inner join conexion con on con.id_sala=sal.id  inner join pelicula pel on pel.id= con.id_pelicula where pel.nombre='$pelicula' and con.dia_accion=curdate() order by cine DESC";
        $film = $this->db->query($sql);  
        return $film;
        
    }

    public function cine($pelicula) {
        $sql = "select distinct ci.nombre, ci.id idCine from sala sal inner join cine ci on ci.id=sal.id_cine inner join conexion con on con.id_sala=sal.id inner join pelicula pel on pel.id= con.id_pelicula where pel.nombre='$pelicula'";
        $cine = $this->db->query($sql);  
        return $cine;
        
    }



    //prueba de verificacion

    public function comprobar($pelicula,$num_sala,$hora,$fecha,$cine) {
        $sql = "select distinct  oc.id_butaca from pelicula pe
        inner join conexion co on co.id_pelicula=pe.id
        inner join sala sa on sa.id=co.id_sala
        inner join ocupado oc on sa.id=oc.id_sala
        where  oc.id_sala= (select id from sala where num_sala=$num_sala and id_cine= (select id from cine where nombre='$cine')) and co.id_pelicula = (select id from pelicula where nombre='$pelicula')
        and oc.hora='$hora' and oc.fecha='$fecha';";
        $comprobar = $this->db->query($sql);  
        return $comprobar;
        
    }













//estas de aqui no valen, son de ejemplo. Proximamente se borraran

    public function add($nombre) {

        $sql = "insert into comentarios values(null,(select id from productos where nombre='$nombre'),'{$this->getComentario()}',curdate());";
        $save = $this->db->query($sql);

        $result = false;
        if ($save) {

            $result = true;
        }
        return $result;
    }

    public function verificar($nombre, $email) {

        $result = $this->db->query("select pro.* from productos "
                . "pro inner join lineas_pedidos lin on lin.producto_id = pro.id"
                . " inner join pedidos ped on lin.pedido_id= ped.id "
                . "where ped.usuario_id in (select id from usuarios where email='$email') and pro.nombre='$nombre';");
        return $result;
    }
    
    public function mostrar($id) {
        $sql = "select * from comentarios where producto_id=$id;";
        $comentario = $this->db->query($sql);  
        return $comentario;
        
    }

}