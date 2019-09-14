<?php
require_once("../../controlador/TiendaDAO.php");
$tiendas = TiendaDAO::getInstance()->obtenerTiendas();
echo json_encode(array('response'=> 0, 'data'=> $tiendas, 'message'=> "ok"));
