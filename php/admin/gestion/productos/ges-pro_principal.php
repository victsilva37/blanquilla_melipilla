<!--
- Envases y Troquelados: BLANQUITA MELIPILLA
- Sitio web: https://www.blanquita_melipilla.com
- Desarrollador: DeV37
--->

<!---------------------------------------------------------------------------------------
  ---------------------------Inicio a_ges_pr_principal .PHP------------------------------
  -------------------------------------------------------------------------------------->

  <!-------------------
  ---Inicio LÓGICA---
  ------------------->

  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--Link archivo CSS-->
    <link rel="stylesheet" href="css/admin/gestion/productos/ges-pro_principal.css">

</head>

  <body>

    <!--**Estructura del componente PHP**-->
      <div class="ges-pro-container">

        <!--SECCIÓN: AGREGAR PRODUCTOS-->

          <div class="agregar-productos-container">
            <?php include 'agregar_productos.php'?>
          </div>
          

        <!--SECCIÓN: TABLA DE PRODUCTOS-->

          <div class="tabla-productos-container">
            <?php include 'tabla_productos.php'?>
          </div>

      </div>

      <?php include 'editar_productos.php'?>
    
      

  </body>
  </html>

<!-------------------
  --- Fin LÓGICA  ---
  ------------------->


<!---------------------------------------------------------------------------------------
  ------------------------------Fin a_ges_pr_principal .PHP------------------------------
  -------------------------------------------------------------------------------------->

<!--
- Envases y Troquelados: BLANQUITA MELIPILLA
- Sitio web: https://www.blanquita_melipilla.com
- Desarrollador: DeV37
--->