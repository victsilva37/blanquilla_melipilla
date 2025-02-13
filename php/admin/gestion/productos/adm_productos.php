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
    <link rel="stylesheet" href="css/banner.css">
  </head>
  <body>


  <!--SECCIÓN: FORMULARIO DE PRODUCTOS-->

    <form action="" method="post" id="form-productos">

        <!--Nombre del producto-->
        <label for="">Nombre del producto</label>
        <input type="text" name="nombre_producto" id="nombre_producto" class="form-control">
        <br>

        <!--Imagen del producto-->
        <label for="">Imagen del producto</label>
        <input type="file" name="imagen_producto" id="imagen_producto" class="form-control">
        <br>

        <!--Precio unitario-->
        <label for="">Precio unitario</label>
        <input type="number" name="precio_unitario" id="precio_unitario" class="form-control">
        <br>

        <!--Precio por mayor-->
        <label for="">Precio por mayor</label>
        <input type="number" name="precio_mayor" id="precio_mayor" class="form-control">
        <br>

        <label for="">Producto disponible</label>
        <input type="checkbox" name="producto_disponible" id="producto_disponible">
        <br>

        <button type="reset" class="btn btn-danger">Reestablecer</button>
        <button type="submit" class="btn btn-primary">Guardar</button>

    </form>

    <small></small>
    
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