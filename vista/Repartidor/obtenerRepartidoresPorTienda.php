<?php
require_once("../../controlador/RepartidorDAO.php");
if(isset($_GET['idtienda'])){
    $resultado = RepartidorDAO::getInstance()->obtenerRepartidoresPorTienda($_GET['idtienda']);
    echo json_encode(array('response'=>1, 'data'=>$resultado));
}