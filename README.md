# ADIPA — Versión B (Laravel + Stylus + jQuery)

Landing page de la plataforma de educación continua ADIPA, construida con Laravel 13, Stylus como preprocesador CSS y jQuery para la interactividad. El pipeline de assets es manejado por Gulp 5.

---

## Tecnologías utilizadas

| Tecnología | Versión |
|---|---|
| PHP | 8.4.7 |
| Laravel | 13.5.0 |
| Composer | 2.8.9 |
| Node.js | 22.18.0 |
| Gulp | 5.x |
| jQuery | 4.x |
| Stylus | via gulp-stylus |

---

## Instalación

### 1. Clonar el repositorio

```bash
git clone https://github.com/facundoluna76/version-b-adipa.git
cd version-b-adipa
```

### 2. Instalar dependencias PHP

```bash
composer install
```

### 3. Instalar dependencias Node

```bash
npm install
```

### 4. Configurar el entorno

```bash
cp .env.example .env
php artisan key:generate
```

### 5. Compilar los assets (CSS + JS)

```bash
npm run build
```

---

## Desarrollo

### Iniciar el servidor local

```bash
php artisan serve
```

El sitio estará disponible en [http://127.0.0.1:8000](http://127.0.0.1:8000)

### Compilar assets en modo watch (detecta cambios automáticamente)

```bash
npm run watch
```

### Compilar assets una sola vez

```bash
npm run dev
```

---

## Build para producción

```bash
npm run build
```

Este comando ejecuta Gulp, que:
- Compila y minifica el Stylus → `public/css/main.css`
- Concatena y minifica el JavaScript → `public/js/main.js`

### Exportar como sitio estático (para deploy en Netlify, etc.)

Con el servidor corriendo en otra terminal:

```bash
wget --mirror --convert-links --adjust-extension --page-requisites --no-parent http://127.0.0.1:8000 -P static-export
```

El HTML exportado queda en `static-export/127.0.0.1:8000/` listo para subir a cualquier hosting estático.

---

## Estructura del proyecto

```
adipa-version-b/
├── app/
│   ├── Data/
│   │   └── CoursesData.php       # Datos estáticos de cursos y configuración
│   └── Http/Controllers/
│       └── HomeController.php    # Controlador principal
├── resources/
│   ├── js/                       # JavaScript modular (theme, header, filters, etc.)
│   ├── styl/                     # Stylus parciales por componente
│   └── views/
│       ├── layouts/app.blade.php # Layout base HTML
│       └── partials/             # Componentes Blade (header, hero, courses, etc.)
├── public/
│   ├── css/main.css              # CSS compilado (generado por Gulp)
│   └── js/main.js                # JS compilado (generado por Gulp)
├── routes/web.php                # Rutas
└── gulpfile.js                   # Pipeline de assets
```

---

## Scripts disponibles

| Comando | Descripción |
|---|---|
| `npm run dev` | Compila assets una vez |
| `npm run watch` | Compila assets y observa cambios |
| `npm run build` | Build optimizado para producción |
| `php artisan serve` | Inicia el servidor de desarrollo |
| `php artisan key:generate` | Genera la clave de aplicación |
