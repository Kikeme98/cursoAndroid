<?php
require_once('../../config/database.php');
class UsuarioDAO{
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

    public function encriptarPassword($password){
        return md5($password);
    }
    
    public function agregarUsuario($nombre, $direccion, $passwordEnc, $correo, $user){
        $query = $this->pdo->prepare("INSERT INTO usuario(user, nombre, correo, direccion, password) VALUES (?,?,?,?,?)");
        $result = $query->execute([$user, $nombre, $correo, $direccion, $passwordEnc]);
        $id = $this->pdo->lastInsertId();
        if($result){
            return $id;
        }else{
            return 0;
        }
    }

    public function comprobarUsuarioPorCorreo($correo){
        try{
            $query = $this->pdo->prepare("SELECT * from usuario WHERE correo = ?");
            $query->execute([$correo]);
            return $query->fetch(PDO::FETCH_ASSOC);
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
    
    public function comprobarUsuarioPorUsername($user){
        try {
            $query = $this->pdo->prepare("SELECT * from usuario WHERE user = ?");
            $query->execute([$user]);
            return $query->fetch(PDO::FETCH_ASSOC);
        } catch (Throwable $th) {
            //throw $th;
        }
    }
    public function obtenerUsuarios(){
        try {
            $query = $this->pdo->prepare("SELECT * from usuario");
            $query->execute();
            return $query->fetchAll(PDO::FETCH_OBJ);
        } catch (Throwable $th) {
            //throw $th;
        }
    }

    public function comprobarInicioSesion($user, $password){
        try {
            $query = $this->pdo->prepare("SELECT * from usuario where user = ? and password = ?");
            $query->execute([$user, $password]);
            if($query->fetch(PDO::FETCH_OBJ) != null){
                return 1;
            }
            return 0;
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

}