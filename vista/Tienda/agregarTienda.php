<?php
require_once("../../controlador/TIendaDAO.php");
if(isset($_POST['nombre']) && isset($_POST['direccion']) && isset($_POST['latitud']) && isset($_POST['longitud']) && isset($_POST['descripcion'])){
    $params['nombre'] = $_POST['nombre'];
    $params['direccion'] = $_POST['direccion'];
    $params['latitud'] = $_POST['latitud'];
    $params['longitud'] = $_POST['longitud'];
    $params['descripcion'] = $_POST['descripcion'];
    $resultado = TiendaDAO::getInstance()->agregarTienda($params);
    if($resultado){
        echo json_encode(array('response'=>1, 'data'=> $resultado));
    }else{
        echo json_encode(array('response'=>0, 'data'=> 0));
    }
    
}else{
    echo "FAIL";    
}