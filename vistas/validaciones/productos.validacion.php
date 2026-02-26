<?php
function validarId(&$producto, &$hayPost, &$id)
{
    if (!$hayPost) {
        return;
    }

    $validacion = $producto->setId($id);

    if ($validacion) {
        return $validacion;
    }
}

function validarNombre(&$producto, &$hayPost, &$nombre)
{
    if (!$hayPost) {
        return;
    }

    $validacion = $producto->setNombre($nombre);
    if ($validacion) {
        return $validacion;
    }
}

function validarDescripcion(&$producto, &$hayPost, &$descripcion)
{
    if (!$hayPost) {
        return;
    }


    $validacion = $producto->setDescripcion($descripcion);
    if ($validacion) {
        return $validacion;
    }
}

function validarPrecio(&$producto, &$hayPost, &$precio)
{
    if (!$hayPost) {
        return;
    }


    $validacion = $producto->setPrecio($precio);
    if ($validacion) {
        return $validacion;
    }
}

function validarStock(&$producto, &$hayPost, &$stock)
{
    if (!$hayPost) {
        return;
    }


    $validacion = $producto->setStock($stock);
    if ($validacion) {
        return $validacion;
    }
}
