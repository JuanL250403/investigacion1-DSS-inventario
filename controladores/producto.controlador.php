<?php
require_once('../modelos/producto.class.php');
function obtenerProductos()
{
    session_start();
    $productos = $_SESSION["productos"];
    session_commit();

    return $productos;
}

function obtenerProductoId($id)
{
    session_start();
    $productos = $_SESSION["productos"];
    session_commit();

    foreach ($productos as $producto) {
        if ($producto->getId() == $id) {
            return $producto;
        }
    }
}

function crearProducto($productoNuevo)
{
    if (!is_object($productoNuevo) && !$productoNuevo instanceof Producto)
        return 'datos no validos';

    if (!$productoNuevo->getId() || !$productoNuevo->getCategoria() || !$productoNuevo->getNombre() || !$productoNuevo->getPrecio() || !$productoNuevo->getStock()) {
        return "campos requeridos vacios";
    }

    if ($productoNuevo->getPrecio() < 0 || $productoNuevo->getStock() < 0) {
        return "campos numericos no pueden ser negativos";
    }

    if (!is_numeric($productoNuevo->getPrecio()) || !is_numeric($productoNuevo->getStock())) {
        return "campos numericos no pueden ser letras";
    }

    session_start();

    $productos = $_SESSION["productos"];

    foreach ($productos as $producto) {
        if ($producto->getId() == $productoNuevo->getId()) {
            return 'un producto con este id ya existe';
        }
    }

    array_push($_SESSION["productos"], $productoNuevo);
    session_commit();
    return 'producto agregado';
}

function actualizarProducto($productoEditar)
{
    if (!is_object($productoEditar) && !$productoEditar instanceof Producto)
        return 'datos no validos';

    if (!$productoEditar->getId() || !$productoEditar->getCategoria() || !$productoEditar->getNombre() || !$productoEditar->getPrecio() || !$productoEditar->getStock() || !$productoEditar->getDescripcion()) {
        return "campos requeridos vacios";
    }

    if ($productoEditar->getPrecio() < 0 || $productoEditar->getStock() < 0) {
        return "campos numericos no pueden ser negativos";
    }

    if (!is_numeric($productoEditar->getPrecio()) || !is_numeric($productoEditar->getStock())) {
        return "campos numericos no pueden ser letras";
    }


    session_start();
    $productos = $_SESSION["productos"];

    foreach ($productos as $indice => $producto) {
        if ($producto->getId() == $productoEditar->getId()) {
            $productos[$indice] = $productoEditar;
        }
    }

    $_SESSION["productos"] = $productos;
    session_commit();
    return "producto con id: " . $productoEditar->getId() . "actualizado";
}

function eliminarProducto($idProducto)
{
    session_start();

    $productos = $_SESSION["productos"];
    foreach ($productos as $indice => $producto) {
        if ($producto->getId() == $idProducto) {
            array_splice($productos, $indice, 1);
            $_SESSION["productos"] = $productos;
        }
    }

    return "producto con id: $idProducto eliminado";
    session_commit();
}
