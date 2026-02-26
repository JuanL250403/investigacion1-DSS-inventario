<?php

class Venta {
    private $producto;
    private $cantidad;
    private $subTotal;
    private $porcentajeIVA;
    private $iva;
    private $total;

    public function __construct($producto = null, $cantidad = null, $subTotal = null, $porcentajeIVA = null, $iva = null, $total = null) {
        $this->producto = $producto;
        $this->cantidad = $cantidad;
        $this->subTotal = $subTotal;
        $this->porcentajeIVA = $porcentajeIVA;
        $this->iva = $iva;
        $this->total = $total;
    }

    public function getProducto(){
        return $this->producto;
    }
    public function getCantidad(){
        return $this->cantidad;
    }
    public function getsubTotal(){
        return $this->subTotal;
    }
    public function getPorcentajeIVA(){
        return $this->porcentajeIVA;
    }
    public function getIva(){
        return $this->iva;
    }
    public function getTotal(){
        return $this->total;
    }


    public function setProducto($producto){
        $this->producto = $producto;
    }
    public function setCantidad($cantidad){
        if(!$cantidad){
            return "cantidad no puede ser nula";
        }

        if(!is_numeric($cantidad)){
            return "cantidad debe ser numerica";
        }

        if(is_double($cantidad)){
            return "cantidad no puede ser decimal";
        }
        $this->cantidad = $cantidad;
    }
    public function setsubTotal($subTotal){
        $this->subTotal = $subTotal;
    }
    public function setPorcentajeIVA($porcentajeIVA){
        $this->porcentajeIVA = $porcentajeIVA;
    }
    public function setIva($iva){
        $this->iva = $iva;
    }
    public function setTotal($total){
        $this->total = $total;
    }
}