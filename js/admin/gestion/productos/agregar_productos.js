/*
- Envases y Troquelados: BLANQUITA MELIPILLA
- Sitio web: https://www.blanquita_melipilla.com
- Desarrollador: DeV37
*/

/*--------------------------------------------------------------------------------------
  ---------------------------Inicio agregar_productos .JS------------------------------
  --------------------------------------------------------------------------------------*/

/*SECCIÓN: FORMULARIO DE PRODUCTOS*/

    document.getElementById("form-productos").addEventListener("submit", function(event){

        const nombre_producto = document.getElementById("nombre_producto").value
        const imagen_producto = document.getElementById("imagen_producto").value
        const precio_unitario = document.getElementById("precio_unitario").value
        const precio_mayor = document.getElementById("precio_mayor").value
        const producto_disponible = document.getElementById("producto_disponible").checked

        let mensajeError = ''

        if (nombre_producto == ''){
            mensajeError += "El nombre del producto es obligatorio.\n"
        }

        if (imagen_producto == ''){
            mensajeError += "No has seleccionado una imagen.\n"
        }

        if (precio_unitario == ''){
            mensajeError += "Debes colocar un valor en precio unitario.\n"
        }

        if (precio_mayor == ''){
            mensajeError += "Debes colocar un valor en precio por mayor.\n"
        }

    

        if (nombre_producto == ''){
            mensajeError += "El nombre del producto es obligatorio.\n"
        }
    })
/*--------------------------------------------------------------------------------------
  ---------------------------Fin agregar_productos .JS----------------------------------
  --------------------------------------------------------------------------------------*/

/*
- Envases y Troquelados: BLANQUITA MELIPILLA
- Sitio web: https://www.blanquita_melipilla.com
- Desarrollador: DeV37
*/