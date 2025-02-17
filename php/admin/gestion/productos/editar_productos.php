<!--
- Envases y Troquelados: BLANQUITA MELIPILLA
- Sitio web: https://www.blanquita_melipilla.com
- Desarrollador: DeV37
--->

<!--------------------------------------------------------------------------------------
  ---------------------------Inicio editar_productos .PHP-------------------------------
  -------------------------------------------------------------------------------------->

<!----------------------------
  -----Inicio Conexión BD-----
  ---------------------------->
  <?php 
    $mysqli = new mysqli('localhost', 'root', '', 'blanquita_melipilla');
  ?>
<!----------------------------
  ----- Fin Conexión BD  -----
  ---------------------------->


<!-------------------
  ---Inicio LÓGICA---
  ------------------->

  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--Link archivo CSS-->
    <link rel="stylesheet" href="css/admin/gestion/productos/editar_productos.css">

  </head>
  <body>


    <!--**Estructura del componente PHP**-->

    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Link archivo CSS-->
    <link rel="stylesheet" href="css/admin/gestion/productos/editar_productos.css">
</head>
<body>

    <?php
        // Verificar si el parámetro id_producto está en la URL
        if (isset($_GET['id_producto'])) {
            $id_producto = $_GET['id_producto'];

            // Obtener los datos del producto
            $sql = "SELECT * FROM productos WHERE id_producto = $id_producto";
            $result = $mysqli->query($sql);

            if ($result->num_rows > 0) {
                $producto = $result->fetch_assoc();
            } else {
                echo "Producto no encontrado.";
                exit;
            }
        } else {
            // echo "No se proporcionó el ID del producto.";
            exit;
        }
    ?>

    <form action="editar_productos.php?id_producto=<?php echo $id_producto; ?>" method="post" id="form-productos" enctype="multipart/form-data">

        <!--Campo: NOMBRE DEL PRODUCTO-->
        <label for="">Nombre del producto</label>
        <input type="text" name="nombre_producto" id="nombre_producto" class="form-control" value="<?php echo htmlspecialchars($producto['nombre_producto']); ?>">
        <small id="nameError" class="text-danger"></small>
        <br>
        <?php
            // Procesar el formulario de edición
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Recibir los datos del formulario
                $nombre_producto = $mysqli->real_escape_string($_POST['nombre_producto']);

            }
        ?>

        <!--Campo: IMAGEN DEL PRODUCTO-->
        <label for="">Imagen del producto</label>
        <input type="file" name="imagen_producto" id="imagen_producto" class="form-control" accept=".jpg, .jpeg, .png">
        <small id="imageError" class="text-danger"></small>
        <br>
        <?php
            // Procesar el formulario de edición
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Manejo de la imagen (si se ha subido una nueva)
                if (isset($_FILES['imagen_producto']) && $_FILES['imagen_producto']['error'] === UPLOAD_ERR_OK) {
                    $target_dir = "../../../img/";  // Ruta para las imágenes
                    if (!is_dir($target_dir)) {
                        mkdir($target_dir, 0777, true);  // Crear la carpeta si no existe
                    }
                    $imagen_producto = $target_dir . basename($_FILES['imagen_producto']['name']);
                    if (!move_uploaded_file($_FILES['imagen_producto']['tmp_name'], $imagen_producto)) {
                        die("Error al subir la imagen.");
                    }
                } else {
                    // Si no se ha subido una nueva imagen, mantener la imagen existente
                    $imagen_producto = $producto['imagen_producto'];  // Usa la imagen previa si no se sube una nueva
                }
            }
        ?>

        <!--Campo: PRECIO UNITARIO-->
        <label for="">Precio unitario</label>
        <input type="number" name="precio_unitario" id="precio_unitario" class="form-control" value="<?php echo htmlspecialchars($producto['precio_unitario']); ?>">
        <small id="unitPriceError" class="text-danger"></small>
        <br>
        <?php
            // Procesar el formulario de edición
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Recibir los datos del formulario
                $precio_unitario = intval($_POST['precio_unitario']);
            }
        ?>

        <!--Campo: PRECIO POR MAYOR-->
        <label for="">Precio por mayor</label>
        <input type="number" name="precio_mayor" id="precio_mayor" class="form-control" value="<?php echo htmlspecialchars($producto['precio_mayor']); ?>">
        <small id="bulkPriceError" class="text-danger"></small>
        <br>
        <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                $precio_mayor = intval($_POST['precio_mayor']);
            }
        ?>

        <!--Campo: PRODUCTO DISPONIBLE-->
        <div class="check_producto">
            <label for="" id="lbl_prod_disponible">Producto disponible</label>
            <input type="checkbox" name="producto_disponible" id="producto_disponible" <?php echo $producto['producto_disponible'] ? 'checked' : ''; ?>>
            <br>
            <?php
                if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                    $producto_disponible = $producto_disponible = isset($_POST['producto_disponible']) ? 1 : 0;
                }
            ?>
        </div>

        <!--SECCIÓN: BOTONES-->
        <div class="botones">
            <!--Botón: REESTABLECER-->
            <button type="reset" class="btn btn-danger">Reestablecer</button>
            <br><br>

            <!--Botón: GUARDAR-->
            <button type="submit" class="btn btn-primary">Guardar</button>
            <?php
                // Procesar el formulario de edición
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                
                    // Actualizar el producto en la base de datos
                    $sqlUpdate = "UPDATE productos SET
                        nombre_producto = '$nombre_producto',
                        imagen_producto = '$imagen_producto',
                        precio_unitario = $precio_unitario,
                        precio_mayor = $precio_mayor,
                        producto_disponible = $producto_disponible
                        WHERE id_producto = $id_producto";

                    if ($mysqli->query($sqlUpdate) === TRUE) {
                        // Redirigir inmediatamente después de la actualización exitosa
                        header("Location: http://localhost/blanquilla_melipilla/admin_main.php?opcion=gestion-productos");
                        exit();  // Asegúrate de llamar exit() para detener la ejecución del script
                    } else {
                        echo "Error al actualizar el producto: " . $mysqli->error;
                    }
                }

            ?>
        </div>
    </form>

    <!--Link archivo JS-->
    <script src="js/admin/gestion/productos/editar_productos.js"></script>


  </body>
  </html>

<!-------------------
  --- Fin LÓGICA  ---
  ------------------->


<!-----------------------------------
  -----Inicio Cierre Conexión BD-----
  ----------------------------------->
  <?php 
    $mysqli -> close();
  ?>
<!-----------------------------------
  ----- Fin Cierre Conexión BD  -----
  ----------------------------------->

<!---------------------------------------------------------------------------------------------
  ------------------------------Fin editar_productos .PHP--------------------------------------
  --------------------------------------------------------------------------------------------->

<!--
- Envases y Troquelados: BLANQUITA MELIPILLA
- Sitio web: https://www.blanquita_melipilla.com
- Desarrollador: DeV37
--->