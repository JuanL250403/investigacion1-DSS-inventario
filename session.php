<?php
    $productos = array(
        new Producto(1, 'manzanas', 'dulces y saludables', 2.5, 190, 'frutas'),
        new Producto(2, 'peras', 'dulces y saludables', 2.5, 190, 'frutas'),
        new Producto(3, 'fresas', 'dulces y saludables', 2.5, 190, 'frutas'),
    );
    
    session_start();
    if(!isset($_SESSION["productos"])){
        $_SESSION["productos"] = $productos;
    }
    session_write_close();
?>
