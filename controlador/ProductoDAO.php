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
        try {
            $query = $this->pdo->prepare("INSERT INTO producto(nombre, precio, stock, descripcion, idtienda) VALUES(?,?,?,?);");
            $resultado = $query->execute(array($params['nombre'], $params['precio'], $params['stock'], $params['descripcion'], $params['idtienda']));
            if($resultado){
                $id = $this->pdo->lastInsertId();
                return $id;
            }else{
                return 0;
            }
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}