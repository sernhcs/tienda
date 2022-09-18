<?php

class Pedido{
    private $id;
    private $usuario_id;
    private $provincia;
    private $localidad;
    private $direccion;
    private $costo;
    private $estado;
    private $fecha;
    private $hora;

    private $db;

    public function __construct(){
        $this->db = Database::connect();
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getUsuarioId()
    {
        return $this->usuario_id;
    }

    /**
     * @param mixed $usuario_id
     */
    public function setUsuarioId($usuario_id)
    {
        $this->usuario_id = $usuario_id;
    }

    /**
     * @return mixed
     */

    /**
     * @return mixed
     */
    public function getProvincia()
    {
        return $this->provincia;
    }

    /**
     * @param mixed $provincia
     */
    public function setProvincia($provincia)
    {
        $this->provincia =$this->db->real_escape_string($provincia) ;
    }

    /**
     * @return mixed
     */
    public function getLocalidad()
    {
        return $this->localidad;
    }

    /**
     * @param mixed $localidad
     */
    public function setLocalidad($localidad)
    {
        $this->localidad = $this->db->real_escape_string($localidad) ;
    }


    /**
     * @return mixed
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * @param mixed $direccion
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $this->db->real_escape_string($direccion) ;
    }


    /**
     * @return mixed
     */
    public function getCosto()
    {
        return $this->costo;
    }

    /**
     * @param mixed $costo
     */
    public function setCosto($costo)
    {
        $this->costo = $costo;
    }

    /**
     * @return mixed
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * @param mixed $estado
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;
    }

    /**
     * @return mixed
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * @param mixed $fecha
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }

    /**
     * @return mixed
     */
    public function getHora()
    {
        return $this->hora;
    }

    /**
     * @param mixed $hora
     */
    public function setHora($hora)
    {
        $this->hora = $hora;
    }


    public function getAll(){
        $productos = $this->db->query("SELECT * FROM pedidos ORDER BY id DESC");
        return $productos;
    }


    public function getOne(){
        $producto = $this->db->query("SELECT * FROM pedidos WHERE id={$this->getId()} ");

        return $producto->fetch_object();
    }


    public function getOneByUser(){
        $sql = "SELECT p.id, p.costo FROM pedidos p "

                . " WHERE p.usuario_id = {$this->getUsuarioId()} ORDER BY id DESC LIMIT 1";
        $pedido = $this->db->query($sql);

        return $pedido->fetch_object();
    }

    public function getAllByUser(){
        $sql = "SELECT p.*  FROM pedidos p "

            . " WHERE p.usuario_id = {$this->getUsuarioId()} ORDER BY id DESC";
        $pedido = $this->db->query($sql);

        return $pedido;
    }

    public function getProductosByPedido($id){
      //  $sql ="SELECT * FROM productos WHERE id IN "
        //     . " (SELECT producto_id FROM lineas_pedidos WHERE pedido_id={$id})";

        $sql = "SELECT pr.*, lp.unidades FROM productos pr "
            . " INNER JOIN lineas_pedidos lp ON pr.id = lp.producto_id "
            . " WHERE lp.pedido_id={$id}";

        $productos = $this->db->query($sql);

        return $productos;
    }

    public function save(){
        $sql = "INSERT INTO pedidos VALUES(null,{$this->getUsuarioId()},'{$this->getProvincia()}','{$this->getLocalidad()}','{$this->getDireccion()}',{$this->getCosto()}, 'confirm',current_date(),current_time() );";
        $save = $this->db->query($sql);

        $result = false;
        if ($save){
            $result=true;
        }
        return $result;
    }

    public function save_linea(){
        $sql="SELECT LAST_INSERT_ID() as 'pedido';";
        $query = $this->db->query($sql);
        $pedido_id =  $query->fetch_object()->pedido;

        foreach ($_SESSION['carrito'] as $elemento) {
            $producto = $elemento['producto'];

            //insertar los pedidos en la db
            $insert = "INSERT INTO lineas_pedidos VALUES(null, {$pedido_id}, {$producto->id}, {$elemento['unidades']})";
            $save = $this->db->query($insert);

            $result = false;
            if ($save){
                $result=true;
            }


        }
        return $result;


    }


}


?>