<?php
require_once("../../config/database.php");
class TiendaDAO{
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

    public function agregarTienda($params){
        $query = $this->pdo->prepare("INSERT INTO tienda(nombre, direccion, latitud, longitud, descripcion) VALUES (?,?,?,?,?);");
        $result = $query->execute(array($params['nombre'], $params['direccion'], $params['latitud'], $params['longitud'], $params['descripcion']));
        $id = $this->pdo->lastInsertId();
        if($result){
            return $id;
        }else{
            return 0;
        }
    }

    public function obtenerTiendas(){
        try{
            $query = $this->pdo->prepare("SELECT * from tienda");
            $query->execute();
            return $query->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }

    public function actualizarTienda($params){
        try{
            $query = $this->pdo->prepare("UPDATE tienda SET nombre = ?, direccion = ?, latitud = ?, longitud = ?, descripcion = ? WHERE id = ?");
            $result = $query -> execute(array($params['nombre'], $params['direccion'], $params['latitud'], $params['longitud'], $params['descripcion'], $params['idtienda']));
            if($result){
                return 1;
            }else{
                return 0;
            }
        }catch(Exception $e){

        }
    }
}