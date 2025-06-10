<p align="center">
  <a href="https://laravel.com" target="_blank">
    <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
  </a>
</p>

<p align="center">
  <a href="https://github.com/Triano83/SMDENTAL/actions">
    <img src="https://github.com/laravel/framework/workflows/PHPUnit/badge.svg" alt="Build Status">
  </a>
  <a href="https://packagist.org/packages/laravel/framework">
    <img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version">
  </a>
  <a href="https://packagist.org/packages/laravel/framework">
    <img src="https://img.shields.io/packagist/l/laravel/framework" alt="License">
  </a>
  <a href="https://laravel.com">
    <img src="https://img.shields.io/badge/PHP-%3E%3D8.2-8892BF.svg" alt="PHP Version">
  </a>
</p>

# 🦷 S.M. Dental: Sistema de Gestión y Facturación para Laboratorios Protésicos 🦷

---

## ✨ Visión General

**S.M. Dental** es una aplicación web robusta y eficiente desarrollada con **Laravel** para la gestión integral de la facturación en el sector de las **clínicas de prótesis dentales**. Diseñada específicamente para autónomos, esta plataforma busca **simplificar y automatizar** el proceso de creación y administración de clientes (clínicas), productos/servicios, albaranes y facturas.

Su objetivo es optimizar las operaciones administrativas diarias, asegurando un control financiero preciso y liberando tiempo para que los profesionales puedan concentrarse en su trabajo principal. Con una interfaz de usuario clara y la flexibilidad de Laravel, S.M. Dental es la solución ideal para automatizar tareas repetitivas y proporcionar una visión completa de la actividad económica.

---

## 🚀 Características Principales

-   **Gestión de Clínicas (Clientes)**:
    -   ➕ **Creación** y **Listado** de clínicas con información detallada (nombre, email, teléfono, dirección, NIF, etc.).
    -   ✏️ **Edición** y **Eliminación** de clientes existentes.
-   **Gestión de Datos Personales (Propios)**:
    -   ➕ **Creación** y **Listado** de tus datos de autónomo/empresa (empresa, nombre, apellidos, dirección, teléfono, email, DNI), que se usarán en las facturas.
    -   ✏️ **Edición** y **Eliminación** de tus datos.
-   **Gestión de Productos/Servicios (Listas de Precios)**:
    -   ➕ **Creación** y **Listado** de productos/servicios con su nombre y precio.
    -   ✏️ **Edición** y **Eliminación** de productos.
-   **Gestión de Facturas**:
    -   ➕ **Creación Manual de Facturas**: Permite seleccionar datos de la clínica y tus datos personales, y añadir productos de la lista de precios con sus cantidades, calculando subtotales y totales con descuentos.
    -   📊 **Listado** de facturas generadas.
    -   🗑️ **Eliminación** de facturas.
    -   _(Nota: La funcionalidad de "Generación Automática de Facturas Mensuales" y "Gestión de Albaranes" descrita en el estilo deseado no está completamente implementada en los archivos proporcionados, pero es una posible expansión del proyecto.)_
-   **Gestión de Usuarios (Administrador vs. Normal)**:
    -   El **administrador** tiene acceso completo a todas las funcionalidades de gestión y visualización.
    -   Los **usuarios normales** tienen acceso limitado, principalmente a la consulta de la lista de precios.

---

## 📦 Estructura del Proyecto

El proyecto sigue la arquitectura Modelo-Vista-Controlador (MVC) de Laravel, organizada de manera lógica:

-   **`routes/web.php`**: Define las rutas para las vistas web (Blade) y la lógica de navegación principal.
-   **`app/Models/`**: Contiene los modelos Eloquent (`User`, `Clinica`, `Dato`, `Factura`, `Lista`) que representan las tablas de la base de datos y sus relaciones.
-   **`database/migrations/`**: Esquemas de la base de datos que definen la estructura de las tablas (`users`, `clinicas`, `datos`, `listas`, `facturas`).
-   **`app/Http/Controllers/`**: Controladores que manejan la lógica de negocio y las interacciones de los usuarios (`ClinicaController`, `DatoController`, `FacturaController`, `HomeController`, `HomenoadminController`, `PreciosController`).
-   **`resources/views/`**: Plantillas Blade para la interfaz de usuario, organizadas por módulos (`layouts`, `clinicas`, `datos`, `factura`, `home`, `homenoadmin`, `welcome`).
-   **`public/js/`**: Archivos JavaScript (`clinicas.js`, `datos.js`) para la interactividad del lado del cliente, especialmente para modales y la actualización de datos en las vistas de listado.

---

## 🛠️ Requisitos del Sistema

Para ejecutar S.M. Dental en tu entorno local, necesitarás:

-   **PHP**: `^8.2`
-   **Composer**
-   **Base de Datos**: **MySQL** (configurado en `.env`)

