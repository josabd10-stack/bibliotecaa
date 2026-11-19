# Sistema de Control de Biblioteca

## Descripción
Proyecto web para administrar libros, registrar nuevos ejemplares y consultar su disponibilidad mediante PHP, MySQL, CSS y JavaScript.

## 1. Subdominio
Creado en AwardSpace: `bibliotecapl01`

## 2. Estructura de archivos

```text
biblioteca/
├── index.php
├── guardar.php
├── cambiarEstado.php
├── styles.css
├── script.js
└── README.md
```

## 3. Comandos Git utilizados

```bash
git init
git status
git add .
git commit -m "creación de estructura"
git branch -M main
git remote add origin URL_DEL_REPOSITORIO
git push -u origin main
```

## 4. Base de datos

```sql
CREATE TABLE libros (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(150) NOT NULL,
    autor VARCHAR(100) NOT NULL,
    isbn VARCHAR(20) NOT NULL,
    disponible INT DEFAULT 1
);
```

## 5. Libros de prueba

```sql
INSERT INTO libros (titulo, autor, isbn, disponible) VALUES
('Cien años de soledad', 'Gabriel García Márquez', '978-0307474728', 1),
('Don Quijote de la Mancha', 'Miguel de Cervantes', '978-8424937461', 1);
```

## 6. Archivos PHP

- `index.php`: Consulta y muestra los libros.
- `guardar.php`: Registra nuevos libros.
- `cambiarEstado.php`: Cambia el estado entre disponible y prestado.

## 7. Diseño y funciones

- `styles.css`: Colores, botones, formularios y tablas.
- `script.js`: Validaciones y mensajes.
- `index.php`: Botones para prestar y devolver libros.

## 8. Rama de desarrollo

```bash
git branch -r
git checkout -b feat/cambio-estado-libro
git add index.php cambiarEstado.php styles.css
git commit -m "feat(inventario): agregar boton para alternar estado de disponibilidad"
```

## 9. Actualización del repositorio

```bash
git add .
git commit -m "actualización del sistema"
git push origin main
```
---

**Proyecto desarrollado por Josue Abdiel Martinez Mendez.**
