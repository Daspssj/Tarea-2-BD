<?php
    include "../includes.php";

    if (!isset($_POST['id'])){
        header("Location: read.php?mensaje=error");
    }

    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $marca = $_POST['marca'];
    $formato = $_POST['formato'];
    $num_controles = $_POST['num_controles'];
    $unidades_disponibles = $_POST['unidades_disponibles'];
    $foto = $_POST['foto'];
    $precio = $_POST['precio'];

    $sql = $conn ->prepare("UPDATE consolas SET nombre = ?, marca = ?, formato = ?, num_controles = ?, unidades_disponibles = ?, foto = ?, precio = ? WHERE id_consola = ?;");
    $resultado1 = $sql->execute([$nombre, $marca, $formato, $num_controles, $unidades_disponibles, $foto, $precio, $id]);

    if ($resultado1 === TRUE) {  
        header("Location: read.php?mensaje=actualizado");
    } else {
        header("Location: read.php?mensaje=error");
    }
