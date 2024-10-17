<?php 

include "../includes.php"; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(empty($_POST['nombre']) || empty($_POST['marca']) || empty($_POST['formato']) || empty($_POST['num_controles']) || empty($_POST['unidades_disponibles']) || empty($_POST['precio']) || empty($_POST['foto'])) {
        header("Location: read.php?mensaje=falta");
        exit();
    }

    $nombre = $_POST['nombre'];
    $marca = $_POST['marca'];
    $formato = $_POST['formato'];
    $num_controles = $_POST['num_controles'];
    $unidades_disponibles = $_POST['unidades_disponibles'];
    $precio = $_POST['precio'];
    $foto = $_POST['foto'];

    $sql = $conn->prepare("INSERT INTO consolas(nombre, marca, formato, num_controles, unidades_disponibles, precio, foto) VALUES (?,?,?,?,?,?,?);");
    $resultado = $sql->execute([$nombre, $marca, $formato, $num_controles, $unidades_disponibles, $precio, $foto]);

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
    <title>Adición de Consolas</title>
    <link rel="stylesheet" href="../../CSS/styles.css">
</head>
<body class="fondo">
    <div class="tarjeta">
        <h1>Agregar Consola</h1>
        <form class="p-4" method="POST" action="add.php">
            <div>
                <label class="form-label">Nombre:</label>
                <input type="text" class="form-control" name="nombre" autofocus required>
            </div>    
            <div>
                <label class="form-label">Marca:</label>
                <input type="text" class="form-control" name="marca" autofocus required>
            </div>
            <div>
                <label class="form-label">Formato:</label>
                <select class="form-select" name="formato" autofocus required>
                    <option value="sobremesa">Sobremesa</option>
                    <option value="portatil">Portátil</option>
                </select>
            </div>
            <div>
                <label class="form-label">Número de Controles:</label>
                <input type="number" class="form-control" name="num_controles" autofocus required>
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