# Academy by Total Therapy — WordPress Block Theme

Tema de bloques (Full Site Editing) para **Academy by Total Therapy**, la unidad de
formación en fisioterapia invasiva (punción seca). Compatible con el **Site Editor** y
**Gutenberg**, sin Elementor, WPBakery ni page builders externos. Sin librerías pesadas.

- **Tipografía:** Poppins (auto-alojada en `/assets/fonts`, sin llamadas a Google Fonts).
- **Paleta:** colores oficiales Academy (Navy, Indigo, Orange, Yellow…).
- **Patrones editables** para todas las secciones de la landing.
- **Un bloque propio** (`Academy · Hero Slider`) ligero y accesible.
- **Contenido y fotografía reales** de la *Formación Internacional en Punción Seca*
  (edición dirigida por la Mg. Chantal Páucar), incluidos en el tema.

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

1. **Logo:** ya viene puesto como bloque *Imagen*: `assets/images/logo-academy-header.svg`
   en el encabezado y `assets/images/logo-academy-blanco.webp` en el pie. Para cambiarlo:
   **Apariencia → Editor → Patrones → Encabezado** o **Pie**.
2. **Página de inicio:**
   - Crea una página "Inicio" (puede quedar vacía).
   - En **Ajustes → Lectura → Tu página de inicio muestra → Una página estática**,
     elige "Inicio". El tema usa `front-page.html` automáticamente con todas las
     secciones de la landing.
3. **Teléfono de contacto:** la fuente única es `config/contact.json`; consulta
   «Teléfono de contacto» más abajo.
4. **Menús:** edita el bloque *Navegación* en el encabezado desde el Site Editor.
5. **Redes sociales:** en el pie, sustituye los enlaces `#` por los perfiles reales.
6. **Página de Eventos (opcional):** el tema incluye la plantilla *Página de Eventos*
   con el detalle de fechas por nivel. Ningún enlace apunta ahí todavía para no generar
   404; si la quieres, crea una página con el slug `eventos`, asígnale esa plantilla y
   enlázala desde el menú.

### Teléfono de contacto

La fuente única es `config/contact.json`. Ejemplo de formato válido:

```json
{
  "phone": {
    "number": "+51908932632",
    "display": "+51 908 932 632"
  }
}
```

- `phone.number`: teléfono canónico en formato internacional E.164, con prefijo `+` y
  solo dígitos después.
- `phone.display`: texto visible; debe contener exactamente los mismos dígitos que
  `number` y limitarse a dígitos y signos de formato telefónico (`+`, espacios, guiones,
  puntos y paréntesis).
- Al cambiar ambos valores y purgar la caché, se actualizan los CTA de WhatsApp, el
  teléfono visible del footer y las FAQ, y el `telephone` del JSON-LD.
- Si el archivo falta, no es legible, el JSON es inválido o los valores no cumplen el
  contrato, el tema omite el teléfono y los enlaces afectados; no usa el número anterior.
- El enlace «Contacto» del header usa el marcador `#academy-contact-whatsapp-info`, los
  botones de WhatsApp usan bindings del tema y el teléfono visible se pinta con shortcodes
  internos. No los sustituyas por URLs o textos fijos si quieres conservar la configuración
  centralizada.
- El contenido ya guardado en WordPress no se actualiza automáticamente. Revisa los
  patrones ya insertados, las páginas y las partes de plantilla personalizadas desde el
  Site Editor, y actualiza manualmente los valores antiguos.
- Shortcodes internos: `[academy_contact_phone]` para el texto visible y
  `[academy_contact_phone_link motivo="info" label="..."]` para un enlace. No los uses para
  cambiar el número: edita el JSON.
- Después de editar el JSON, purga la caché de página u objeto del sitio.

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
| Fechas de cada nivel         | Plugin **Academy · Programación y Alumnos** (menú *Academy → Fechas*). Sin plugin: `academy_schedule_defaults()` en `functions.php` |
| Alumnos formados (/alumnos/) | Plugin, menú *Academy → Alumnos formados*. Sin plugin: `academy_alumni_defaults()` en `functions.php` y fotos en `assets/images/alumnos/` |

### Insertar un patrón
En cualquier página: botón **+** → pestaña **Patrones** → categoría **Academy** → elige
Hero, Ruta de formación, Promo, Temario, Docente, Material académico,
Testimonios, Así se vive la formación, Preguntas frecuentes, Aliados, Alumnos formados o Eventos·Lista.

