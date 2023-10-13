<?php
    function generatorToken($length){
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randomString;
    }
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="../css/estilo.css">
        
</head>
<body>
    

        <header>
            <?php include $_SERVER['DOCUMENT_ROOT'].'/TP/cabecera.php';?>
        </header> 
        <div class="imagen-fondo">

            <!-- <img src="../imagenes/taller.jpg" alt=""> -->

        </div>

        

        <?php 
            session_start();

            $token=generatorToken(10);

            $_SESSION['token']=$token;
            
            
            if (isset($_SESSION['error'])):  //Si tiene mensaje de error de logueo fallido lo muestra
        ?>  
            <div class="alert alert-warning">
                <?php echo $_SESSION['error'];?>
            </div>
            <?php 
                $_SESSION['error']=NULL;
                endif;
            ?>

        <div class="mt-5 p-3 col-3 border container text-center rounded">
            <h2 class="my-3">Iniciar sesión</h2>

            <form action="login/procesoLogin.php" method="post" >
                <input type="hidden" name="token" value="<?php echo $token;?>">
                
                <div class="container col mb-3">
                    <input type="text" name="usuario" class="form-control" placeholder="Usuario" required>
                </div>

                <div class="container col mb-3">
                    <input type="password" name="contraseña" class="form-control" placeholder="Contraseña" required>      
                </div>

                <div class="container col mb-3">
                    <input class="form-control" placeholder="Captcha" type="text" id="captcha" name="captcha" required>
                    
                    <img src="login/captcha.php"> 
                    <!-- <input type="button" onclick=""> el onclick es de javascript, para recargar captcha-->
                </div>        

     
                <input type="submit" value="Acceder" class="btn btn-success">
               
            </form>
            <br>
            <a href="../contacto/formContacto.php">Contactanos</a>
        </div>

        
        
        
    
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <script>src="../moderna/moder.js"</script>
    </body>
</html>