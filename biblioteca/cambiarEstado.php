<?php
/**
 * Archivo: cambiarEstado.php
 * Propósito:
 *   Procesar la acción "Prestar" / "Devolver" de la tabla de inventario.
 *
 * Descripción:
 *   Este script solo responde a peticiones POST. Toma el identificador del
 *   libro enviado desde index.php, lo convierte a número entero y le cambia
 *   el valor a la columna "disponible" de la tabla "libros": si el libro
 *   estaba disponible (1) pasa a prestado (0), y viceversa. Al terminar,
 *   el usuario regresa a la página principal.
 *
 * Datos de entrada:
 *   $_POST['id'] (int): número de identificación del libro.
 * Resultado:
 *   Éxito: redirección a index.php.
 *   Fallo: mensaje con el error de MySQL.
 *
 * @see index.php Página que contiene el botón que invoca este archivo.
 *
 * @author  Josué Abdiel Martínez Méndez
 * @version 2.0
 */
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $host = "fdb1029.awardspace.net";
    $usuario = "4795123_pruebadb";
    $password = "plantel000001110";
    $base_datos = "4795123_pruebadb";

    $conexion = new mysqli($host, $usuario, $password, $base_datos);

    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
    }

    $id = intval($_POST['id']);

    $sql = "UPDATE libros
            SET disponible = IF(disponible = 1, 0, 1)
            WHERE id = $id";

    if ($conexion->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error al cambiar el estado: " . $conexion->error;
    }

    $conexion->close();
}
?>