# DESIGN_IMPLEMENTATION.md — Academy · Formación en Punción Seca

Mapeo entre el **brochure "Formación Internacional en Punción Seca 2026"** (PDF de 11
páginas) y la implementación en este Block Theme. Reutiliza la arquitectura y los tokens
del tema base *Academy by Total Therapy*.

---

## 1. Sistema de diseño

Hereda `theme.json` del tema base. Paleta principal: **navy `#283078`**, **azul
`#5667FF`**, **naranja `#FF4F26`**, **midnight `#050039`** (fondos oscuros del brochure),
**ink `#151515`** (footer), **gray `#EFEFEF`**. Tipografía **Poppins** auto-alojada.

---

## 2. Mapeo brochure → código

| Página(s) del brochure | Sección web | Archivo |
|------------------------|-------------|---------|
| 1 (portada) | Hero oscuro + alianzas | `patterns/hero-puncion.php` |
| 2 (equipo docente) | Chantal Páucar + 4 destacados | `patterns/equipo-docente.php` |
| 3 (ruta de formación) | Timeline de 3 niveles | `patterns/ruta-formacion.php` |
| 4–5 (nivel básico) | Temario + peligros + músculos 1–17 + 20 h | `patterns/nivel-basico.php` |
| 6–7 (nivel intermedio) | Músculos 18–59 + cita + 30 h | `patterns/nivel-intermedio.php` |
| 8–9 (nivel avanzado) | Temario + músculos 60–101 + 30 h | `patterns/nivel-avanzado.php` |
| 10 (programación) | 3 tarjetas + material + dirección | `patterns/programacion.php` |
| 11 (contraportada) | Cierre + redes + web | `patterns/cta-final.php` |

`templates/front-page.html` compone los 8 patterns en orden. `parts/header.html` y
`parts/footer.html` adaptan navegación y datos de contacto al brochure.

---

## 3. Componentes a medida (`assets/css/components.css`)

- **Timeline de ruta** (`.ruta-timeline`/`.ruta-step`): línea con dots numerados por nivel.
- **Tarjetas de destacados** (`.highlight-card`): icono en círculo navy + título + texto.
- **Listas de músculos** (`.muscle-list`): `<ol>` en 3 columnas con `start` por nivel y
  marcadores naranja; responsive a 2 / 1 columnas.
- **Badges** (`.nivel-badge`, `.hours-badge`) y **check-list** (`.check-list`) con palomita
  naranja.
- **Tarjetas de programación** (`.prog-card`): cabecera de color por nivel + fechas/horario.
- Hero y cierre usan `core/cover` (markup canónico) sobre fondos `midnight`.

---

## 4. Decisiones

1. **Reutiliza la arquitectura** del tema base (mismo `theme.json`, fuentes, header/footer,
   bloque `hero-slider`, CSS base) — solo cambian patrones y contenido.
2. **Contenido fiel al brochure**: textos, fechas, 101 músculos, temarios y datos de
   contacto transcritos del PDF; todo editable desde Gutenberg.
3. **Imágenes reales** extraídas del propio PDF como demo (anatomía, retrato de la docente,
   material, mapa, logos de aliados).
4. **Sin librerías**: iconos en SVG inline / CSS; listas y grids con CSS nativo.

---

## 5. Validación

Frontend renderizado con Chrome headless usando el CSS real del tema y comparado contra el
brochure: hero, equipo docente, ruta, los tres niveles con sus músculos, programación y
material académico coinciden. El cierre usa `core/cover` estándar.
