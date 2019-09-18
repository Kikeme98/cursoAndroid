<?php
require_once("../../controlador/ProductoDAO.php");
$params['nombre'] = $_POST['nombre'];
$params['precio'] = $_POST['precio'];
$params['stock'] = $_POST['stock'];
$params['description'] = $_POST['description'];
$params['idtienda'] = $_POST['idtienda'];
$resultado = ProductoDAO::getInstance()->agregarProducto($params);
echo $resultado;