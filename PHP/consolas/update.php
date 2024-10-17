<?php 
    $contrasena = "";
    $usuario = "root";
    $nombre_base_de_datos = "tarea2bd";

    try {
        $conn = new PDO('mysql:host=localhost;dbname=' . $nombre_base_de_datos, $usuario, $contrasena, 
        array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    } catch(PDOException $e) {
        die("Conexión fallida: " . $e->getMessage());
    }

    if(!isset($_GET['id'])){
        header("Location: read.php?mensaje=error");
    }

    $id = $_GET['id'];
    
    $stmt = $conn->prepare("SELECT * FROM consolas WHERE id_consola = ?");
    $stmt->execute([$id]);
    $consola = $stmt->fetch(PDO::FETCH_OBJ);
    

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
        <form class="p-4" method="POST" action="updateV2.php">
            <div>
                <label class="form-label">Nombre:</label>
                <input type="text" class="form-control" name="nombre" autofocus required value="<?php echo $consola->nombre ?>">
            </div>    
            <div>
                <label class="form-label">Marca:</label>
                <input type="text" class="form-control" name="marca" autofocus required value="<?php echo $consola->marca ?>">
            </div>
            <div>
                <label class="form-label">Formato:</label>
                <select class="form-select" name="formato" autofocus required value="<?php echo $consola->formato ?>">
                    <option value="sobremesa">Sobremesa</option>
                    <option value="portatil">Portátil</option>
                </select>
            </div>
            <div>
                <label class="form-label">Número de Controles:</label>
                <input type="number" class="form-control" name="num_controles" autofocus required value="<?php echo $consola->num_controles ?>">
            </div>
            <div>
                <label class="form-label">Unidades Disponibles:</label>
                <input type="number" class="form-control" name="unidades_disponibles" autofocus required value="<?php echo $consola->unidades_disponibles ?>">
            </div>
            <div>
                <label class="form-label">Foto:</label>
                <input type="text" class="form-control" name="foto" autofocus required value="<?php echo $consola->foto ?>"> 
            </div>
            <div>
                <label class="form-label">Precio:</label>
                <input type="number" step="100" class="form-control" name="precio" autofocus required value="<?php echo $consola->precio ?>">
            </div>
            <div>
                <input type="hidden" name="id" value="<?php echo $id?>">
            </div>
            <input type="submit" class="btn btn-primary" value="Editar">
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