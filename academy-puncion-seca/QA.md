# QA.md — Checklist · Academy · Formación en Punción Seca

## 0. Validaciones automáticas ya ejecutadas

- [x] `theme.json` — JSON válido.
- [x] `blocks/hero-slider/block.json` — JSON válido.
- [x] `assets/js/navigation.js` — sintaxis válida (`node --check`).
- [x] Render del frontend con Chrome headless comparado contra el brochure.
- [ ] **PHP lint** — ejecutar en el servidor: `find . -name "*.php" -print0 | xargs -0 -n1 php -l`

## 1. Activación

- [ ] El tema aparece y se activa sin errores (con `WP_DEBUG` sin avisos PHP).
- [ ] Convive con el tema base *Academy by Total Therapy* sin conflicto.

## 2. Site Editor

- [ ] Header y footer editables como partes de plantilla.
- [ ] `front-page` muestra las 8 secciones del brochure en orden.

## 3. Patrones (Gutenberg)

- [ ] El insertor **(+) → Patrones → Academy** lista: Hero, Equipo docente, Ruta,
      Nivel Básico, Nivel Intermedio, Nivel Avanzado, Programación y Cierre.
- [ ] Cada pattern se inserta sin aviso de "contenido inválido".
- [ ] Textos, fechas, listas de músculos y temarios son editables.

## 4. Contenido del brochure

- [ ] Hero: título, "Dirigido por: Mg. Chantal Páucar", alianzas CTMP y Travell & Simons.
- [ ] Equipo docente: credenciales y 4 áreas destacadas correctas.
- [ ] Ruta: fechas Básico (31 Jul / 01 Ago), Intermedio (08/15/22 Ago), Avanzado (29 Ago / 03 / 10 Oct).
- [ ] Músculos: 1–17 (Básico, 20 h), 18–59 (Intermedio, 30 h), 60–101 (Avanzado, 30 h).
- [ ] Programación: 3 tarjetas + material académico + dirección (Av. Juan Pablo Fernandini 1550).
- [ ] Cierre: lema, redes y `academy.totaltherapysa.com`.

## 5. Responsive

- [ ] Desktop: músculos en 3 columnas, destacados en 4, programación en 3.
- [ ] Tablet: músculos 2 col, destacados 2 col, programación apilada.
- [ ] Móvil: todo a 1 columna; menú hamburguesa del header.

## 6. Rendimiento / accesibilidad

- [ ] Poppins servida localmente (sin Google Fonts en producción).
- [ ] Sin jQuery ni librerías externas; imágenes `loading="lazy"`.
- [ ] Foco visible; anclas (#docente/#ruta/#programacion) con `scroll-margin-top`.

## 7. Notas

- Reemplazar imágenes demo (extraídas del brochure) por las definitivas.
- Subir el logo real mediante el bloque *Logotipo del sitio*.
