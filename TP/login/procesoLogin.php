<?php
    session_start();

    if($_SESSION['token']==$_POST['token']){ //verifico token
        if($_SESSION['captcha']==$_POST['captcha']){ //verifico captcha
            if(($_POST['usuario']=='fcytuader')&&($_POST['contraseña']=='programacionavanzada')){
                $_SESSION['usuario']=$_POST['usuario'];
                header('Location:inicio.php');
                exit;
            }
            else{
                $_SESSION['error']='El usuario o contraseña no es valido';
            }
        }
        else{
    $_SESSION['error']='Captcha incorrecto';
    }
    }

    header('Location:../index.php');
    exit;
?>