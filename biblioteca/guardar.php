<?php
/**
 * guardar.php
 *
 * Script que da de alta un libro nuevo en el inventario.
 * Obtiene por POST lo que se escribió en el formulario de index.php
 * (título, autor e ISBN), limpia los textos con real_escape_string y los
 * guarda como un registro nuevo en la tabla `libros`. Si el guardado
 * funciona, manda al usuario de vuelta a index.php con `success=1`.
 *
 * Pasos que sigue:
 *  1. Comprueba que el método de la petición sea POST.
 *  2. Abre la conexión con la base de datos usando mysqli.
 *  3. Escapa los tres campos recibidos.
 *  4. Hace el INSERT; la columna `disponible` queda con su valor por defecto (1).
 *  5. Redirige con el mensaje de éxito, o imprime el error.
 *
 * @package SistemaBiblioteca
 * @author  Josué Abdiel Martínez Méndez
 * @version 1.0
 *
 * @param string $_POST['titulo'] Nombre del libro.
 * @param string $_POST['autor']  Persona que escribió el libro.
 * @param string $_POST['isbn']   Número ISBN con el que se identifica el libro.
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

    $titulo = $conexion->real_escape_string($_POST['titulo']);
    $autor = $conexion->real_escape_string($_POST['autor']);
    $isbn = $conexion->real_escape_string($_POST['isbn']);

    $sql = "INSERT INTO libros (titulo, autor, isbn)
            VALUES ('$titulo', '$autor', '$isbn')";

    if ($conexion->query($sql) === TRUE) {
        header("Location: index.php?success=1");
    } else {
        echo "Error al guardar el libro: " . $conexion->error;
    }

    $conexion->close();
}
?>