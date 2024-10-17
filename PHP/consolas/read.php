<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Consolas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<div>
    <h1>Lista de Consolas</h1>


    <?php 
        if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'falta'){
    ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Error!</strong> Rellena todos los campos.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php 
        }
    ?>

    <?php 
        if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'agregado'){
    ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Éxito!</strong> Consola agregada correctamente.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php 
        }
    ?>

    <?php 
        if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'error'){
    ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Error!</strong>.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php 
        }
    ?>

    <?php 
        if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'actualizado'){
    ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Éxito!</strong> Consola actualizada correctamente.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php 
        }
    ?>


</div>
<body>
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
            $foto = str_replace('C:\\xampp\\htdocs\\', '/', $row['foto']);
            echo "<tr>
                    <td>{$row['id_consola']}</td>
                    <td>{$row['nombre']}</td>
                    <td>{$row['marca']}</td>
                    <td>{$row['formato']}</td>
                    <td>{$row['num_controles']}</td>
                    <td>{$row['unidades_disponibles']}</td>
                    <td>{$row['precio']}</td>";
            echo "<td><img src='{$foto}' width='100' height='100'></td>";
            echo "<td>
                        <a href='update.php?id={$row['id_consola']}'><i class='bi bi-pencil-square'></i></a> 
                        <a href='delete.php?id={$row['id_consola']}'><i class='bi bi-trash'></i></a>
                    </td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "No existe ningún registro en la base de datos sobre consolas.";
    }

    $conn->close();

    echo "<button onclick=\"window.location.href='add.php'\">Añadir Nueva Consola</button>";
    ?>
</body>
<div>
    <button onclick="window.location.href='../principal.php'">Pagina principal</button>
</div>
</html>