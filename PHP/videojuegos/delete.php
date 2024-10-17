<?php
    if(!isset($_GET['id'])){
        header('Location: read.php?mensaje=error');
    }

    include "../includes.php";

    $id = $_GET['id'];

    $sql = $conn -> prepare("DELETE FROM videojuegos WHERE id_videojuego = ?");
    $resultado = $sql -> execute([$id]);

    if($resultado === TRUE){
        header('Location: read.php?mensaje=eliminado');
    }else{
        header('Location: read.php?mensaje=error');
    }
