/*
- Envases y Troquelados: BLANQUITA MELIPILLA
- Sitio web: https://www.blanquita_melipilla.com
- Desarrollador: DeV37
*/

/*--------------------------------------------------------------------------------------
  ---------------------------Inicio editar_productos .JS--------------------------------
  --------------------------------------------------------------------------------------*/

/*SECCIÓN: FORMULARIO DE PRODUCTOS*/

document.getElementById("form-productos").addEventListener("submit", function(event){

    const nombre_producto = document.getElementById("nombre_producto").value
    const imagen_producto = document.getElementById("imagen_producto").files[0]
    const precio_unitario = document.getElementById("precio_unitario").value
    const precio_mayor = document.getElementById("precio_mayor").value
    const producto_disponible = document.getElementById("producto_disponible").checked

    // Limpiar los mensajes de error previos
    document.getElementById("nameError").textContent = "";
    document.getElementById("imageError").textContent = "";
    document.getElementById("unitPriceError").textContent = "";
    document.getElementById("bulkPriceError").textContent = "";


    // Mensaje de error
    let hasError = false;

    if (nombre_producto == ''){
        document.getElementById("nameError").textContent = "El nombre del producto es obligatorio.";
        hasError = true;
    }

    if (!imagen_producto){
        document.getElementById("imageError").textContent = "No has seleccionado una imagen.\n"
        hasError = true;
    }

    if (precio_unitario === "" || isNaN(precio_unitario) || precio_unitario <= 0){
        document.getElementById("unitPriceError").textContent = "Debes colocar un valor en precio unitario.\n"
        hasError = true;
    }

    if (precio_mayor === "" || isNaN(precio_mayor) || precio_mayor <= 0){
        document.getElementById("bulkPriceError".textContent )= "Debes colocar un valor en precio por mayor.\n"
        hasError = true;
    }

    // Si hay errores, prevenir el envío del formulario
    if (hasError) {
        event.preventDefault(); // Evitar que el formulario se envíe
    }

})

/*---------------------------------------------------------------------------------------
  ---------------------------Fin editar_productos .JS------------------------------------
  --------------------------------------------------------------------------------------*/

/*
- Envases y Troquelados: BLANQUITA MELIPILLA
- Sitio web: https://www.blanquita_melipilla.com
- Desarrollador: DeV37
*/