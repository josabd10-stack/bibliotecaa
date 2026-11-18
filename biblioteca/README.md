#Creacion de archivos

<p>
Algunos de los pasos que se hicieron para crear los archivos
</p>
-Git init
-Git status
**Entre otros comandos**

# Sistema de Control de Biblioteca

---

## Descripción

Proyecto web para administrar una biblioteca, registrar libros y consultar su disponibilidad mediante **PHP, MySQL, CSS y JavaScript**.

---

## 1. Crear el subdominio

Se creó un subdominio en **AwardSpace** con el nombre:

`bibliotecapl01`

## 2. Crear la estructura del proyecto

Se creó una carpeta llamada `biblioteca` con los siguientes archivos:

```text
biblioteca/
├── index.php
├── guardar.php
├── styles.css
└── script.js
```

## 3. Primer commit

Se inicializó el repositorio Git y se guardó la estructura inicial:

```bash
git init
git add .
git commit -m "creación de estructura"
```

## 4. Crear la base de datos

Desde **phpMyAdmin de AwardSpace** se creó una base de datos y dentro de ella la tabla `libros`.

```sql
CREATE TABLE libros (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(150) NOT NULL,
    autor VARCHAR(100) NOT NULL,
    isbn VARCHAR(20) NOT NULL,
    disponible INT DEFAULT 1
);
```

## 5. Insertar libros de ejemplo

Se agregaron dos libros para probar el funcionamiento del sistema:

```sql
INSERT INTO libros (titulo, autor, isbn, disponible) VALUES
('Cien años de soledad', 'Gabriel García Márquez', '978-0307474728', 1),
('Don Quijote de la Mancha', 'Miguel de Cervantes', '978-8424937461', 1);
```

## 6. Configurar `index.php`

Se agregó el código PHP y HTML para conectar la base de datos, consultar los libros y mostrarlos en una tabla.

Se configuraron los datos de conexión proporcionados por AwardSpace:

- Servidor.
- Usuario.
- Contraseña.
- Nombre de la base de datos.

## 7. Configurar `guardar.php`

Se agregó el código PHP encargado de recibir los datos del formulario y guardar los nuevos libros en la base de datos.

## 8. Configurar `styles.css`

Se agregaron los estilos visuales del proyecto, incluyendo:

- Colores.
- Formularios.
- Botones.
- Tarjetas.
- Tabla de inventario.

## 9. Configurar `script.js`

Se agregó JavaScript para validar los campos del formulario y mostrar mensajes cuando un libro se registra correctamente.

## 10. Crear `README.md`

Se creó este archivo para documentar la estructura, configuración y funcionamiento del proyecto.

## 11. Primera subida a GitHub

Se guardaron los archivos y se subieron al repositorio:

```bash
git add .
git commit -m "Primera subida de archivos"
git branch -M main
git remote add origin URL_DEL_REPOSITORIO
git push -u origin main
```

## 12. Crear `cambiarEstado.php`

Se creó un nuevo archivo PHP encargado de modificar la disponibilidad de los libros, permitiendo cambiar su estado entre disponible y prestado.

## 13. Modificar la tabla de `index.php`

Se actualizó la tabla del inventario agregando una columna llamada **Acción**, que contiene botones dinámicos para prestar y devolver libros.

## 14. Actualizar `styles.css`

Se agregaron nuevos estilos para los botones de prestar y devolver, además de mejorar la visualización de la tabla.

## 15. Consultar las ramas de Git

Se utilizó el siguiente comando para consultar las ramas remotas:

```bash
git branch -r
```

## 16. Crear una rama de desarrollo

Se creó una rama para trabajar en la función de cambio de estado:

```bash
git checkout -b feat/cambio-estado-libro
```

## 17. Agregar los archivos modificados

Se agregaron los archivos correspondientes a la nueva funcionalidad:

```bash
git add index.php cambiarEstado.php styles.css
```

## 18. Realizar un commit descriptivo

Se guardaron los cambios con el siguiente commit:

```bash
git commit -m "feat(inventario): agregar boton para alternar estado de disponibilidad"
```

## 19. Crear o establecer la rama principal

Se estableció la rama principal del proyecto con el nombre `main`.

```bash
git switch -c main
git branch -M main
```

---

## Tecnologías utilizadas

| Tecnología         | Uso                                |
| ------------------ | ---------------------------------- |
| HTML               | Estructura de la página            |
| CSS                | Diseño y estilos                   |
| JavaScript         | Validaciones e interactividad      |
| PHP                | Procesamiento del sistema          |
| MySQL              | Almacenamiento de información      |
| phpMyAdmin         | Administración de la base de datos |
| AwardSpace         | Alojamiento web                    |
| Visual Studio Code | Edición del código                 |
| Git                | Control de versiones               |
| GitHub             | Almacenamiento del repositorio     |

---

## Autor

**Proyecto desarrollado por Josue Abdiel Martinez Mendez.**
