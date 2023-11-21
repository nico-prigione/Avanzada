<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="css/estilo.css" rel="stylesheet" type="text/css">
        
</head>
<body class="estilo-bg">   
    
<?php include 'cabecera.php'; ?>


        <?php 
        session_start();

        require 'token.php';

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

        <div class="mt-5 p-3 container" id="notif">
            <div class="row justify-content-center text-center">
                <div class="col-8 col-md-6 col-lg-4 col-xl-3 border rounded" style="background-color: #E6F1F3" >
                    <h2 class="my-3">Iniciar sesión</h2>
                    <form action="login/procesoLogin.php" method="post" >

                        <input type="hidden" name="token" value="<?php echo $token;?>">
                        
                        <div class="mb-3">
                            <input type="text" name="usuario" class="form-control" placeholder="Usuario" required>
                        </div>

                        <div class="mb-3">
                            <input type="password" name="contraseña" class="form-control" placeholder="Contraseña" required>      
                        </div>

                        <div class="mb-3 d-flex">
                            <input class="form-control " placeholder="Captcha" type="text" maxlength="4" name="captcha" required>
                            
                            <img src="login/captcha.php"> 
                            
                        </div>        

                        <div class="mb-2">
                            <input type="submit" value="Acceder" class="btn btn-success">
                        </div>
                        
                
                    </form>

                    <hr>

                    <a href="register/formRegistro.php" class="btn btn-success mb-2">Crear nueva cuenta</a>

                </div> 
            </div>
        </div> 
        
    
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    
</body>
</html>