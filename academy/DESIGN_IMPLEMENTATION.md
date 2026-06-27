# DESIGN_IMPLEMENTATION.md — Academy by Total Therapy

Mapeo entre el diseño (PSD: `Landing_Academy_desktop_1`, `_desktop_2`, `Mobile`) y la
implementación en el Block Theme. **Toda la dirección visual se derivó directamente de
los PSD** (colores muestreados píxel a píxel, layout, tipografía y componentes).

---

## 1. Sistema de diseño (tokens)

Definidos en `theme.json`. Colores extraídos por muestreo del PSD.

### Colores (`settings.color.palette`)
| Slug     | HEX       | Uso en el diseño |
|----------|-----------|------------------|
| base     | `#FFFFFF` | Fondo principal |
| navy     | `#283078` | Titulares, textos, precios, footer de cards, overlays |
| blue     | `#5667FF` | Header, enlaces, acentos, botón promo |
| orange   | `#FF4F26` | Botones CTA (pill) |
| ink      | `#151515` | Footer |
| gray     | `#EFEFEF` | Fondo sección testimonios |
| cream    | `#F2EFEA` | Tonos claros |
| muted    | `#8A8FA8` | Subtítulos y texto atenuado |
| midnight | `#050039` | Extremo oscuro de gradientes |

Gradientes: `promo` (azul), `app` (azul→navy→midnight), `overlay-blue`.

### Tipografía
- **Poppins** (300–900), auto-alojada en `/assets/fonts` (sin Google Fonts en producción).
  Elegida por coincidencia visual con la tipografía geométrica del PSD.
- H1/H2 700, H3 600. Antetítulos y subtítulos en `muted`.

### Spacing
Escala 20→70 (0.5rem → 5.5rem) para paddings de sección y gaps.

---

## 2. Mapeo sección → archivo (Landing, desktop_1)

| Sección del PSD                         | Implementación |
|-----------------------------------------|----------------|
| Header azul (logo, nav, login, búsqueda)| `parts/header.html` |
| Hero (foto clara + título navy + CTA)   | `patterns/hero-slider.php` → bloque `academy/hero-slider` |
| Grid de categorías 4×2 + botón navy     | `patterns/category-grid.php` |
| Banner promo azul (overlay + CTA)       | `patterns/cta-banner.php` |
| Cursos: tabs + tarjetas                 | `patterns/courses-grid.php` |
| Testimonios (avatares + cita)           | `patterns/testimonials.php` |
| Blog/Eventos (destacado + 2 mini)       | `patterns/blog-events-cards.php` |
| App (gradiente + badges + mockup)       | `patterns/app-download-banner.php` |
| Partners (logos atenuados)              | `patterns/partners-logos.php` |
| Footer negro (4 cols + badges + social) | `parts/footer.html` |

`templates/front-page.html` compone los patrones en el orden del PSD.

### Página Eventos (desktop_2 / mobile)
| Elemento                                | Implementación |
|-----------------------------------------|----------------|
| Hero interior (foto clara + breadcrumb) | `parts/hero-internal.html` |
| Lista de eventos sobre fondo navy       | `templates/page-eventos.html` + `patterns/events-list.php` |

---

## 3. Componentes a medida (CSS en `assets/css/components.css`)

- **Tarjeta de curso** (`.card--course`): media con badge superpuesto, profesor, título,
  estrellas, divisor y fila de meta (alumnos, duración con iconos SVG) + precio.
- **Tabs de cursos** (`.course-tabs`): pestaña activa con subrayado navy.
- **Tarjeta de categoría** (`.category-card`): cover con overlay navy y texto centrado.
- **Blog destacado** (`.blog-featured`): imagen + overlay degradado + badge de fecha
  flotante + contenido inferior; mini-cards (`.blog-mini`) imagen+texto.
- **Store badges** (`.store-badge`): App Store / Google Play con iconos enmascarados en CSS
  (sin imágenes), reutilizados en footer y sección App.
- **Lista de eventos** (`.event-row`): imagen con badge + cuerpo blanco sobre navy + meta
  con iconos + paginación.

---

## 4. Decisiones de arquitectura

1. **Block Theme puro (FSE)**, sin page builders.
2. **theme.json** concentra colores, tipografía, spacing, layout y estilos globales.
3. **Patrones en PHP** para reutilizar imágenes del tema (`get_theme_file_uri`), escapar
   salidas (`esc_url/esc_html/esc_attr`) y generar listas con bucles (DRY).
4. **Un bloque personalizado** (`academy/hero-slider`): el carrusel necesita comportamiento
   (JS) y edición de varias diapositivas. El resto son bloques nativos + CSS.
5. **Slider sin librerías** (~2KB vanilla): autoplay, dots, flechas, swipe, teclado,
   `prefers-reduced-motion`. Evita Swiper/Splide (reglas 8/9).
6. **Bloque sin build**: `index.js`/`view.js` usan globales `wp.*` y JS estándar.
7. **Iconos en CSS/SVG inline** (badges de tienda, meta de cursos/eventos): cero peticiones
   extra, sin librería de iconos.
8. **Fuentes auto-alojadas** por rendimiento y privacidad.

---

## 5. Diferencias intencionales respecto al PSD

- Se mantienen los textos *Lorem ipsum* del PSD como contenido de demostración; son
  totalmente editables desde WordPress.
- Las **imágenes son placeholders SVG** neutros; deben reemplazarse por la fotografía real
  (la portada del PSD usa foto clínica con overlay claro).
- El **logo** usa el bloque *Título del sitio* como marca de texto; sustitúyelo por el
  bloque *Logotipo del sitio* subiendo el logo real (no se incluyen assets de marca).

---

## 6. Accesibilidad y rendimiento

- Foco visible global (`:focus-visible`, azul).
- Slider con roles ARIA, teclado y `prefers-reduced-motion`.
- Hover de tarjetas y scroll suave se desactivan con reduced-motion.
- Sin jQuery; JS propio mínimo; CSS dividido y versionado; imágenes `loading="lazy"`.

---

## 7. Cómo se validó el diseño

Se renderizó el frontend con Chrome headless usando el CSS real del tema y se comparó
visualmente contra los tres PSD (header, hero, categorías, promo, cursos, testimonios,
blog, app, partners, footer y página de eventos).
