<!--
- Envases y Troquelados: BLANQUITA MELIPILLA
- Sitio web: https://www.blanquita_melipilla.com
- Desarrollador: DeV37
--->

<!--------------------------------------------------------------------------------------
  ---------------------------Inicio adm_banner .PHP-------------------------------------
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
    <link rel="stylesheet" href="css/admin/banner.css">
  </head>

  <body>

  <!--**Estructura del componente PHP**-->
  <div class="contenido">
      <?php
          $contenido = ''
      ?>

      <!--SECCIÓN: BANNER-->

        <nav class="banner">

          <!--Opción: INICIO-->
          <a href="?opcion=inicio"><strong>💙🤍BLANQUITA MELIPILLA🤍💙</strong></a>

        </nav>
        
        <?php
            // Verifica si la opción está establecida en la URL
            if (isset($_GET['opcion'])) {
              switch ($_GET['opcion']) {
                  case 'inicio':
                      $contenido = 'php/admin/inicio/ini_principal.php';
          
              }
            }
        ?>


      <div class="menu_p">

        <!--SECCIÓN: DESPLEGABLES-->

          <!--Menú desplegable-->
          <div class="dropdown">


            <!--Opción: CATEGORÍAS-->
            <button class="dropdown-toggle" aria-expanded="false">
                <img src="img/img1_icono_categoria.png" alt="" width="50" height="50"><strong>CATEGORÍAS</strong>
            </button>

            <!-- <ul class="dropdown-menu">
                <li><button class="dropdown-item" type="button"><strong>PLATOS</strong></button></li>
                <li><button class="dropdown-item" type="button"><strong>CANASTAS</strong></button></li>
                <li><button class="dropdown-item" type="button"><strong>CAJAS</strong></button></li>
            </ul> -->


            <!--Opción: GESTIÓN-->
            <button class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="img/img3_gestion_productos.png" alt="" width="50" height="50"><strong>GESTIÓN</strong>
            </button>

                <!--Opción: GESTIÓN-PRODUCTOS-->
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="?opcion=gestion-productos"><strong>PRODUCTOS</strong></a></li>
                </ul>

                <?php
                    // Verifica si la opción está establecida en la URL
                    if (isset($_GET['opcion'])) {
                      switch ($_GET['opcion']) {
                          case 'gestion-productos':
                              $contenido = 'php/admin/gestion/ges_principal.php';
                  
                      }
                    }
                ?>

            </div>


          <!--SECCIÓN: BARRA DE BÚSQUEDA-->

          <div class="input-group" id="search-bar">
              <form action="main.php" method="get">
                <input type="text" name="search" class="form-control" placeholder="Buscar">
                <button class="btn btn-outline-secondary" type="submit"><img src="img/img2_icono_buscar.png" alt=""></button>
              </form>
          </div>

    </div>

        <?php
        // Incluye el archivo del contenido si existe
        if (!empty($contenido) && file_exists($contenido)) {
            include $contenido;
        }
        ?>

  </div>
       

    <!--**Link archivo JS**-->
        <script src="js/admin/inicio/adm_banner.js"></script>

  </body>
  </html>

<!-------------------
  --- Fin LÓGICA  ---
  ------------------->


<!-----------------------------------
  -----Inicio Cierre Conexión BD-----
  ----------------------------------->
  <?php 
    //$mysqli -> close();
  ?>
<!-----------------------------------
  ----- Fin Cierre Conexión BD  -----
  ----------------------------------->

<!--------------------------------------------------------------------------------------
  ------------------------------Fin Banner .PHP-----------------------------------------
  -------------------------------------------------------------------------------------->

<!--
- Envases y Troquelados: BLANQUITA MELIPILLA
- Sitio web: https://www.blanquita_melipilla.com
- Desarrollador: DeV37
--->