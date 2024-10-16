<?php
include "../includes.php"; 

$sql = "SELECT id_consola, nombre, marca, formato, num_controles, unidades_disponibles, precio, foto FROM consolas";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='10'>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Marca</th>
                <th>Formato</th>
                <th>Número de Controles</th>
                <th>Unidades Disponibles</th>
                <th>Precio</th>
                <th>Foto</th>
                <th>Acciones</th>
            </tr>";
    while($row = $result->fetch_assoc()) {
        $foto = !empty($row['foto']) ? base64_encode($row['foto']) : '';
        $tipoImagen = 'image/jpg';
        echo "<tr>
                <td>{$row['id_consola']}</td>
                <td>{$row['nombre']}</td>
                <td>{$row['marca']}</td>
                <td>{$row['formato']}</td>
                <td>{$row['num_controles']}</td>
                <td>{$row['unidades_disponibles']}</td>
                <td>{$row['precio']}</td>";
        if ($foto) {
            echo "<td><img src='data:$tipoImagen;base64,$foto' width='100' height='100'></td>";
        } else {
            echo "<td>No hay imagen</td>";
        }
        echo "<td>
                    <a href='update.php?id={$row['id_consola']}'>Editar</a> |
                    <a href='delete.php?id={$row['id_consola']}'>Eliminar</a>
                </td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "No existe ningún registro en la base de datos sobre consolas.";
}

$conn->close();
