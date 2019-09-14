<?php
require_once("../../controlador/UsuarioDAO.php");
if(isset($_GET['usuario']) && isset($_GET['password'])){
    $user = $_GET['usuario'];
    $password = $_GET['password'];
    $passEnc = UsuarioDAO::getInstance()->encriptarPassword($password);
    $comprobacion = UsuarioDAO::getInstance()->comprobarInicioSesion($user, $passEnc);
    echo $comprobacion;

}else{
    echo "faltan datos";
}
