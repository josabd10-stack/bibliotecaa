/**
 * script.js
 *
 * Código JavaScript que corre en el navegador del usuario.
 * Tiene dos tareas: revisar que el formulario esté bien llenado antes de
 * mandarlo a guardar.php, y mostrar una alerta de confirmación cuando la
 * URL trae `?success=1` después de guardar un libro.
 *
 * @package SistemaBiblioteca
 * @author  Josué Abdiel Martínez Méndez
 * @version 1.0
 */

/**
 * Función que se activa cuando la página terminó de cargar.
 * Deja listo el control del formulario y comprueba si hay que avisar que
 * un libro se registró correctamente.
 *
 * @returns {void}
 */
document.addEventListener('DOMContentLoaded', () => {

    const form = document.getElementById('formLibro');

    /**
 * Función que revisa los datos justo cuando se envía el formulario.
 * Detiene el envío si falta algún campo o si el ISBN tiene menos de
 * 10 caracteres, y en esos casos muestra una alerta al usuario.
 *
 * @param {SubmitEvent} e Evento que genera el envío del formulario.
 * @returns {void}
 */
    form.addEventListener('submit', (e) => {

        const titulo = document.getElementById('titulo').value.trim();
        const autor = document.getElementById('autor').value.trim();
        const isbn = document.getElementById('isbn').value.trim();

        if (titulo === "" || autor === "" || isbn === "") {
            e.preventDefault();
            alert('Por favor, rellena todos los campos antes de guardar.');
            return;
        }

        if (isbn.length < 10) {
            e.preventDefault();
            alert('El campo ISBN parece demasiado corto o inválido.');
        }

    });

    const urlParams = new URLSearchParams(window.location.search);

    if (urlParams.get('success') === '1') {

        window.history.replaceState({}, document.title, window.location.pathname);

        alert('¡Libro registrado con éxito en el inventario!');
    }

});