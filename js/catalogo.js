document.addEventListener("DOMContentLoaded", () => {
    const searchInput = document.querySelector("#search-input");
    const catalogContainer = document.querySelector(".catalogo");

    searchInput.addEventListener("input", () => {
        const query = searchInput.value;

        fetch(`catalogo.php?search=${encodeURIComponent(query)}&ajax=1`)
            .then(response => response.json())
            .then(data => {
                // Limpia el contenedor actual
                catalogContainer.innerHTML = "";

                // Recorre los productos y los agrega al DOM
                data.forEach(producto => {
                    const card = document.createElement("div");
                    card.classList.add("card");

                    // Crear el nombre del producto con resaltado
                    const title = document.createElement("h5");
                    title.classList.add("card-title");
                    const regex = new RegExp(query, "gi");
                    title.innerHTML = producto.nombre_producto.replace(regex, match => `<mark>${match}</mark>`);

                    // Crear la imagen del producto
                    const img = document.createElement("img");
                    img.src = producto.imagen_producto;
                    img.alt = `Imagen de ${producto.nombre_producto}`;
                    img.classList.add("card-img-top");

                    // Crear el precio unitario
                    const precioUnitario = document.createElement("p");
                    precioUnitario.classList.add("card-text");
                    precioUnitario.textContent = `$${producto.precio_unitario} c/u`;

                    // Crear el precio por mayor
                    const precioMayor = document.createElement("p");
                    precioMayor.classList.add("card-text");
                    precioMayor.textContent = `Precio por mayor: $${producto.precio_mayor}`;

                    // Crear la disponibilidad
                    const disponibilidad = document.createElement("strong");
                    disponibilidad.style.color = producto.producto_disponible ? "green" : "red";
                    disponibilidad.textContent = producto.producto_disponible ? "Producto Disponible" : "No Disponible";

                    // Agregar los elementos al contenedor de la tarjeta
                    card.appendChild(title);
                    card.appendChild(img);
                    card.appendChild(precioUnitario);
                    card.appendChild(precioMayor);
                    card.appendChild(disponibilidad);

                    // Agregar la tarjeta al catálogo
                    catalogContainer.appendChild(card);
                });
            })
            .catch(error => {
                console.error("Error en la solicitud AJAX:", error);
                catalogContainer.textContent = "Hubo un error al cargar los productos.";
            });
    });
});
