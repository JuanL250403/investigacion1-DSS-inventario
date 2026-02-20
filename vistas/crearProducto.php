<?php
require_once('../controladores/producto.controlador.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<?php
include('navbar.inc.php')
?>

<body>

    <?php
    if (isset($_POST["crear"])):
        $id = isset($_POST['id']) ? $_POST['id'] : 0;
        $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : "";
        $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : "";
        $precio = isset($_POST['precio']) ? $_POST['precio'] : 0;
        $stock = isset($_POST['stock']) ? $_POST['stock'] : 0;
        $categoria = isset($_POST['categoria']) ? $_POST['categoria'] : 0;

        $producto = new Producto($id, $nombre, $descripcion, $precio, $stock, $categoria);

        $respuesta = crearProducto($producto);
        
    ?>
        <h1><?= $respuesta ?></h1>
    <?php 
    endif
    ?>

    <form action=<?= $_SERVER['PHP_SELF'] ?> method="POST">
        <input type="text" name="id">
        <input type="text" name="nombre">
        <input type="text" name="descripcion">
        <input type="numeric" name="precio">
        <input type="numeric" name="stock">
        <select name="categoria" id="">
            <option value="frutas">frutas</option>
            <option value="limpieza">limpieza</option>
        </select>
        <input type="submit" name="crear">
    </form>
</body>

</html>