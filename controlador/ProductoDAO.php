<?php
require_once("../config/database.php");
class ProductoDAO{
    public $pdo;
    private static $instancia;
    public function __construct(){
        try {
            $this->pdo = database::startUp();
            self::$instancia = $this;
        } catch (Throwable $th) {
            
        }
    }

    public function getInstance(){
        if(!self::$instancia instanceof self){
            self::$instancia = new self();
        }
        return self::$instancia;
    }

    public function agregarProducto($params){
        # code...
    }
}