<!DOCTYPE html>
<html lang="en">

<?php
include('head.inc.php')
?>

<?php
include('navbar.inc.php');
?>

<body class="bg-light">

    <div class="container d-flex flex-column justify-content-center align-items-center"
        style="min-height: 70vh;">

        <h1 class="m-5">Productos</h1>

        <div class="w-100" style="max-width: 500px;">

            <div class="d-grid gap-4">

                <a href="listadoProductos.php"
                    class="btn btn-outline-primary py-4 fs-4 fw-semibold">
                    Listado de Productos
                </a>

                <a href="crearProducto.php"
                    class="btn btn-success py-4 fs-4 fw-semibold">
                    Agregar Producto
                </a>

            </div>

        </div>

    </div>

</body>

</html>