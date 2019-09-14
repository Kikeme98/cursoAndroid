<?php
class RepartidorDAO{
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

    public function obtenerRepartidoresPorTienda($idtienda){
        try {
            $query = $this->pdo->prepare("SELECT * from tienda where idtienda = ?");
            $resultado = $query->execute([$idtienda]);
            if($resultado){
                return $query->fetchAll(PDO::FETCH_OBJ);
            }
            return 0;
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function agregarRepartidor($params){
        try {
            $query = $this->pdo->prepare("INSERT INTO repartidor(nombre, user, correo, password, placas, idtienda) VALUES(?,?,?,?,?,?);");
            $resultado = $query->execute(array($params['nombre'], $params['username'], $params['correo'], $params['password'], $params['placas'], $params['idtienda']));
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