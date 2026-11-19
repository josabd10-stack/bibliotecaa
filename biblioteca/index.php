<?php
/**
 * index.php
 *
 * Pantalla principal del sistema de biblioteca.
 * Aquí se junta todo: a la izquierda está el formulario para registrar un
 * libro y a la derecha la tabla con el inventario, mostrando primero los
 * libros más nuevos. Cada fila indica si el libro está disponible o
 * prestado y trae un botón para prestarlo o devolverlo.
 *
 * Se apoya en estos archivos:
 *  - guardar.php:       recibe el formulario y guarda el libro.
 *  - cambiarEstado.php: cambia un libro entre prestado y disponible.
 *  - styles.css:        da la apariencia a la página.
 *  - script.js:         revisa el formulario y avisa cuando se guardó un libro.
 *  - Manual.pdf         Acceso al manual de usuario desde un botón.
 * @package SistemaBiblioteca
 * @author  Josué Abdiel Martínez Méndez
 * @version 1.0
 */
$host = "fdb1029.awardspace.net";
$usuario = "4794853_pruebadb";
$password = "nose1234";
$base_datos = "4794853_pruebadb";

$conexion = new mysqli($host, $usuario, $password, $base_datos);

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$resultado = $conexion->query("SELECT * FROM libros ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Control de Biblioteca</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
    <h1>Sistema de Control de Biblioteca</h1>
    <a href="manual_usuario.pdf" target="_blank" class="btn-manual">Manual de usuario</a>
</header>

<main class="container">

    <section class="card">
        <h2>Registrar Nuevo Libro</h2>

        <form id="formLibro" action="guardar.php" method="POST">
            <div class="form-group">
                <label for="titulo">Título del Libro:</label>
                <input type="text" id="titulo" name="titulo" required>
            </div>

            <div class="form-group">
                <label for="autor">Autor:</label>
                <input type="text" id="autor" name="autor" required>
            </div>

            <div class="form-group">
                <label for="isbn">ISBN:</label>
                <input type="text" id="isbn" name="isbn" required>
            </div>

            <button type="submit" class="btn">Guardar Libro</button>
        </form>
    </section>

    <section class="card table-container">
        <h2>Inventario de Libros</h2>

        <table id="tablaLibros">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Autor</th>
                    <th>ISBN</th>
                    <th>Estado</th>
                    <th>Acción</th>
                </tr>
            </thead>

            <tbody>
                <?php if ($resultado->num_rows > 0): ?>
                    <?php while($fila = $resultado->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $fila['id']; ?></td>
                            <td><strong><?php echo htmlspecialchars($fila['titulo']); ?></strong></td>
                            <td><?php echo htmlspecialchars($fila['autor']); ?></td>
                            <td><?php echo htmlspecialchars($fila['isbn']); ?></td>
                            <td>
                                <span class="badge <?php echo $fila['disponible'] ? 'dispo' : 'prestado'; ?>">
                                    <?php echo $fila['disponible'] ? 'Disponible' : 'Prestado'; ?>
                                </span>
                            </td>
                            <td>
    <form action="cambiarEstado.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $fila['id']; ?>">

        <button type="submit" class="btn-accion">
            <?php echo $fila['disponible'] ? 'Prestar' : 'Devolver'; ?>
        </button>
    </form>
</td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" style="text-align: center;">No hay libros registrados.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </section>

</main>

<script src="script.js"></script>

</body>
</html>

<?php $conexion->close(); ?>
