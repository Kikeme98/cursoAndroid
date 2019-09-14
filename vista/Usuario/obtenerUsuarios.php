<?php
require_once('../../controlador/UsuarioDAO.php');
$usuarios = UsuarioDAO::getInstance()->obtenerUsuarios();
echo json_encode($usuarios);