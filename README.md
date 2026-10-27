# Portfolio personal  lvaro Garca Sangesa

Web de portfolio profesional desarrollada con **Laravel** que incluye un panel de
administracin para gestionar los proyectos y recibir los mensajes del formulario
de contacto.

> Demo en vivo: _(pendiente de desplegar)_

## Caractersticas

- **Sitio pblico**
  - Pgina de inicio con presentacin, tecnologas y proyectos destacados.
  - Listado de proyectos y pgina de detalle de cada uno.
  - Seccin "Sobre m".
  - Formulario de contacto que guarda los mensajes en la base de datos.

- **Panel de administracin** (protegido con autenticacin)
  - Login seguro.
  - Dashboard con estadsticas y ltimos mensajes.
  - CRUD completo de proyectos (crear, editar, eliminar, destacar, publicar).
  - Bandeja de entrada de mensajes con contador de no ledos.

## Tecnologas

- **Backend:** PHP 8.3, Laravel 13
- **Frontend:** Blade, Tailwind CSS 4, Vite
- **Base de datos:** SQLite (desarrollo) / MySQL (produccin)
- **Herramientas:** Composer, npm, Git

## Instalacin local

```bash
# 1. Clonar el repositorio
git clone https://github.com/AlvaroGarcia97/Portfolio.git
cd Portfolio

# 2. Instalar dependencias
composer install
npm install

# 3. Configurar el entorno
cp .env.example .env
php artisan key:generate

# 4. Preparar la base de datos (con datos de ejemplo)
php artisan migrate --seed

# 5. Compilar los assets
npm run build

# 6. Arrancar el servidor
php artisan serve
```

La web estar disponible en `http://localhost:8000`.

## Acceso al panel de administracin

- **URL:** `/login`
- Las credenciales del usuario administrador se crean con el seeder
  `AdminUserSeeder`, leyendo `ADMIN_EMAIL` y `ADMIN_PASSWORD` del `.env`
  (si no las defines, usa las de ejemplo). **Cmbialas antes de publicar en produccin.**

## Estructura del proyecto

```
app/
 Http/Controllers/
    HomeController.php          # Pgina de inicio
    ProjectController.php       # Proyectos (pblico)
    ContactController.php       # Formulario de contacto
    AuthController.php          # Login / logout
    Admin/                       # Panel de administracin
        DashboardController.php
        ProjectController.php    # CRUD de proyectos
        MessageController.php    # Bandeja de mensajes
 Models/
     Project.php
     Message.php

database/
 migrations/                      # Estructura de la base de datos
 seeders/                         # Usuario admin y proyectos de ejemplo

resources/views/
 layouts/                         # Plantillas base
 home.blade.php
 about.blade.php
 contact.blade.php
 projects/                        # Listado y detalle
 auth/                            # Login
 admin/                           # Panel de administracin
```

## Licencia

Este proyecto es de uso personal. El cdigo est disponible bajo licencia MIT.
