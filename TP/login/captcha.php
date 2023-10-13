<?php

session_start();

// Generar una cadena CAPTCHA aleatoria
//$captcha = substr(md5(rand()), 0, 6);
$captcha=generador(5);


// Almacenar la cadena CAPTCHA en la sesión para su posterior verificación
$_SESSION['captcha'] = $captcha;



// Crear una imagen CAPTCHA
$image = imagecreate(120, 40);
$bgColor = imagecolorallocate($image, 180,255,30);
$textColor = imagecolorallocate($image, 0, 0, 0);

// Dibujar el texto CAPTCHA mas comun, esta bueno tambien
imagestring($image, 5, 25, 5, $captcha, $textColor);

// Dibujar el texto CAPTCHA con lo qe descargue ttf.
/*for ($i = 0; $i < strlen($captcha); $i++) {
    $angle = rand(-30, 30); // Rota el texto entre -30 y 30 grados
    imagettftext($image, 20, $angle, 20 + ($i * 20), 30, $textColor, '../imagenes/Sunday Orange.ttf', $captcha[$i]);
}*/


// Mostrar la imagen CAPTCHA
imagepng($image);
imagedestroy($image);


function generador($length) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $randomString;
}

?>