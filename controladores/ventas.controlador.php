<?php
require_once('../modelos/producto.class.php');

function realizarVenta($idProducto, $cantidadVenta)
{
    session_start();

    $productos = $_SESSION['productos'];

    foreach ($productos as $producto) {
        if ($producto->getId() == $idProducto) {
            if($producto->getStock() < $cantidadVenta){
                return 'cantidad de producto insuficiente';
            }
            $nuevaCantidad = $producto->getStock() - $cantidadVenta;
            $producto->setStock($nuevaCantidad);
        }
    }

    $_SESSION["productos"] = $productos;

    session_commit();

    return 'venta realizada';
}
