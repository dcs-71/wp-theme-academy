=== Academy · Programación y Alumnos ===
Contributors: totaltherapy
Requires at least: 6.5
Tested up to: 6.8
Requires PHP: 7.4
Stable tag: 1.2.0
License: GPLv2 or later

Gestiona desde el escritorio de WordPress las fechas de la Formación Internacional en Punción Seca y los alumnos formados.

== Descripción ==

Añade el menú **Academy** a la barra lateral del escritorio, con dos submenús: **Fechas** y **Alumnos formados**.

= Fechas =

Para cada nivel (Básico, Intermedio y Avanzado) puedes:

* Indicar las fechas de clase de la próxima edición (una o varias).
* Mostrar «Próximamente» mientras no haya fechas confirmadas (el texto se puede cambiar).

Las fechas aparecen solas en la web, con formato en español («30 y 31 de octubre»):

* Portada → tarjetas de «Ruta de formación».
* Portada → «Así se vive la formación».
* Página de eventos.
* Datos estructurados del curso para Google (fecha de inicio y fin).

Cuando la última fecha de un nivel pasa, la web vuelve a mostrar «Próximamente» automáticamente.

= Alumnos =

En **Academy → Alumnos formados**, cada alumno tiene nombre con su grado (p. ej. «Lic. Ana Pérez»), foto (imagen destacada, cuadrada y con fondo blanco), colegiatura CTMP, formación alcanzada (completa, Intermedio o Básico) y grupo opcional (p. ej. «2026-II»). El orden se fija en «Atributos → Orden». Se muestran en la página **Alumnos** (/alumnos/).

La primera vez que entras al escritorio con el plugin activo, importa los 6 alumnos de la web anterior con sus fotos y crea la página «Alumnos» si no existe.

Requiere el tema **Academy by Total Therapy** (1.7.0 o superior), que es quien pinta las fechas y los alumnos.

== Instalación ==

1. Plugins → Añadir nuevo → Subir plugin → `academy-programacion.zip` → Activar.
2. Ve a **Academy → Fechas**, ajusta las fechas y pulsa **Guardar programación**.
3. Revisa los alumnos en **Academy → Alumnos formados** (botón «Añadir alumno» para crear uno nuevo).

Pueden editar la programación y los alumnos los administradores y los editores.

== Shortcodes ==

Los aporta el tema y usan esta programación:

* `[academy_fechas nivel=basico]` — fechas del nivel o «Próximamente».
* `[academy_fechas nivel=basico mostrar=primera]` — solo la primera fecha.
* `[academy_fechas_tarjeta nivel=basico]` — recuadro «Fechas» de las tarjetas.
* `[academy_fecha_insignia nivel=basico]` — insignia con día y mes.
* `[academy_alumnos]` — cuadrícula de alumnos formados.

== Para desarrolladores ==

* Opción: `academy_programacion`. Tipo de contenido de alumnos: `academy_alumno` (metadatos `_academy_ctmp`, `_academy_formation`, `_academy_group`).
* Filtros del tema que alimenta: `academy_schedule` y `academy_alumni`.
* Acción tras guardar: `academy_programacion_updated` (también vacía las cachés de WP Rocket, W3 Total Cache, WP Super Cache, LiteSpeed, SiteGround y Autoptimize).
* Capacidad: filtro `academy_programacion_capability` (por defecto `edit_pages`).

== Changelog ==

= 1.2.0 =
* Un único menú «Academy» en la barra lateral con los submenús «Fechas» y «Alumnos formados».

= 1.1.0 =
* Menú «Alumnos» para gestionar los alumnos formados; importación inicial de los 6 alumnos de la web anterior y creación de la página «Alumnos».

= 1.0.0 =
* Primera versión: fechas de cada nivel o «Próximamente».
