<!--
- Envases y Troquelados: BLANQUITA MELIPILLA
- Sitio web: https://www.blanquita_melipilla.com
- Desarrollador: DeV37
--->

<!--------------------------------------------------------------------------------------
  ---------------------------Inicio Adm_catalogo .PHP-----------------------------------
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
    <link rel="stylesheet" href="css/admin/inicio/ver_catalogo.css">
  </head>

  <body>

    <!--**Estructura del componente PHP**-->

      <!--SECCIÓN: CATÁLOGO-->

          <?php
            $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
            $itemsPerPage = 3; // Número de productos por página
            $offset = ($page - 1) * $itemsPerPage;

              // Obtener término de búsqueda
            $searchQuery = isset($_GET['search']) ? $mysqli->real_escape_string($_GET['search']) : '';

            // Preparar la consulta con paginación
            if (!empty($searchQuery)) {
              $stmt = $mysqli->prepare("SELECT * FROM productos WHERE nombre_producto LIKE ? LIMIT ? OFFSET ?");
              $searchParam = "%" . $searchQuery . "%";
              $stmt->bind_param("sii", $searchParam, $itemsPerPage, $offset);
            } else {
              $stmt = $mysqli->prepare("SELECT * FROM productos LIMIT ? OFFSET ?");
              $stmt->bind_param("ii", $itemsPerPage, $offset);
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

                  <!--Nombre del producto-->
                  <h5 class="card-title"><?=htmlspecialchars($row["nombre_producto"])?></h5>

                  <!--Imagen del producto-->
                  <img src="<?= htmlspecialchars($row["imagen_producto"]) ?>" class="card-img-top" alt="...">

                  <!--Precio Unitario-->
                  <p class="card-text" id="precio-unitario">$<strong><?= htmlspecialchars($row["precio_unitario"])?></strong> c/u</p>

                  <!--Precio por mayor-->
                  <p class="card-text" id="precio-x-mayor">Precio por mayor: <strong>$<?= htmlspecialchars($row["precio_mayor"])?></strong></p>

                  <!--Disponibilidad-->
                  <strong style="color: <?= $row["producto_disponible"] ? 'green' : 'red' ?>;">
                      <?= htmlspecialchars($disponibilidad) ?>
                  </strong>

              </div>

              <?php 
                  endwhile;
              else:
              ?>
              <p>No se encontraron productos.</p>
              <?php endif; ?>
          </div>

          <?php 
            $stmt->close();
          ?>


      <!--SECCIÓN: PAGINATION-->

            <?php
                // Obtener el total de productos para calcular el número total de páginas
                $totalResult = $mysqli->query("SELECT COUNT(*) as total FROM productos")->fetch_assoc();
                $totalItems = $totalResult['total'];
                $totalPages = ceil($totalItems / $itemsPerPage);
            ?>

            <div id="pagination">
                <?php
                // Parámetros adicionales para mantener el estado
                $additionalParams = isset($_GET['opcion']) ? "&opcion=" . urlencode($_GET['opcion']) : "";


                // Enlace para la página anterior
                $prevPage = max(1, $page - 1);
                $nextPage = min($totalPages, $page + 1);
                ?>
                <a href="?page=<?= $prevPage . $additionalParams ?>" class="<?= $page <= 1 ? 'btn-disabled' : '' ?>">Anterior</a>
                <span>Página <?= $page ?> de <?= $totalPages ?></span>
                <a href="?page=<?= $nextPage . $additionalParams ?>" class="<?= $page >= $totalPages ? 'btn-disabled' : '' ?>">Siguiente</a>
            </div>



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
  ------------------------------Fin Adm_catalogo .PHP-----------------------------------
  -------------------------------------------------------------------------------------->

<!--
- Envases y Troquelados: BLANQUITA MELIPILLA
- Sitio web: https://www.blanquita_melipilla.com
- Desarrollador: DeV37
--->