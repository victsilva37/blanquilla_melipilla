<!--
- Envases y Troquelados: BLANQUITA MELIPILLA
- Sitio web: https://www.blanquita_melipilla.com
- Desarrollador: DeV37
--->

<!--------------------------------------------------------------------------------------
  ---------------------------Inicio Admin-main .PHP-------------------------------------
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

    <!--Link estilos de bootstraps-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


</head>

  <body>

    <!--**Estructura del componente PHP**-->

        <?php include 'php/admin/banner.php'?>



    <!--Link script de bootstrap-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

  </body>
  </html>

<!-------------------
  --- Fin LÓGICA  ---
  ------------------->

<!--------------------------------------------------------------------------------------
  ------------------------------Fin Admin-main .PHP-------------------------------------
  -------------------------------------------------------------------------------------->

<!--
- Envases y Troquelados: BLANQUITA MELIPILLA
- Sitio web: https://www.blanquita_melipilla.com
- Desarrollador: DeV37
--->