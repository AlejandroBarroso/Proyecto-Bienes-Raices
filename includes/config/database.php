<?php
function conectarDB() : mysqli {

    $db = new mysqli('localhost', 'root', 'sr1715sa', 'bienesraices_crud');

     //$db->set_charset('utf8');
    
     if(!$db) {
        echo "Error no se pudo conectar";
        exit;
    }
    return $db;

   
}
