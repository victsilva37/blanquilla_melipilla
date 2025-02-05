<!--
- Envases y Troquelados: BLANQUITA MELIPILLA
- Sitio web: https://www.blanquita_melipilla.com
- Desarrollador: DeV37
--->

<!--------------------------------------------------------------------------------------
  ---------------------------Inicio Banner .PHP-----------------------------------------
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
    <link rel="stylesheet" href="css/banner.css">
  </head>

  <body>

  <!--**Estructura del componente PHP**-->

        <!--SECCIÓN: BANNER-->

            <!--Banner superior-->
            <nav class="banner">
                <a href="main.php">💙🤍BLANQUITA MELIPILLA🤍💙</a>
            </nav>


        <div class="menu_p">

        <!--SECCIÓN: MENÚ-->

             <div class="dropdown">
                <button class="dropdown-toggle"  data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="img/img1_icono_categoria.png" alt="" width="50" height="50"><strong>CATEGORÍAS</strong>
                </button>
                <ul class="dropdown-menu">
                    <li><button class="dropdown-item" type="button">Platos</button></li>
                    <li><button class="dropdown-item" type="button">Canastas</button></li>
                    <li><button class="dropdown-item" type="button">Cajas</button></li>
                </ul>
            </div>


        <!--SECCIÓN: BARRA DE BÚSQUEDA-->

            <div class="input-group" id="search-bar">
                <input type="text" class="form-control" placeholder="Buscar">
                <!-- <select class="form-select" id="inputGroupSelect04">
                    <option selected >Choose...</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select> -->
                <button class="btn btn-outline-secondary" type="button"><img src="img/img2_icono_buscar.png" alt=""></button>
            </div>

        </div>

        <!--SECCIÓN: CATÁLOGO-->

            <div class="catalogo">
                <div class="card" id="producto-container">
                    <h5 class="card-title">Platos de cartón N°2</h5>
                    <img src="img/Platos de cartón N°2.jpg" class="card-img-top" alt="...">
                    <p class="card-text" id="precio-unitario"><strong>$29</strong> c/u</p>
                    <p class="card-text" id="precio-x-mayor">Precio por mayor: <strong>$26</strong></p>
                    <small><strong>PRODUCTO DISPONIBLE</strong></small>
                </div>
                <div class="card" id="producto-container">
                    <h5 class="card-title">Caja para pizza individual</h5>
                    <img src="img/Caja para pizza individual.jpg" class="card-img-top" alt="...">
                    <p class="card-text" id="precio-unitario"><strong>$110</strong> c/u</p>
                    <p class="card-text" id="precio-x-mayor">Precio por mayor: <strong>$105</strong></p>
                    <small style="color: whitesmoke"><strong>PRODUCTO NO DISPONIBLE</strong></small>
                </div>
                <div class="card" id="producto-container">
                    <h5 class="card-title">Canasta para salchipapas N°1</h5>
                    <img src="img/Canasta para salchipapas N°1.jpg" class="card-img-top" alt="...">
                    <p class="card-text" id="precio-unitario"><strong>$35</strong> c/u</p>
                    <p class="card-text" id="precio-x-mayor">Precio por mayor: <strong>$29</strong></p>
                    <small><strong>PRODUCTO DISPONIBLE</strong></small>
                </div>
            </div>
       


    <!--**Link archivo JS**-->
        <script src=""></script>

  </body>
  </html>

<!-------------------
  --- Fin LÓGICA  ---
  ------------------->

<!--------------------------------------------------------------------------------------
  ------------------------------Fin Banner .PHP-----------------------------------------
  -------------------------------------------------------------------------------------->

<!--
- Envases y Troquelados: BLANQUITA MELIPILLA
- Sitio web: https://www.blanquita_melipilla.com
- Desarrollador: DeV37
--->