<?php

class Cine {

    private $id;
    private $nombre;
    private $ciudad;
    private $provincia;
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

    function getCiudad() {
        return $this->ciudad;
    }

    function getProvincia() {
        return $this->provincia;
    }

    //--------------

    

    function setId($id) {
        $this->id = $id;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setCiudad($ciudad) {
        $this->ciudad = $ciudad;
    }

    function setProvincia($provincia) {
        $this->provincia = $provincia;
    }




    public function show() {
        $sql = "select DISTINCT provincia from cine;";
        $cine = $this->db->query($sql);  
        return $cine;
        
    }



    public function showFilm($cine) {
        $sql = "select distinct ci.nombre cine, pel.nombre nombre,pel.img img,pel.edad edad,pel.duracion duracion from sala sal 
        inner join cine ci on ci.id=sal.id_cine 
        inner join conexion con on con.id_sala=sal.id 
        inner join pelicula pel on pel.id= con.id_pelicula where ci.nombre='$cine' and con.dia_accion = curdate();";
        $pelis = $this->db->query($sql);  
        return $pelis;
        
    }

    /*
    public function showFilm($cine) {
        $sql = "select distinct ci.nombre cine, pel.nombre nombre,pel.img img,pel.edad edad,pel.duracion duracion from sala sal 
        inner join cine ci on ci.id=sal.id_cine 
        inner join conexion con on con.id_sala=sal.id 
        inner join pelicula pel on pel.id= con.id_pelicula where ci.nombre='$cine';";
        $pelis = $this->db->query($sql);  
        return $pelis;
        
    }*/

    public function showFooter() {
        $sql = "select nombre,ciudad from cine order by ciudad asc;";
        $cine = $this->db->query($sql);  
        return $cine;
        
    }



    public function showFilmHorario($cine,$pelicula) {
        $sql = "select ci.nombre, ci.id id_cine,pel.nombre,sal.num_sala,date_format(con.dia_accion,'%d') dia,con.dia_accion fecha,con.hora_accion from sala sal
        inner join cine ci on ci.id=sal.id_cine
        inner join conexion con on con.id_sala=sal.id
        inner join pelicula pel on pel.id= con.id_pelicula
        where ci.nombre='$cine' and pel.nombre='$pelicula' and con.dia_accion = curdate();";
        $pelis = $this->db->query($sql);  
        return $pelis;
        
    }







}