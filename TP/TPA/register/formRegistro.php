<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <header>
        <?php include '../cabecera.php';?>        
    </header>

    <?php 
        session_start();

        require '../token.php';

        $token=generatorToken(10);
        $_SESSION['token']=$token;
    ?>

    <div class="mt-5 p-3 container">
        <div class="row justify-content-center text-center">
            <div class="col-8 col-md-6 col-lg-4 col-xl-3 border rounded" style="background-color: #E6F1F3" >
                <h2 class="my-3">Registrate</h2>
                <form action="procesoRegistro.php" method="post" > <!-- action="<register/procesoRegistro.php"-->

                    <input type="hidden" name="token" value="<?php echo $token;?>">
                            
                    <div class="mb-3">
                        <input type="text" name="usuario" class="form-control" placeholder="Usuario" required>
                    </div>

                    <div class="mb-3">
                        <input type="password" name="contraseña" class="form-control" placeholder="Contraseña" required>      
                    </div>
                            
                    <div class="mb-2">
                        <input type="submit" value="Registrate" class="btn btn-success">
                    </div>

                    <div class="mb-2">
                        <a href="../index.php">Volver</a>
                    </div>     
                </form>
            </div>  
        </div>
    </div>
</body>
</html>

