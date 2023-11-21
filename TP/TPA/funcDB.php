<?php  
    function validateUser($con,$nombre,$contraseña){
        $sql=$con->prepare("SELECT nombre,contrasenia FROM usuarios where nombre=? AND contrasenia=?");
        $sql->bind_param("ss",$nombre,$contraseña);
        $sql->execute();
        $sql->store_result();
    
            if($sql->num_rows==0){ //si no existe
                return false;
            }
            else{ //si existe
                return true;
            }
    }

    function validarNombreExistente($con,$nombre){
        $sql="SELECT nombre FROM usuarios where nombre='$nombre'";

        if($resultado=$con->query($sql)){
            if($resultado->num_rows==0){ //si no existe
                return false;
            }
            else{ //si existe
                return true;
            }
        }        
    }

    function ingresarUsuario($con,$nombre,$contraseña){
        $sql=$con->prepare("INSERT INTO usuarios (nombre,contrasenia) values (?,?)");
        $sql->bind_param("ss",$nombre,$contraseña);
        $sql->execute();
    }

    function getUserId($con,$nombre){
        
        $sql="SELECT id_user from usuarios where nombre='$nombre'";
        if($resultado=$con->query($sql)){
            if($resultado->num_rows==1){
                $id=$resultado->fetch_assoc();
                return $id['id_user'];
            }
        }
        return 0;
    }

    function cantProdCarrito($con,$nom_usuario){
        $id=getUserId($con,$nom_usuario);
        $sql="SELECT COUNT(*) as 'cantidad' from carrito where id_usuario='$id'";
        if($resultado=$con->query($sql)){
            if($resultado->num_rows==1){
                $cantidad=$resultado->fetch_assoc();
                return $cantidad['cantidad'];
            }
        }
        return 0;
    }

    function validarCarrito($con,$id_user,$id_prod){ //verifico si usuario y producto esta en carrito
        $sql="SELECT * FROM carrito where id_producto='$id_prod' && id_usuario='$id_user'";
        if($resultado=$con->query($sql)){
            if($resultado->num_rows==1){
                return true;
            }
            else{
                return false;
            }
        }
    }

    function getProductos(){
        
    }

    function getListProd($con,$id_user){
        $sql="SELECT * FROM carrito 
        inner join producto on (carrito.id_producto=producto.id_prod)
        where carrito.id_usuario='$id_user'";

        $listado=array();

        if($resultado=$con->query($sql)){
            if($resultado->num_rows>0){
                while($fila = $resultado->fetch_assoc()){
                    $listado[]=$fila;
                }
            }
            return $listado;
        }
    }

    function modifCant($con,$id_user,$id_prod,$cantidad){ //capaz mejor una funcion validar stock y que otra agregue, parapoder informar
        //verifico que la cantidad que quiere agregar y la que ya tiene no sobrepasa stock
        $sql="UPDATE carrito set cantidad='$cantidad' where id_producto='$id_prod' && id_usuario='$id_user'";

        $con->query($sql);
    }

    function sumarCant($con,$id_user,$id_prod,$cantidad){ //capaz mejor una funcion validar stock y que otra agregue, parapoder informar
        //verifico que la cantidad que quiere agregar y la que ya tiene no sobrepasa stock
        $sql="SELECT producto.stock as 'stockprod',carrito.cantidad as 'cantcarrito' FROM carrito 
        inner join producto on (carrito.id_producto=producto.id_prod)
        where carrito.id_producto='$id_prod' && carrito.id_usuario='$id_user'";

        if($resultado=$con->query($sql)){
            if($resultado->num_rows>0){                
                while($fila = $resultado->fetch_assoc()){
                    $suma=$fila['cantcarrito']+$cantidad;
                    $stock=$fila['stockprod'];
                }
            }
        }

        if($stock>=$suma){

            $sql="UPDATE carrito SET cantidad='$suma' where carrito.id_producto='$id_prod' && carrito.id_usuario='$id_user'";
            $con->query($sql);

        }
        else{ //informar que sobrepasa stock

        }
    }

    function agregaralCarrito($con,$id_user,$id_prod,$cantidad){
        $sql="INSERT INTO carrito VALUES ('$id_prod','$id_user','$cantidad')";
        $con->query($sql);
    }

    function eliminardeCarro($con,$id_user,$id_prod){
        $sql="DELETE FROM carrito where id_producto='$id_prod' && id_usuario='$id_user'";
        $con->query($sql);
    }

    function eliminarCarro($con,$id_user){
        $sql="DELETE FROM carrito where id_usuario='$id_user'";
        $con->query($sql);
    }

?>