<?php
$productos = array(
    new Producto(1, 'Manzanas', 'Dulces y saludables', 2.50, 190, 'frutas'),
    new Producto(2, 'Peras', 'Jugosas y frescas', 2.30, 150, 'frutas'),
    new Producto(3, 'Fresas', 'Ideales para postres', 3.00, 120, 'frutas'),

    new Producto(4, 'Detergente', 'Para ropa blanca y de color', 5.75, 80, 'limpieza'),
    new Producto(5, 'Cloro', 'Desinfectante multiusos', 1.80, 200, 'limpieza'),
    new Producto(6, 'Jabón líquido', 'Para manos antibacterial', 2.25, 140, 'limpieza'),

    new Producto(7, 'Leche', 'Entera y nutritiva', 1.50, 300, 'lacteos'),
    new Producto(8, 'Queso', 'Queso fresco artesanal', 4.00, 90, 'lacteos'),
    new Producto(9, 'Yogur', 'Natural sin azúcar', 0.90, 250, 'lacteos'),

    new Producto(10, 'Pan francés', 'Recién horneado', 0.25, 500, 'panaderia'),
    new Producto(11, 'Pan integral', 'Rico en fibra', 1.20, 180, 'panaderia'),
    new Producto(12, 'Croissant', 'Hojaldre mantequillado', 1.75, 75, 'panaderia'),

    new Producto(13, 'Refresco cola', 'Bebida gaseosa 2L', 1.25, 220, 'bebidas'),
    new Producto(14, 'Jugo de naranja', 'Natural sin conservantes', 2.10, 130, 'bebidas'),
    new Producto(15, 'Agua mineral', 'Botella 600ml', 0.60, 400, 'bebidas')
);

$ventas = array(
    new Venta('Manzanas', 12, 34.00, 13, 4.42, 38.42),

    new Venta('Peras', 8, 20.00, 13, 2.60, 22.60),
    new Venta('Fresas', 5, 15.00, 13, 1.95, 16.95),

    new Venta('Detergente', 3, 17.25, 13, 2.24, 19.49),
    new Venta('Cloro', 10, 18.00, 13, 2.34, 20.34),

    new Venta('Leche', 20, 30.00, 13, 3.90, 33.90),
    new Venta('Queso', 4, 16.00, 13, 2.08, 18.08),

    new Venta('Pan francés', 50, 12.50, 13, 1.63, 14.13),
    new Venta('Pan integral', 6, 7.20, 13, 0.94, 8.14),

    new Venta('Refresco cola', 7, 8.75, 13, 1.14, 9.89),
    new Venta('Jugo de naranja', 9, 18.90, 13, 2.46, 21.36),

    new Venta('Agua mineral', 25, 15.00, 13, 1.95, 16.95)
);

session_start();
if (!isset($_SESSION["productos"])) {
    $_SESSION["productos"] = $productos;
    $_SESSION["ventas"] = $ventas;
}
session_write_close();
