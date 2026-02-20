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

    session_start();
    $productos = $_SESSION["productos"];

    foreach ($productos as $indice => $producto) {
        if ($producto->getId() == $productoEditar->getId()) {
            $productos[$indice] = $productoEditar;
        }

        return "producto con id: $productoEditar->getId() actualizado";
    }

    $_SESSION["productos"] = $productos;
    session_commit();
}

function eliminarProducto($idProducto)
{
    session_start();

    $productos = $_SESSION["productos"];
    foreach ($productos as $indice => $producto) {
        if ($producto->getId() == $idProducto) {
            array_splice($productos, $indice, 1);
            $_SESSION["productos"] = $productos;
            return "producto con id: $idProducto eliminado";
        }
    }

    return "error al momento de eliminar producto";
    session_commit();
}
