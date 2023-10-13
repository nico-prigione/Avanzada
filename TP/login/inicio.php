<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
</head>
<body>
    <?php include '../cabecera.php'?>
    <link rel="stylesheet" href="../css/estilo.css">
    
    <?php session_start();?>
    

    <h1> <?php echo "Hola ".$_SESSION['usuario'];?> <h1> 
    
</body>
</html>