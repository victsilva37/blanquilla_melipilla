<!--
- Envases y Troquelados: BLANQUITA MELIPILLA
- Sitio web: https://www.blanquita_melipilla.com
- Desarrollador: DeV37
--->

<!--------------------------------------------------------------------------------------
  ---------------------------Inicio Catalogo .PHP---------------------------------------
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
    <link rel="stylesheet" href="css/catalogo.css">
  </head>

  <body>

    <!--**Estructura del componente PHP**-->

            <?php
              // Consultar productos
              $stmt = $mysqli->prepare("SELECT * FROM productos");
              $stmt->execute();
              $result = $stmt->get_result();
              // Mostrar productos
              while ($row = $result->fetch_assoc()):
                $disponibilidad = $row["producto_disponible"] ? "Producto Disponible" : "No Disponible";
            ?>

            <div class="catalogo">

                <div class="card" id="producto-container">

                    <!--Nombre del producto-->
                    <h5 class="card-title"><?=htmlspecialchars($row["nombre_producto"])?></h5>

                    <!--Imagen del producto-->
                    <img src="<?= htmlspecialchars($row["imagen_producto"]) ?>" class="card-img-top" alt="...">

                    <!--Precio unitario-->
                    <p class="card-text" id="precio-unitario"><strong><?= htmlspecialchars($row["precio_unitario"])?></strong> c/u</p>

                    <!--Precio por mayor-->
                    <p class="card-text" id="precio-x-mayor">Precio por mayor: <strong>$<?= htmlspecialchars($row["precio_mayor"])?></strong></p>

                    <!--Disponibilidad-->
                    <strong style="color: <?= $row["producto_disponible"] ? 'green' : 'red' ?>;">
                      <?= htmlspecialchars($disponibilidad) ?>
                    </strong>

                </div>
            </div>

            <?php
              endwhile;
              // Cerrar conexión
              $stmt->close();
            ?>

    <!--**Link archivo JS**-->
        <script src=""></script>

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
  ------------------------------Fin Catalogo .PHP---------------------------------------
  -------------------------------------------------------------------------------------->

<!--
- Envases y Troquelados: BLANQUITA MELIPILLA
- Sitio web: https://www.blanquita_melipilla.com
- Desarrollador: DeV37
--->