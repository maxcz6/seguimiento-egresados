# 📌 Sistema de Seguimiento de Egresados

Este es un sistema web desarrollado en **Laravel** que permite gestionar la información de egresados de un instituto/centro educativo, facilitando la interacción entre egresados, tutores, administradores y empresas.

## 🚀 Características principales
- Autenticación y roles de usuario:
  - 👨‍🎓 **Egresado**: actualizar datos personales, registrar empleo y capacitaciones.
  - 👨‍🏫 **Tutor/Admin**: gestión de egresados, capacitaciones, encuestas y reportes.
  - 🏢 **Empresa**: publicar ofertas laborales y gestionar postulaciones.
- Gestión de encuestas de seguimiento.
- Registro y administración de capacitaciones.
- Postulación y seguimiento de trabajos.
- Reportes y estadísticas.

## 🛠️ Tecnologías utilizadas
- **Framework:** [Laravel 11](https://laravel.com)
- **Lenguajes:** PHP, JavaScript, HTML, CSS
- **Base de datos:** MySQL
- **Frontend:** Blade Templates (se puede integrar con Vue.js o React)
- **Estilos:** TailwindCSS / Bootstrap (según configuración futura)

## 📂 Estructura del proyecto
seguimiento-egresados/
├── app/ # Modelos, controladores y lógica principal
├── bootstrap/ # Configuración de arranque de Laravel
├── config/ # Archivos de configuración
├── database/ # Migraciones, seeders y factories
├── public/ # Archivos públicos (index.php, assets, etc.)
├── resources/ # Vistas Blade, componentes y assets
├── routes/ # Definición de rutas web y API
├── storage/ # Archivos generados (logs, cache, etc.)
├── tests/ # Pruebas unitarias y funcionales
└── ...

bash
Copiar código

## ⚙️ Instalación y configuración
1. Clonar el repositorio:
   ```bash
   git clone https://github.com/maxcz6/seguimiento-egresados.git
   cd seguimiento-egresados
Instalar dependencias:

bash
Copiar código
composer install
npm install && npm run dev
Configurar el archivo .env:

bash
Copiar código
cp .env.example .env
Ajustar los datos de conexión a la base de datos:

ini
Copiar código
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=seguimiento_egresados
DB_USERNAME=tu_usuario
DB_PASSWORD=tu_password
Generar la clave de la aplicación:

bash
Copiar código
php artisan key:generate
Ejecutar migraciones y seeders:

bash
Copiar código
php artisan migrate --seed
Levantar el servidor de desarrollo:

bash
Copiar código
php artisan serve
🧪 Tests
Ejecutar pruebas unitarias:

bash
Copiar código
php artisan test
📌 Próximos pasos / To-Do
 Implementar autenticación por roles con Laravel Breeze/Fortify.

 Crear vistas personalizadas (login, dashboard, gestión de egresados).

 Definir migraciones completas para tablas: egresado, empresa, capacitación, encuesta, etc.

 Implementar reportes y estadísticas.

 Mejorar documentación con capturas de pantalla.

👨‍💻 Autor
Desarrollado por: Max

GitHub: maxcz6