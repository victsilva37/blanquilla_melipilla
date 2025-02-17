<!--
- Envases y Troquelados: BLANQUITA MELIPILLA
- Sitio web: https://www.blanquita_melipilla.com
- Desarrollador: DeV37
--->

<!--------------------------------------------------------------------------------------
  ---------------------------Inicio adm_productos .PHP----------------------------------
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
    <link rel="stylesheet" href="css/admin/gestion/productos/agregar_productos.css">

  </head>
  <body>


    <!--**Estructura del componente PHP**-->

      <form action="" method="post" id="form-productos" enctype="multipart/form-data">

          <!--Campo: NOMBRE DEL PRODUCTO-->
          <label for="">Nombre del producto</label>
          <input type="text" name="nombre_producto" id="nombre_producto" class="form-control">
          <small id="nameError" class="text-danger"></small>
          <br>
          <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST'){
              $nombre_producto = $mysqli->real_escape_string($_POST['nombre_producto']);
            }
          ?>

          <!--Campo: IMAGEN DEL PRODUCTO-->
          <label for="">Imagen del producto</label>
          <input type="file" name="imagen_producto" id="imagen_producto" class="form-control" required accept=".jpg, .jpeg, .png">
          <small id="imageError" class="text-danger"></small>
          <br>
          <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST'){
              // Manejo de subida de imagen
              $imagen_producto = "";
              if (isset($_FILES['imagen_producto']) && $_FILES['imagen_producto']['error'] === UPLOAD_ERR_OK) {
                //Carpeta donde se guardarán las imágenes
                  $target_dir = "img/"; 
                  if (!is_dir($target_dir)) {
                    //Crear la carpeta si no existe
                      mkdir($target_dir, 0777, true); 
                  }
                  $imagen_producto = $target_dir . basename($_FILES['imagen_producto']['name']);
                  if (!move_uploaded_file($_FILES['imagen_producto']['tmp_name'], $imagen_producto)) {
                      die("Error al subir la imagen.");
                  }
              }
            }
          ?>

          <!--Campo: PRECIO UNITARIO-->
          <label for="">Precio unitario</label>
          <input type="number" name="precio_unitario" id="precio_unitario" class="form-control">
          <small id="unitPriceError" class="text-danger"></small>
          <br>
          <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST'){
              $precio_unitario = intval($_POST['precio_unitario']);
            }
          ?>

          <!--Campo: PRECIO POR MAYOR-->
          <label for="">Precio por mayor</label>
          <input type="number" name="precio_mayor" id="precio_mayor" class="form-control">
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
            <input type="checkbox" name="producto_disponible" id="producto_disponible">
            <br><br>
            <?php
              if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                $producto_disponible = isset($_POST['producto_disponible']) ? 1 : 0;
              }
            ?>
          </div>
          
          <!--SECCIÓN: BOTONES-->
          <div class="botones">
              <!--Botón: REESTABLECER-->
              <button type="reset" class="btn btn-danger">Reestablecer</button>
              <br><br>
              <?php
                //Sin contenido
              ?>

              <!--Botón: GUARDAR-->
              <button type="submit" class="btn btn-primary">Guardar</button>
              <?php
                //Verificar si el formulario fue enviado
                if ($_SERVER["REQUEST_METHOD"] === "POST") {
                    //Insertar datos en la base de datos
                    $sql = "INSERT INTO productos (nombre_producto, imagen_producto, precio_unitario, precio_mayor, producto_disponible)
                            VALUES ('$nombre_producto', '$imagen_producto', $precio_unitario, $precio_mayor, $producto_disponible)";
                    if ($mysqli->query($sql) === TRUE) {
                        echo "Producto registrado correctamente.";
                    } else {
                        echo "Error al registrar el producto: " . $conn->error;
                    }
                }
              ?>
          </div>

        

      </form>

    
    <!--Link archivo JS-->
    <script src="js/admin/gestion/productos/agregar_productos.js"></script>


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

<!--------------------------------------------------------------------------------------
  ------------------------------Fin Productos .PHP--------------------------------------
  -------------------------------------------------------------------------------------->

<!--
- Envases y Troquelados: BLANQUITA MELIPILLA
- Sitio web: https://www.blanquita_melipilla.com
- Desarrollador: DeV37
--->