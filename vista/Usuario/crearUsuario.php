<?php
    require_once('../../controlador/UsuarioDAO.php');
    if(isset($_POST['user'])&& isset($_POST['nombre'])&& isset($_POST['correo']) && isset($_POST['direccion'])&& isset($_POST['password'])){
        $user = $_POST['user'];
        $nombre = $_POST['nombre'];
        $correo = $_POST['correo'];
        $direccion = $_POST['direccion'];
        $password = $_POST['password'];
        $usuario = UsuarioDAO::getInstance()->comprobarUsuarioPorCorreo($correo);
        if($usuario){
           echo json_encode(array(['response'=>0, 'message'=>"Correo duplicado"]));
           exit();
        }

        echo "jsahgdsaljd";
        $usuario = UsuarioDAO::getInstance()->comprobarUsuarioPorUsername($user);
        if($usuario){
            echo json_encode(array('response'=>0, 'message'=>"Usuario duplicado"));
           exit();
        }
        $passwEncript = UsuarioDAO::getInstance()->encriptarPassword($password);
        $idUsuario = UsuarioDAO::getInstance()->agregarUsuario($nombre,$direccion,$passwEncript,$correo,$user);
        if($idUsuario){
            echo json_encode(array('response'=>1, 'value'=> $idUsuario));
            exit();
        }
    }else{
        echo 'faltan datos';
    }
    



?>