---

## ⚙️ Instalación y Configuración

Sigue estos pasos para poner en marcha el proyecto en tu entorno local:

1.  **Clonar el Repositorio**:

    ```bash
    git clone [https://github.com/Triano83/SMDENTAL.git](https://github.com/Triano83/SMDENTAL.git) # Asumo este es tu repositorio
    cd SMDENTAL
    ```

2.  **Instalar Dependencias de Composer**:

    ```bash
    composer install
    ```

3.  **Configurar el Archivo `.env`**:

    -   Copia el archivo de ejemplo:
        ```bash
        cp .env.example .env
        ```
    -   Genera una clave de aplicación:
        ```bash
        php artisan key:generate
        ```
    -   Abre el archivo `.env` y configura la conexión a tu base de datos (asegúrate de que la base de datos `sm_dental_db` exista o créala):
        ```env
        DB_CONNECTION=mysql
        DB_HOST=127.0.0.1
        DB_PORT=3306
        DB_DATABASE=sm_dental_db # Puedes usar el nombre que prefieras
        DB_USERNAME=root
        DB_PASSWORD= # Tu contraseña de MySQL, si tienes una
        ```

4.  **Ejecutar Migraciones de Base de Datos**:

    ```bash
    php artisan migrate
    ```

    _(Esto creará todas las tablas necesarias: `users`, `clinicas`, `datos`, `listas`, `facturas`, `password_reset_tokens`, `sessions`.)_

5.  **Iniciar el Servidor de Desarrollo**:
    ```bash
    php artisan serve
    ```
    La aplicación estará disponible en `http://127.0.0.1:8000`.

---

## 📝 Uso de la Aplicación

Una vez que el servidor esté en marcha, navega a la URL local (ej. `http://127.0.0.1:8000`).

-   **Página de Bienvenida (`/`)**: Muestra información general y opciones para **Autenticarse** o **Registrarse**. También permite consultar la **Lista de Precios** de forma pública.
-   **Inicio de Sesión**: Usa las credenciales registradas para acceder.
-   **Panel de Administrador (`/home`)**: Si eres administrador, verás el menú principal con tarjetas para:
    -   **Clínicas Dentales:** Añadir y Listar/Gestionar clínicas.
    -   **Datos Personales:** Añadir y Listar/Gestionar tus datos como emisor.
    -   **Lista de Precios:** Añadir y Listar/Gestionar productos/servicios.
    -   **Creación de Facturas:** Accede a la interfaz para generar nuevas facturas.
-   **Página de No-Administrador (`/homenoadmin`)**: Si no eres administrador, serás redirigido aquí, indicando que el sitio está en construcción y tu acceso es limitado.

---

## 📈 Diagrama de Relación de Entidades (ERD)

Para comprender mejor cómo se relacionan las tablas en la base de datos de S.M. Dental, aquí tienes un esquema simplificado:

mermaid
erDiagram
    USERS ||--o{ CLINICAS : "gestiona"
    USERS ||--o{ DATOS : "gestiona"
    USERS ||--o{ LISTAS : "gestiona"
    USERS ||--o{ FACTURAS : "crea"

    CLINICAS ||--o{ FACTURAS : "receptor_de"
    DATOS ||--o{ FACTURAS : "emisor_de"
    LISTAS ||--o{ FACTURA_PRODUCTOS : "contenido_en"
    FACTURAS ||--o{ FACTURA_PRODUCTOS : "contiene"

    USERS {
        int id PK
        varchar name
        varchar email UK
        timestamp email_verified_at
        varchar password
        boolean admin (default: false)
        remember_token
        timestamp created_at
        timestamp updated_at
    }

    CLINICAS {
        int id PK
        varchar nombre
        varchar direccion
        varchar NIF UK
        varchar email UK
        varchar telefono
        timestamp created_at
        timestamp updated_at
    }

    DATOS {
        int id PK
        varchar empresa
        varchar nombre
        varchar apellidos
        varchar direccion
        varchar telefono
        varchar email UK
        varchar DNI UK
        timestamp created_at
        timestamp updated_at
    }

    LISTAS {
        int id PK
        varchar nombre
        decimal precio
        timestamp created_at
        timestamp updated_at
    }

    FACTURAS {
        int id PK
        int numero_factura UK
        varchar nombre_clinica
        varchar direccion_clinica
        varchar NIF_clinica UK
        varchar email_clinica UK
        varchar telefono_clinica
        varchar nombre_cliente
        varchar dato_empresa
        varchar dato_nombre
        varchar dato_apellidos
        varchar dato_direccion
        varchar dato_telefono
        varchar dato_email UK
        varchar dato_DNI UK
        date fecha_emision
        decimal subtotal
        decimal total
        text productos (JSON de items)
        timestamp created_at
        timestamp updated_at
    }

    

