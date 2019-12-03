<?php 
// Permite chave negativa 

require("class_cifra-de-cesar.php");

$texto = "Texto a criptar";

$ab = new CifraCesar(99);
$txt_encript = $ab->encripta("hoje eu!");

echo "Encriptado: ". $txt_encript .PHP_EOL ;

$txt_decript = $ab->decifra( $txt_encript );
echo "Decriptado: ". $txt_decript . PHP_EOL ;