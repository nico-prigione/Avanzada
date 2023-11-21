<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="css/estilo.css" rel="stylesheet" type="text/css">
</head>
<body>
  <?php session_start();
  if(isset($_SESSION['usuario'])){
    require 'conexionDB.php';
    require 'funcDB.php';
    
    $_SESSION['cantidad']=cantProdCarrito($mysqli,$_SESSION['usuario']);

    include 'cabecera.php';?>
    
        <div class="row">    

        <?php $sql='SELECT * FROM producto';

        if($resultado=$mysqli->query($sql)){
          if($resultado->num_rows>0){?>

           <?php while($producto=$resultado->fetch_assoc()){
              if($producto['stock']>0){?>



                
              
                <div class="col-auto my-5">
                  <div class="card">
                    <img src="<?php echo $producto['imagen']?>" alt="" class="card-img-top">
                    <div class="card-body">
                      <span><?php echo $producto['nombre'];?></span>
                      <h5 class="card-title"><?php echo '$'.$producto['monto'];?></h5>
                      <p class="card-text"><?php echo $producto['marca'].' - '.$producto['modelo'];?></p>
                      
                      <?php                
                  
                        $id_usuario=getUserId($mysqli,$_SESSION['usuario']);
                        if($id_usuario>0){?>                    

                          <form action="carrito/carrito.php" method="post">
                            <input type="hidden" name="id_producto" id="id_producto" value="<?php echo $producto['id_prod'];?>">

                            <input type="hidden" name="id_usuario" id="id_user" value="<?php echo $id_usuario?>">

                            <input type="number" class="" name="cantidad" id="cantidad" min="1" max="<?php echo $producto['stock'];?>">                        
                            
                            <input type="submit" class="btn btn-primary" value="Agregar" name="accion">
                          </form>
                      
                      <?php }?>    
                    </div>
                  </div>                
                </div>
                
              <?php }?> 
            <?php }?> 
          <?php }?>  
        <?php }?>                  
      </div>      
  
  <?php $mysqli->close();?>

  <?php }?>

  <script src="valores.js"></script>
  <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>