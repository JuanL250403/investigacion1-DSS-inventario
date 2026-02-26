<?php

class Producto
{
    private $id;
    private $nombre;
    private $descripcion;
    private $precio;
    private $stock;
    private $categoria;

    function __construct($id = null, $nombre = null, $descripcion = null, $precio = null, $stock = null, $categoria = null)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->precio = $precio;
        $this->stock = $stock;
        $this->categoria = $categoria;
    }

    public function setId($id)
    {
        if (!$id) {
            return "id no puede ser nulo";
        }

        if (!is_numeric($id)) {
            return "id no pueden ser letras";
        }
        $this->id = $id;
    }

    public function setNombre($nombre)
    {
        if (!$nombre) {
            return "nombre no puede ser nulo";
        }

        if (is_numeric($nombre)) {
            return "el nombre no puede ser numerico";
        }
        $this->nombre = $nombre;
    }

    public function setDescripcion($descripcion)
    {
        if (!$descripcion) {
            return "descripcion no puede ser nula";
        }

        if (is_numeric($descripcion)) {
            return "la descripcion no puede ser numerica";
        }
        $this->descripcion = $descripcion;
    }

    public function setPrecio($precio)
    {
        if (!$precio) {
            return "precio no puede ser nulo";
        }

        if (!is_numeric($precio)) {
            return "precio debe ser numerico";
        }

        if ($precio <= 0) {
            return "precio no puede ser cero o negativo";
        }
        $this->precio = $precio;
    }

    public function setStock($stock)
    {
        if (!$stock) {
            return "stock no puede ser nulo";
        }

        if (!is_numeric($stock)) {
            return "stock debe ser numerico";
        }

        if(is_double($stock)){
            return "stock no puede ser decimal";
        }

        if ($stock <= 0) {
            return "stock no puede ser cero o negativo";
        }
        $this->stock = $stock;
    }

    public function setCategoria($categoria)
    {
        if (!$categoria) {
            return "categoria no puede ser nula";
        }
        $this->categoria = $categoria;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function getPrecio()
    {
        return $this->precio;
    }

    public function getStock()
    {
        return $this->stock;
    }

    public function getCategoria()
    {
        return $this->categoria;
    }

    public function asignarStockdVenta($stockVenta)
    {
        $this->stock -= $stockVenta;
    }
}
