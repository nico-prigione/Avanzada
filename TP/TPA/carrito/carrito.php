<?php
    require '../conexionDB.php';
    require '../funcDB.php';

    if(isset($_POST['accion'])){
        
        $id_usuario=$_POST['id_usuario'];
        $id_producto=$_POST['id_producto'];

        switch ($_POST['accion']) {
            
            case 'Agregar': //tener en cuenta stock, que cuando lo agregue y pasa tiempo no se haya quedado sin stock
                $cantidad=$_POST['cantidad'];
                //desde inicio.php
                //verifica si ya está
                if(validarCarrito($mysqli,$id_usuario,$id_producto)){//si esta le suma cantidad
                    sumarCant($mysqli,$id_usuario,$id_producto,$cantidad);                    
                }
                else{//sino lo agrega                             
                    agregaralCarrito($mysqli,$id_usuario,$id_producto,$cantidad);
                }
                break;

            case 'Modificar': //desde mostrarCarrito, caso modifique cantidad
                $cantidad=$_POST['cantidad'];
                modifCant($mysqli,$id_usuario,$id_producto,$cantidad);
                break;
            
            case 'Eliminar': //desde mostrarCarrito, caso aprete la x
                session_start();
                
                eliminardeCarro($mysqli,$id_usuario,$id_producto);
                $_SESSION['cantidad']=cantProdCarrito($mysqli,$_SESSION['usuario']);
                break;

            case 'Comprar':
                eliminarCarro($mysqli,$id_usuario);
                break;
        }

        $mysqli->close();

        if(($_POST['accion']=='Agregar')||($_POST['accion']=='Comprar')){
            header('Location:../inicio.php');
            exit;
        }
        else{
            header('Location:mostrarCarrito.php');
            exit;
        }

        

    }

?>