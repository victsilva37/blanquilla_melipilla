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

              // Obtener término de búsqueda
            $searchQuery = isset($_GET['search']) ? $mysqli->real_escape_string($_GET['search']) : '';

            // Preparar la consulta
            if (!empty($searchQuery)) {
                $stmt = $mysqli->prepare("SELECT * FROM productos WHERE nombre_producto LIKE ?");
                $searchParam = "%" . $searchQuery . "%";
                $stmt->bind_param("s", $searchParam);
            } else {
                $stmt = $mysqli->prepare("SELECT * FROM productos");
            }

            $stmt->execute();
            $result = $stmt->get_result();

            // Verificar si es una solicitud AJAX
            if (isset($_GET['ajax'])) {
                $productos = [];
                while ($row = $result->fetch_assoc()) {
                    $productos[] = $row;
                }
                echo json_encode($productos);
                exit; // Termina la ejecución aquí para evitar cargar HTML
            }


            ?>

            <div class="catalogo">
                <?php
                // Verificar si hay resultados
                if ($result->num_rows > 0):
                    while ($row = $result->fetch_assoc()):
                        $disponibilidad = $row["producto_disponible"] ? "Producto Disponible" : "No Disponible";
                ?>

                <div class="card" id="producto-container">
                    <h5 class="card-title"><?=htmlspecialchars($row["nombre_producto"])?></h5>
                    <img src="<?= htmlspecialchars($row["imagen_producto"]) ?>" class="card-img-top" alt="...">
                    <p class="card-text" id="precio-unitario">$<strong><?= htmlspecialchars($row["precio_unitario"])?></strong> c/u</p>
                    <p class="card-text" id="precio-x-mayor">Precio por mayor: <strong>$<?= htmlspecialchars($row["precio_mayor"])?></strong></p>
                    <strong style="color: <?= $row["producto_disponible"] ? 'green' : 'red' ?>;">
                        <?= htmlspecialchars($disponibilidad) ?>
                    </strong>
                </div>

                <?php 
                    endwhile;
                else:
                    // Mostrar mensaje si no hay productos
                ?>
                <p>No se encontraron productos.</p>
                <?php endif; ?>
            </div>


            <?php 
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