<?php 

include "../includes.php"; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(empty($_POST['nombre']) || empty($_POST['descripcion']) || empty($_POST['clasificacion']) || empty($_POST['calificacion']) || empty($_POST['unidades_disponibles']) || empty($_POST['precio']) || empty($_POST['foto'])) {
        header("Location: read.php?mensaje=falta");
        exit();
    }

    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $clasificacion = $_POST['clasificacion'];
    $calificacion = $_POST['calificacion'];
    $unidades_disponibles = $_POST['unidades_disponibles'];
    $precio = $_POST['precio'];
    $foto = $_POST['foto'];

    $sql = $conn->prepare("INSERT INTO videojuegos(nombre, descripcion, clasificacion, calificacion, unidades_disponibles, precio, foto) VALUES (?,?,?,?,?,?,?);");
    $resultado = $sql->execute([$nombre, $descripcion, $clasificacion, $calificacion, $unidades_disponibles, $precio, $foto]);

    if ($resultado === TRUE) {  
        header("Location: read.php?mensaje=agregado");
    } else {
        header("Location: read.php?mensaje=error");
    }
    exit();
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adición de Videojuegos</title>
    <link rel="stylesheet" href="../../CSS/styles.css">
</head>
<body class="fondo">
    <div class="tarjeta">
        <h1>Agregar Videojuego</h1>
        <form class="p-4" method="POST" action="add.php">
            <div>
                <label class="form-label">Nombre:</label>
                <input type="text" class="form-control" name="nombre" autofocus required>
            </div>    
            <div>
                <label class="form-label">Descripcion:</label>
                <input type="text" class="form-control" name="descripcion" autofocus required>
            </div>
            <div>
                <label class="form-label">Clasificacion:</label>
                <select class="form-select" name="clasificacion" autofocus required>
                    <option value="RP">RP</option>
                    <option value="E">E</option>
                    <option value="E10+">E10+</option>
                    <option value="T">T</option>
                    <option value="M">M</option>
                    <option value="A">A</option>
                </select>
            </div>
            <div>
                <label class="form-label">Calificacion:</label>
                <select class="form-select" name="calificacion" autofocus required>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </div>
            <div>
                <label class="form-label">Unidades Disponibles:</label>
                <input type="number" class="form-control" name="unidades_disponibles" autofocus required>
            </div>
            <div>
                <label class="form-label">Foto:</label>
                <input type="text" class="form-control" name="foto" autofocus required> 
            </div>
            <div>
                <label class="form-label">Precio:</label>
                <input type="number" step="100" class="form-control" name="precio" autofocus required>
            </div>
            <input type="submit" class="btn btn-primary" value="Agregar">
        </form>
        <button type="button" class="btn btn-primary regresar-btn">
            <a href="read.php">Regresar</a>
    </div>
</body>
</html>

<style>
    h1 {
        color: red;
    }
    body {
        display: grid;
        place-content: center;
    }
    .tarjeta {
        background-color: white;
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        width: 400px;
    }
    .fondo {
        background-color: #f0f0f0;
    }
    .regresar-btn {
        margin-top: 10px;
    }
    .form-control {
        padding: 0.5rem;
        border-radius: 0.25rem;
        border: 1px solid #ccc;
        width: 100%;
    }
    .form-select {
        padding: 0.5rem;
        border-radius: 0.25rem;
        border: 1px solid #ccc;
        width: 100%;
    }
    .btn {
        padding: 0.5rem 1rem;
        border: none;
        border-radius: 0.25rem;
        background-color: blue;
        color: white;
        font-weight: bold;
        cursor: pointer;
    }
    .btn-primary {
        background-color: blue;
    }
    .regresar-btn a {
        color: white;
        text-decoration: none;
    }
</style>