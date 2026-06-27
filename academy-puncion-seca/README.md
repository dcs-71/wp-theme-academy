# Academy · Formación en Punción Seca — WordPress Block Theme

Tema de bloques (Full Site Editing) que convierte el **brochure "Formación Internacional
en Punción Seca"** de Academy by Total Therapy en una landing editable. Comparte la misma
arquitectura que el tema base *Academy by Total Therapy*, pero su contenido y patrones
reproducen el brochure (dirigido por Mg. Chantal Páucar).

Compatible con el **Site Editor** y **Gutenberg**. Sin Elementor ni page builders. Sin
librerías pesadas. Tipografía **Poppins** auto-alojada.

---

## 1. Requisitos

| Requisito | Versión mínima |
|-----------|----------------|
| WordPress | 6.5 |
| PHP       | 7.4 |

---

## 2. Instalación

1. Comprime la carpeta `academy-puncion-seca/` en un ZIP (o usa el ZIP entregado).
2. WordPress → **Apariencia → Temas → Añadir nuevo → Subir tema** → instala y **Activa**.
3. **Ajustes → Lectura → Tu página de inicio muestra → Una página estática** y elige una
   página vacía "Inicio". El tema usa `front-page.html` con toda la landing del brochure.

> Coexiste sin problemas con el tema base *Academy by Total Therapy*: son dos temas
> independientes (carpetas y nombres distintos).

---

## 3. Secciones de la landing (orden del brochure)

| # | Sección | Pattern |
|---|---------|---------|
| 1 | Hero oscuro: título, docente, CTA, alianzas (CTMP · Travell & Simons) | `academy-puncion/hero` |
| 2 | Equipo docente: Mg. Chantal Páucar + 4 áreas destacadas | `academy-puncion/equipo-docente` |
| 3 | Ruta de formación: timeline Básico/Intermedio/Avanzado | `academy-puncion/ruta-formacion` |
| 4 | Nivel Básico: temario, peligros, músculos 1–17, 20 h | `academy-puncion/nivel-basico` |
| 5 | Nivel Intermedio: músculos 18–59, cita Janet Travell, 30 h | `academy-puncion/nivel-intermedio` |
| 6 | Nivel Avanzado: temario, músculos 60–101, 30 h | `academy-puncion/nivel-avanzado` |
| 7 | Programación + material académico + dirección | `academy-puncion/programacion` |
| 8 | Cierre: "Excelencia clínica…" + redes + web | `academy-puncion/cta-final` |

---

## 4. Cómo editar (sin tocar código)

| Quiero cambiar… | Dónde |
|-----------------|-------|
| Header / Footer | **Apariencia → Editor → Patrones → Partes de plantilla** |
| Fechas, horarios, textos, músculos | Abre la página de inicio en el editor y edita el bloque/lista |
| Colores y tipografía global | **Apariencia → Editor → Estilos** |
| Reinsertar una sección | Botón **+ → Patrones → Academy** |
| Logo | Sustituye el *Título del sitio* por el bloque *Logotipo del sitio* y sube el logo |

Las listas de músculos y de temario son bloques de lista nativos: añade, quita o reordena
ítems directamente. Las fechas/horarios viven en los patterns `programacion` y `ruta`.

---

## 5. Imágenes

Las imágenes demo se extrajeron del propio brochure y están en `assets/images/`
(`hero-anatomy.jpg`, `chantal.jpg`, `chantal-materials.jpg`, `worldmap.jpg`,
`logo-ctmp.png`, `logo-travell.png`). Reemplázalas por las definitivas desde el editor.

---

## 6. Estructura

```
academy-puncion-seca/
├── style.css · functions.php · theme.json
├── templates/   front-page, index, page, single, 404, page-no-title
├── parts/       header, footer
├── patterns/    8 secciones del brochure (PHP)
├── blocks/hero-slider/   bloque de carrusel reutilizable (no usado en la home)
└── assets/      css · js · fonts (Poppins) · images (extraídas del brochure)
```

Ver `DESIGN_IMPLEMENTATION.md` (mapeo brochure→código) y `QA.md` (checklist).
