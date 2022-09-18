<?php
class Categoria{
    private $id;
    private $nombre;
    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }


    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }


    public function getNombre()
    {
        return $this->nombre;
    }


    public function setNombre($nombre)
    {
        $this->nombre = $this->db->real_escape_string($nombre);
    }

    public function getAll() {
        $categorias = $this->db->query("SELECT * FROM categorias ORDER BY id ASC;");
        return $categorias;
    }

    public function getOne(){
        $categoria = $this->db->query("SELECT * FROM categorias WHERE id={$this->getId()} ;");
        return $categoria->fetch_object();
    }

    public function save(){
        $sql = "INSERT INTO categorias ( nombre) VALUES('{$this->getNombre()}');";

        $save = $this->db->query($sql);

        $result = false;
        if ($save){
            $result=true;
        }
        return $result;
    }

    public function edit(){
        $sql = "UPDATE categorias set nombre = '{$this->getNombre()}' where id = {$this->getId()};";

        $save = $this->db->query($sql);

        $result = false;
        if ($save){
            $result=true;
        }
        return $result;
    }

    public function delete(){
        $sql = "DELETE FROM categorias where id={$this->id}";
        $delete =$this->db->query($sql);

        $result = false;
        if ($delete){
            $result=true;
        }
        return $result;
    }


}