La página **Alumnos** usa la plantilla `page-alumnos.html` (se aplica sola a la página con slug
`alumnos`, o se elige como *Página de Alumnos*). El plugin crea esa página automáticamente.

### Fechas de ejemplo y valores predeterminados

La siguiente tabla es una **edición de ejemplo** para explicar la estructura; no representa
necesariamente las fechas publicadas en este momento.

| Nivel      | Fechas                              | Horas | Músculos |
|------------|-------------------------------------|-------|----------|
| Básico     | 30 y 31 de octubre                  | 20 h  | 1 – 17   |
| Intermedio | Próximamente                        | 30 h  | 18 – 59  |
| Avanzado   | Próximamente                        | 30 h  | 60 – 101 |

Horario: 9:00 a. m. a 8:00 p. m. · Almuerzo: 1:00 p. m. a 2:00 p. m.
Sede: Lima, Perú (la dirección exacta no se publica en la web; se comunica al inscribirse).

Las fechas publicadas se administran en **Academy → Fechas** (opción `academy_programacion`
del plugin). Sin plugin, el tema usa `academy_schedule_defaults()` en `functions.php`, cuyos
valores actuales son `2026-10-30` y `2026-10-31` para el Nivel Básico. Si la última fecha de
un nivel ya pasó, el tema muestra «Próximamente» y no anuncia una edición terminada.

El tema pinta las fechas en las tarjetas de *Ruta de formación*, en *Así se vive la formación*,
en *Eventos·Lista* y en los datos estructurados del curso. Los patrones no deben editarse para
cambiar fechas: usan los shortcodes de programación.

Shortcodes disponibles (también dentro de bloques HTML de los patrones):
`[academy_fechas nivel=basico]`, `[academy_fechas nivel=basico mostrar=primera]`,
`[academy_fechas_tarjeta nivel=basico]` y `[academy_fecha_insignia nivel=basico]`.

Los mensajes de WhatsApp se definen en `academy_whatsapp_message()` (functions.php) y todos
indican que el contacto llega desde la web. Los enlaces de `parts/header.html` y
`parts/footer.html` consumen esos mensajes mediante los bindings y el filtro del tema; no
dupliques los textos.

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
├── functions.php             Soportes, encolados, programación, alumnos, SEO, bloque y patrones
├── config/contact.json       Teléfono de contacto (fuente única)
├── theme.json                Colores, tipografía, spacing, layout, estilos globales
├── templates/                Plantillas (front-page, page-eventos, single, 404…)
├── parts/                    Header, footer, hero interior
├── patterns/                 Secciones reutilizables (PHP)
├── blocks/hero-slider/       Bloque personalizado (block.json + JS + CSS)
└── assets/
    ├── css/                  global, components, editor
    ├── js/                   navigation
    ├── fonts/                Poppins (woff2)
    └── images/               logos, fotografía de la formación y retratos
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

## 8. SEO

El tema cubre lo esencial sin depender de un plugin de SEO:

- Título del documento, meta description, canonical de portada cuando corresponde, Open
  Graph, Twitter Cards, iconos y datos estructurados JSON-LD (organización, sitio, docente y
  curso).
- El `telephone` del JSON-LD se toma de `config/contact.json`; se omite si la configuración
  no es válida.
- Si detecta Yoast, Rank Math, AIOSEO o SEOPress, se aparta y deja que el plugin gestione esas
  etiquetas.
- Los textos base están en `academy_seo_texts()` y la lógica en `academy_seo_head()` de
  `functions.php`.

Esta es la implementación observada en el código; no se ha validado en un WordPress real
durante la adaptación documental.

---

## 9. Mantenimiento

- **Fuentes:** para añadir pesos, coloca el `.woff2` en `assets/fonts/` y declara el
  `fontFace` en `theme.json`.
- **Colores:** edítalos en `theme.json → settings.color.palette`. Se propagan a todo.
- **Teléfono:** edita `config/contact.json`, valida el JSON, purga la caché y revisa el
  contenido persistido que conserve valores antiguos.
- **Caché:** tras cambiar `theme.json` o `config/contact.json`, si no ves cambios, limpia la
  caché de objetos o desactiva/activa el tema.
- **Versionado:** sube `Version` en `style.css` y la constante `ACADEMY_VERSION` en
  `functions.php` para forzar refresco de CSS/JS.

Ver `DESIGN_IMPLEMENTATION.md` para el mapeo diseño→código y `QA.md` para la checklist.
