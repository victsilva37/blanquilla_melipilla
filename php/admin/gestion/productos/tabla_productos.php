<!--
- Envases y Troquelados: BLANQUITA MELIPILLA
- Sitio web: https://www.blanquita_melipilla.com
- Desarrollador: DeV37
--->

<!--------------------------------------------------------------------------------------
  ---------------------------Inicio tabla_productos .PHP--------------------------------
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
    <link rel="stylesheet" href="css/admin/gestion/productos/tabla_productos.css">
  </head>
  <body>
    <!--**Estructura del componente PHP**-->

        <?php
            // Configuración de paginación
            $productosPorPagina = 10; // Máximo de productos por página
            $paginaActual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
            $offset = ($paginaActual - 1) * $productosPorPagina;

            // Obtener el total de productos
            $sqlTotal = "SELECT COUNT(*) AS total FROM productos";
            $resultTotal = $mysqli->query($sqlTotal);
            $totalProductos = $resultTotal->fetch_assoc()['total'];
            $totalPaginas = ceil($totalProductos / $productosPorPagina);

            // Consulta para obtener productos de la página actual
            $sql = "SELECT * FROM productos LIMIT $offset, $productosPorPagina";
            $result = $mysqli->query($sql);
        ?>

        <table class="table">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre del producto</th>
            <th scope="col">Precio unitario ($)</th>
            <th scope="col">Precio por mayor ($)</th>
            <th scope="col">Disponibilidad</th>
            <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php 
              $productosMostrados = 0;
              if ($result && $result->num_rows > 0): 
            ?>
                <?php while ($row = $result->fetch_assoc()): 
                   $productosMostrados++;
                ?>
                    <tr>
                        <th scope="row"><?php echo htmlspecialchars($row['id_producto']); ?></th>
                        <td><?php echo htmlspecialchars($row['nombre_producto']); ?></td>
                        <td><?php echo htmlspecialchars($row['precio_unitario']); ?></td>
                        <td><?php echo htmlspecialchars($row['precio_mayor']); ?></td>
                        <td>
                            <?php echo $row['producto_disponible'] ? "Disponible" : "No disponible"; ?>
                        </td>
                        <td>
                            <!-- Acciones como editar o eliminar -->
                            <a href="php/admin/gestion/productos/editar_productos.php" class="btn btn-primary btn-sm">Editar</a>
                            <a href="eliminar_productos.php?id_producto=<?php echo $row['id_producto']; ?>" 
                              class="btn btn-danger btn-sm" 
                              onclick="return confirm('¿Estás seguro de eliminar este producto?');">Eliminar</a>

                        </td>
                    </tr>
                <?php endwhile; ?>

            <?php else: ?>
                <tr>
                    <td colspan="6" class="text-center">No hay productos registrados.</td>
                </tr>
            <?php endif; ?>

          <?php
            // Agregar filas vacías si hay menos de 10 productos en la página
            for ($i = $productosMostrados; $i < $productosPorPagina; $i++): 
          ?>
              <tr>
                  <td colspan="6" class="text-center">&nbsp;</td>
              </tr>
           <?php endfor; ?>

        </tbody>
        </table>

        <!-- Navegación de paginación -->
        <nav>
            <ul class="pagination">
                <?php if ($paginaActual > 1): ?>
                    <li class="page-item">
                        <a class="page-link" href="#" data-page="<?php echo $paginaActual - 1; ?>">Anterior</a>
                    </li>
                <?php endif; ?>

                <?php for ($i = 1; $i <= $totalPaginas; $i++): ?>
                    <li class="page-item <?php echo ($i === $paginaActual) ? 'active' : ''; ?>">
                        <a class="page-link" href="#" data-page="<?php echo $i; ?>"><?php echo $i; ?></a>
                    </li>
                <?php endfor; ?>

                <?php if ($paginaActual < $totalPaginas): ?>
                    <li class="page-item">
                        <a class="page-link" href="#" data-page="<?php echo $paginaActual + 1; ?>">Siguiente</a>
                    </li>
                <?php endif; ?>
            </ul>
        </nav>



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

<!---------------------------------------------------------------------------------------
  ------------------------------Fin tabla_productos .PHP---------------------------------
  --------------------------------------------------------------------------------------->

<!--
- Envases y Troquelados: BLANQUITA MELIPILLA
- Sitio web: https://www.blanquita_melipilla.com
- Desarrollador: DeV37
--->