<?php 

include "../includes.php"; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $marca = $_POST['marca'];
    $formato = $_POST['formato'];
    $num_controles = $_POST['num_controles'];
    $unidades_disponibles = $_POST['unidades_disponibles'];
    $precio = $_POST['precio'];
    $foto = $_FILES['foto'];

    if ($foto['error'] == UPLOAD_ERR_OK) {
        $fotoData = file_get_contents($foto['tmp_name']);

        $stmt = $conn->prepare("INSERT INTO consolas (nombre, marca, formato, num_controles, unidades_disponibles, foto, precio) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssiisi", $nombre, $marca, $formato, $num_controles, $unidades_disponibles, $fotoData, $precio);        

        if ($stmt->execute()) {
            echo "Consola añadida correctamente";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error al subir el archivo.";
    }

    $conn->close();
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
        <form action="add.php" method="post" enctype="multipart/form-data">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" required><br>
            <label for="marca">Marca:</label>
            <input type="text" name="marca" id="marca" required><br>
            <label for="formato">Formato:</label>
            <select name="formato" id="formato" required>
                <option value="sobremesa">Sobremesa</option>
                <option value="portatil">Portátil</option>
            </select><br>
            <label for="num_controles">Número de Controles:</label>
            <input type="number" name="num_controles" id="num_controles" required><br>
            <label for="unidades_disponibles">Unidades Disponibles:</label>
            <input type="number" name="unidades_disponibles" id="unidades_disponibles" required><br>
            <label for="foto">Foto:</label>
            <input type="file" name="foto" id="foto" required><br>
            <label for="precio">Precio:</label>
            <input type="number" step="0.01" name="precio" id="precio" required><br>
            <button type="submit">Agregar</button>
        </form>
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
        height: 100vh;
        margin: 0;
    }

    form {
        display: grid;
        gap: 1rem;
    }

    label {
        font-weight: bold;
    }

    input, select {
        padding: 0.5rem;
        border-radius: 0.25rem;
        border: 1px solid #ccc;
    }

    button {
        padding: 0.5rem 1rem;
        border: none;
        border-radius: 0.25rem;
        background-color: blue;
        color: white;
        font-weight: bold;
        cursor: pointer;
    }

</style>