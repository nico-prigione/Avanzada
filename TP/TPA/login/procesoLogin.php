<?php
    session_start();
    require '../conexionDB.php';
    require '../funcDB.php';

    if($_SESSION['token']==$_POST['token']){ //verifico token
        if($_SESSION['captcha']==$_POST['captcha']){ //verifico captcha
            if(validateUser($mysqli,$_POST['usuario'],$_POST['contraseña'])){
                $_SESSION['usuario']=$_POST['usuario'];
                header('Location:../inicio.php');
                exit;
            }
            else{//notify
                $_SESSION['error']='El usuario o contraseña no es valido';
            }
        }
        else{//notify
    $_SESSION['error']='Captcha incorrecto';
    }
    }

    $mysqli->close();
    header('Location:../index.php');
    exit;
?>