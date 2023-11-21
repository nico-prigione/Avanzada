<?php
    require '../conexionDB.php';
    require '../funcDB.php';

    session_start();
    if($_SESSION['token']==$_POST['token']){ //verifico token
        
        
        if(!validarNombreExistente($mysqli,$_POST['usuario'])){ //verifico si el nombre ya existe
            ingresarUsuario($mysqli,$_POST['usuario'],$_POST['contraseña']);

            $_SESSION['usuario']=$_POST['usuario'];
            header('Location:../inicio.php');
            exit;
        }
        else{ //notify nombre existente

        }
    }

    $mysqli->close();
?>