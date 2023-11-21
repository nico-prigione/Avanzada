<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <title>Carrito</title>
</head>
<body>
    <?php        
        session_start();
        include '../cabecera.php';

        require '../conexionDB.php';
        require '../funcDB.php';        
        
        $id_user=getUserId($mysqli,$_SESSION['usuario']);
        $listado=getListProd($mysqli,$id_user);

        $totalCarrito=0;
    ?>
    <table id="carrito" class="table" style="width:100%">

        <thead>
            <tr>
                <th scope="col">Nombres</th>
                <th scope="col">Monto</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Precio total</th>
                <th scope="col">Accion</th>                
            </tr>
        </thead>
        <tbody>
            <?php         
                    foreach($listado as $fila){?>
                        <tr>
                            <td><?php echo $fila['nombre']?></td>
                            <td><?php echo $fila['monto']?></td>
                            <td>
                                <form action="carrito.php" method="post">
                                    <input type="hidden" name="id_producto" value="<?php echo $fila['id_producto'];?>">
                                    <input type="hidden" name="id_usuario" value="<?php echo $fila['id_usuario'];?>">
                                    <input type="number" name="cantidad" min="1" max="<?php echo $fila['stock'];?>" value="<?php echo $fila['cantidad'];?>">
                                    <input type="submit" class="btn-secondary" value="Modificar" name="accion">
                                </form>
                            </td>
                            <?php $total_prod=$fila['monto']*$fila['cantidad'];
                            $totalCarrito+=$total_prod;?>

                            <td><?php echo $total_prod;?></td>                           

                            <td>
                                <form action="carrito.php" method="post">
                                    <input type="hidden" value="<?php echo $fila['id_producto'];?>" name="id_producto">
                                    <input type="hidden" value="<?php echo $fila['id_usuario'];?>" name="id_usuario">
                                    <input type="submit" class="btn btn-danger" value="Eliminar" name="accion">
                                </form>                        
                            </td>
                        </tr>
                    <?php }?>          

        </tbody>
        <?php if($totalCarrito>0){?>
            <tfoot>
                <th colspan="3">Total</th>
                <th><?php echo $totalCarrito;?></th>
                <th>
                    <form action="carrito.php" method="post">
                        <input type="hidden" value="<?php echo $fila['id_usuario'];?>" name="id_usuario">
                        <input type="submit" class="btn btn-success" value="Comprar" name="accion">
                    </form>   
                </th>
            </tfoot>
        <?php }?>
    </table>

    <?php $mysqli->close();?>

    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    
    <script src="preparaTabla.js"></script>
</body>
</html>