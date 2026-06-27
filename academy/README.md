# Academy by Total Therapy — WordPress Block Theme

Tema de bloques (Full Site Editing) para **Academy by Total Therapy**, la unidad de
formación en fisioterapia invasiva (punción seca). Compatible con el **Site Editor** y
**Gutenberg**, sin Elementor, WPBakery ni page builders externos. Sin librerías pesadas.

- **Tipografía:** Poppins (auto-alojada en `/assets/fonts`, sin llamadas a Google Fonts).
- **Paleta:** colores oficiales Academy (Navy, Indigo, Orange, Yellow…).
- **Patrones editables** para todas las secciones de la landing.
- **Un bloque propio** (`Academy · Hero Slider`) ligero y accesible.

---

## 1. Requisitos

| Requisito          | Versión mínima |
|--------------------|----------------|
| WordPress          | 6.5            |
| PHP                | 7.4            |

No requiere plugins para funcionar. Ver la sección 7 para integraciones opcionales.

---

## 2. Instalación

### Opción A — Subir el ZIP
1. Comprime la carpeta `academy/` en `academy.zip`.
2. En WordPress: **Apariencia → Temas → Añadir nuevo → Subir tema**.
3. Selecciona `academy.zip` e instala.
4. Pulsa **Activar**.

### Opción B — Copia manual (FTP/SSH)
1. Copia la carpeta `academy/` dentro de `wp-content/themes/`.
2. En **Apariencia → Temas**, activa **Academy by Total Therapy**.

---

## 3. Primeros pasos tras activar

1. **Logo:** ve a **Apariencia → Editor → Patrones / Encabezado**, selecciona el bloque
   *Logotipo del sitio* y sube `assets/images/logo-color.svg` (o tu logo).
2. **Página de inicio:**
   - Crea una página "Inicio" (puede quedar vacía).
   - En **Ajustes → Lectura → Tu página de inicio muestra → Una página estática**,
     elige "Inicio". El tema usa `front-page.html` automáticamente con todas las
     secciones de la landing.
3. **Página de Eventos:**
   - Crea una página "Eventos".
   - En el panel de la página, en **Plantilla**, elige **"Página de Eventos"**.
4. **Menús:** edita el bloque *Navegación* en el encabezado desde el Site Editor.

---

## 4. Cómo editar (sin tocar código)

Todo el contenido relevante es editable desde WordPress:

| Quiero cambiar…              | Dónde |
|------------------------------|-------|
| Header / Footer              | **Apariencia → Editor → Patrones → Partes de plantilla** |
| Textos, imágenes, botones    | Abre la página/plantilla en el editor y edita el bloque |
| Secciones de la landing      | Son **patrones**: insértalos con el botón **+ → Patrones → Academy** |
| Colores y tipografía global  | **Apariencia → Editor → Estilos** |
| Slides del hero              | Selecciona el bloque *Academy · Hero Slider* y edita cada *Cover* |

### Insertar un patrón
En cualquier página: botón **+** → pestaña **Patrones** → categoría **Academy** →
elige Hero, Categorías, Promo, Cursos, Testimonios, Blog/Eventos, App, Partners o
Eventos·Lista.

---

## 5. El bloque Academy · Hero Slider

- Cada diapositiva es un bloque **Cover** nativo → editas imagen, título, botón, etc.
- En el editor las diapositivas se ven **apiladas** (fácil de editar); en la web se
  convierten en **carrusel**.
- Ajustes en la barra lateral del bloque: autoplay, bucle, intervalo, flechas, puntos.
- Accesibilidad: navegación por teclado (← →), swipe táctil, roles ARIA, pausa al
  enfocar/hover, y respeta `prefers-reduced-motion` (desactiva el autoplay).
- **Sin librerías externas** (~2 KB de JS propio).

---

## 6. Estructura del tema

```
academy/
├── style.css                 Cabecera del tema
├── functions.php             Soportes, encolados, registro de bloque y patrones
├── theme.json                Colores, tipografía, spacing, layout, estilos globales
├── templates/                Plantillas (front-page, page-eventos, single, 404…)
├── parts/                    Header, footer, hero interior
├── patterns/                 Secciones reutilizables (PHP)
├── blocks/hero-slider/       Bloque personalizado (block.json + JS + CSS)
└── assets/
    ├── css/                  global, components, editor
    ├── js/                   navigation
    ├── fonts/                Poppins (woff2)
    └── images/               logo, isotipo y placeholders
```

---

## 7. Integraciones recomendadas (plugins aparte)

El tema **no** incluye lógica de negocio. Para funcionalidades avanzadas usa plugins
dedicados (separación de responsabilidades):

| Necesidad                         | Plugin sugerido |
|-----------------------------------|-----------------|
| Cursos, inscripciones, lecciones  | Tutor LMS / LearnDash |
| Pagos / tienda                    | WooCommerce |
| Formularios de contacto           | Fluent Forms / WPForms |
| CPT de Eventos administrables     | The Events Calendar, o un plugin propio `academy-core` |

> **Eventos:** la página de Eventos usa hoy un patrón con contenido editable. Si se
> necesita gestión dinámica (CPT, filtros por fecha, inscripción), se recomienda crear
> un plugin `academy-core` que registre el CPT `evento` y reemplazar el patrón por un
> bloque *Query Loop*.

---

## 8. Mantenimiento

- **Fuentes:** para añadir pesos, coloca el `.woff2` en `assets/fonts/` y declara el
  `fontFace` en `theme.json`.
- **Colores:** edítalos en `theme.json → settings.color.palette`. Se propagan a todo.
- **Caché:** tras cambiar `theme.json`, si no ves cambios, limpia la caché de objetos
  o desactiva/activa el tema.
- **Versionado:** sube `Version` en `style.css` y la constante `ACADEMY_VERSION` en
  `functions.php` para forzar refresco de CSS/JS.

Ver `DESIGN_IMPLEMENTATION.md` para el mapeo diseño→código y `QA.md` para la checklist.
