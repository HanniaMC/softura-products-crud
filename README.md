# Sistema de Gestión de Productos

Sistema web CRUD desarrollado en Laravel para la administración de productos y categorías.  
Este proyecto permite registrar, editar, eliminar y buscar productos de manera sencilla mediante una interfaz limpia y responsiva.

---
## Tecnologías Utilizadas

- Laravel
- PHP
- MySQL
- Bootstrap 5
- HTML5
- CSS3

---

## Funcionalidades

- Registro de productos
- Edición de productos
- Eliminación de productos
- Búsqueda de productos
- Validación de formularios
- Gestión de categorías
- Interfaz responsiva y amigable

---

## Requisitos

Antes de ejecutar el proyecto es necesario contar con:

- PHP 8 o superior
- Composer
- MySQL
- XAMPP o Laragon
- Git

---

## Instalación del Proyecto

Clonar el repositorio:

```bash
git clone https://github.com/HanniaMC/softura-products-crud.git
```

Ingresar a la carpeta del proyecto:

```bash
cd softura-products-crud
```

Instalar dependencias:

```bash
composer install
```

Copiar archivo de entorno:

```bash
cp .env.example .env
```

Generar clave de Laravel:

```bash
php artisan key:generate
```

---

## Configuración de Base de Datos

Configurar el archivo `.env` con los datos de MySQL:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=softura_products_db
DB_USERNAME=root
DB_PASSWORD=
```

---

## Migraciones y Seeders

Ejecutar las migraciones:

```bash
php artisan migrate
```

Ejecutar los seeders:

```bash
php artisan db:seed
```

---

## Ejecutar el Proyecto

Iniciar servidor local:

```bash
php artisan serve
```

Abrir en navegador:

```text
http://127.0.0.1:8000
```

---

## Script de Base de Datos

El proyecto incluye un archivo:

```text
database_script.sql
```

que contiene la estructura de la base de datos utilizada.

---

## Autor

Proyecto desarrollado por Hannia Medina como parte de evaluación práctica para desarrolladores.
