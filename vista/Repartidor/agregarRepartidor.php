<?php
require_once("../../controlador/RepartidorDAO.php");
if(isset($_POST['nombre']) && isset($_POST['username']) && isset($_POST['password']) && isset($_POST['placas']) && isset($_POST['idtienda']) && isset($_POST['correo'])){
    $params['nombre'] = $_POST['nombre'];
    $params['password'] = $_POST['password'];
    $params['placas'] = $_POST['placas'];
    $params['idtienda'] = $_POST['idtienda'];
    $params['correo'] = $_POST['correo'];
    $params['username'] = $_POST['username'];
    $resultado = RepartidorDAO::getInstance()->agregarRepartidor($params);
    echo json_encode($resultado);
}