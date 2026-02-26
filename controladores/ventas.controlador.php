<?php
require_once('../modelos/producto.class.php');
require_once('../modelos/venta.class.php');
function obtenerVentas()
{
    session_start();
    $ventas = $_SESSION["ventas"];
    session_commit();

    return $ventas;
}

function realizarVenta($idProducto, $venta)
{
    if (!$idProducto) {
        return "id de producto no puede estar vacio";
    }

    if (!$venta->getCantidad()) {
        return "la cantidad a comprar no puede ser nula";
    } elseif ($venta->getCantidad() < 0) {
        return "la cantidad a comprar no puede ser negativa";
    } elseif (is_numeric($venta->getCantidad())){
        return "";
    }

    session_start();

    $productos = $_SESSION['productos'];

    $productoEncontrado = false;
    foreach ($productos as $producto) {
        if ($producto->getId() == $idProducto) {
            if ($producto->getStock() < $venta->getCantidad()) {
                return 'cantidad de producto insuficiente';
            }
            $productoEncontrado = true;

            $precio = $producto->getPrecio();
            $nombre = $producto->getNombre();

            $cantidadVenta = $venta->getCantidad();
            $producto->asignarStockdVenta($cantidadVenta);

            $subTotal = $precio * $venta->getCantidad();
            $porcentajeIva = 13;
            $iva = $subTotal * ($porcentajeIva / 100);
            $total = $subTotal - $iva;

            $venta->setProducto($nombre);
            $venta->setsubTotal($subTotal);
            $venta->setPorcentajeIVA(13);
            $venta->setIva($iva);
            $venta->setTotal($total);
        }
    }

    if(!$productoEncontrado){
        return "producto con $idProducto no existente";
    }

    $_SESSION["productos"] = $productos;
    array_push($_SESSION['ventas'], $venta);

    session_commit();

    return 'venta realizada';
}
