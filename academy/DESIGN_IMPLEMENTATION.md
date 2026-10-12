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

| Sección del PSD                          | Implementación | Contenido |
|------------------------------------------|----------------|-----------|
| Header azul (logo, nav, CTA)             | `parts/header.html` | Logo Academy blanco + botón *Inscríbete* |
| Hero (foto + degradado navy + CTA)       | `patterns/hero-slider.php` → bloque `academy/hero-slider` | 3 slides con fotos reales del Grupo 2026-II |
| Grid de tarjetas + botón navy            | `patterns/levels-grid.php` | Ruta de formación: Básico / Intermedio / Avanzado, con fechas y horario |
| Banner promo azul (overlay + CTA)        | `patterns/cta-banner.php` | «Formación que transforma. Impacto que perdura.» |
| Sección de contenidos                    | `patterns/program-content.php` | Temario completo (acordeón nativo) |
| Bloque a dos columnas                    | `patterns/instructor.php` | Mg. Chantal Páucar, directora académica |
| Banner con gradiente                     | `patterns/materials-banner.php` | Material académico y de práctica incluido |
| Testimonios (avatares + cita)            | `patterns/testimonials.php` | Cita de respaldo científico (Travell) |
| Blog/Eventos (destacado + 2 mini)        | `patterns/blog-events-cards.php` | «Así se vive la formación» |
| Partners (logos)                         | `patterns/partners-logos.php` | Seminarios Travell &amp; Simons |
| Footer negro (marca + 3 cols + panel CTA + social) | `parts/footer.html` | Ubicación, teléfono y reserva de vacante |

`templates/front-page.html` compone los patrones en el orden de la landing.

### Página Eventos (desktop_2 / mobile)
| Elemento                                | Implementación |
|-----------------------------------------|----------------|
| Hero interior (foto clara + breadcrumb) | `parts/hero-internal.html` |
| Lista de fechas sobre fondo navy        | `templates/page-eventos.html` + `patterns/events-list.php` (una fila por nivel) |

---

## 3. Componentes a medida (CSS en `assets/css/components.css`)

- **Tarjeta de nivel** (`.card--level`): media con etiqueta de horas superpuesta, antetítulo,
  título del nivel, descripción, bloque de fechas (o «Próximamente») y meta con iconos SVG
  (jornadas y rango de músculos).
- **Cifras resumen** (`.stat`): 80 horas · 101 músculos · 8 jornadas · 3 niveles.
- **Acordeón de temario** (`.program-item`): `<details>/<summary>` nativos, sin JS, con chevron
  animado y foco visible.
- **Credenciales de la docente** (`.credential`): rejilla 2×2 con barra lateral naranja.
- **Lista de material** (`.materials-list`): checks en CSS puro (SVG enmascarado, sin imágenes).
- **Blog destacado** (`.blog-featured`): imagen + overlay degradado + badge de fecha
  flotante + contenido inferior; mini-cards (`.blog-mini`) imagen+texto.
- **Lista de fechas** (`.event-row`): imagen con badge + cuerpo blanco sobre navy + meta
  con iconos.

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

- Los textos *Lorem ipsum* del PSD se sustituyeron por el **contenido real** de la Formación
  Internacional en Punción Seca (brochure 2026); todo sigue siendo editable desde WordPress.
- Las estructuras del PSD orientadas a catálogo (grid de categorías 4×2, tabs de cursos,
  precios/valoraciones y la sección de app móvil) se **reconvirtieron** a las secciones que
  la formación necesita: ruta de niveles, programación, temario y material incluido.
- Las **imágenes son fotografías reales** del Grupo 2026-II (día 1), optimizadas a medidas web en
  `assets/images/`. Ya no hay placeholders SVG.
- El **logo** se inserta como bloque *Imagen* con el archivo `logo-academy-blanco.png`
  incluido en el tema; puede cambiarse por el bloque *Logotipo del sitio* si se prefiere.

---

## 6. Accesibilidad y rendimiento

- Foco visible global (`:focus-visible`, azul).
- Slider con roles ARIA, teclado y `prefers-reduced-motion`.
- Hover de tarjetas y scroll suave se desactivan con reduced-motion.
- Sin jQuery; JS propio mínimo; CSS dividido y versionado; imágenes `loading="lazy"`.

---

## 7. Cómo se validó el diseño

Se renderizó el frontend con el CSS real del tema y se revisaron a 1440 px las secciones
nuevas (ruta de niveles, programación, temario, docente, material y testimonios), además de
la comparación original contra los tres PSD.
