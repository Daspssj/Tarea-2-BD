<?php
    include "../includes.php";

    if (!isset($_POST['id'])){
        header("Location: read.php?mensaje=error");
    }

    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $clasificacion = $_POST['clasificacion'];
    $calificacion = $_POST['calificacion'];
    $unidades_disponibles = $_POST['unidades_disponibles'];
    $foto = $_POST['foto'];
    $precio = $_POST['precio'];

    $sql = $conn ->prepare("UPDATE videojuegos SET nombre = ?, descripcion = ?, clasificacion = ?, calificacion = ?, unidades_disponibles = ?, foto = ?, precio = ? WHERE id_videojuego = ?;");
    $resultado1 = $sql->execute([$nombre, $descripcion, $clasificacion, $calificacion, $unidades_disponibles, $foto, $precio, $id]);

    if ($resultado1 === TRUE) {
        header("Location: read.php?mensaje=actualizado");
    } else {
        header("Location: read.php?mensaje=error");
    }
