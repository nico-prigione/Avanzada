<?php

include($_SERVER['DOCUMENT_ROOT'].'/TPA/configuracion.php');

    function cabecSinSesion($ruta){
        $cabecera="
        <div class='container-fluid'>
            <div class='row bg-info align-items-start'>
                <div class='col-xl-6 col-lg-6 col-md-6 col-6'>
                <img src='".$ruta."/imagenes/logo.png' class='col' height='90'>
                </div>
            </div> 
        </div>
        ";
        return $cabecera;
    }

    function cabecConSesion($ruta){

        $cabecera="
        <nav class='navbar navbar-expand-lg py-0' style='background-color: #E6F1F3'>
            <div class='container-fluid'>   
                <a class='navbar-brand'>
                    <img src='".$ruta."/imagenes/logo.png' class='col' height='80px'>
                </a>
                <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarSupportedContent' aria-controls='navbarSupportedContent' aria-expanded='false' aria-label='Toggle navigation'>
                <span class='navbar-toggler-icon'></span>
                </button>

                <div class='collapse navbar-collapse' id='navbarSupportedContent'>
                    <ul class='navbar-nav me-auto ml-8 mb-2 mb-lg-0'>
                        <li class='nav-item'>
                            <a class='nav-link active' aria-current='page' href='".$ruta."/inicio.php'>Home</a>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link' href='".$ruta."/carrito/mostrarCarrito.php'>Carrito(".$_SESSION['cantidad'].")</a>
                        </li>
                    </ul>
                    <span class='navbar-text'>";
                        $cabecera.="<b>Hola ".$_SESSION['usuario'] ." </b>
                    </span>
                    
                
                <a href='".$ruta."/login/logout.php' class='btn btn-outline-secondary'>Cerrar sesión</a>

            </div>
        </nav>";
        
        return $cabecera;
    }

    if(isset($_SESSION['usuario'])){
        echo cabecConSesion($ruta);
    }
    else{
        echo cabecSinSesion($ruta);
    }

    
?>