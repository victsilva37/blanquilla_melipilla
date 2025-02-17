<!----------------------------
  -----Inicio Conexión BD-----
  ---------------------------->
  <?php 
    $mysqli = new mysqli('localhost', 'root', '', 'blanquita_melipilla');
  ?>
<!----------------------------
  ----- Fin Conexión BD  -----
  ---------------------------->
<?php

// Validar el parámetro 'id_producto' recibido
if (isset($_GET['id_producto']) && is_numeric($_GET['id_producto'])) {
  $id = (int) $_GET['id_producto'];

  // Preparar la consulta SQL para evitar inyecciones
  $sql = "DELETE FROM productos WHERE id_producto = ?";
  $stmt = $mysqli->prepare($sql);

  if ($stmt) {
      $stmt->bind_param("i", $id);
      if ($stmt->execute()) {
          echo "<script>alert('Producto eliminado con éxito.'); window.location.href = 'tabla_productos.php';</script>";
      } else {
          echo "<script>alert('Error al eliminar el producto.'); window.location.href = 'tabla_productos.php';</script>";
      }
      $stmt->close();
  } else {
      echo "Error en la preparación de la consulta: " . $mysqli->error;
  }
} else {
  echo "<script>alert('ID de producto no válido.'); window.location.href = 'tabla_productos.php';</script>";
}

// Cerrar conexión
$mysqli->close();
?>
