=== Academy · Programación ===
Contributors: totaltherapy
Requires at least: 6.5
Tested up to: 6.8
Requires PHP: 7.4
Stable tag: 1.0.0
License: GPLv2 or later

Gestiona las fechas de la Formación Internacional en Punción Seca desde el escritorio de WordPress.

== Descripción ==

Añade el menú **Programación** al escritorio. Para cada nivel (Básico, Intermedio y Avanzado) puedes:

* Indicar las fechas de clase de la próxima edición (una o varias).
* Mostrar «Próximamente» mientras no haya fechas confirmadas (el texto se puede cambiar).

Las fechas aparecen solas en la web, con formato en español («30 y 31 de octubre»):

* Portada → tarjetas de «Ruta de formación».
* Portada → «Así se vive la formación».
* Página de eventos.
* Datos estructurados del curso para Google (fecha de inicio y fin).

Cuando la última fecha de un nivel pasa, la web vuelve a mostrar «Próximamente» automáticamente.

Requiere el tema **Academy by Total Therapy** (1.6.0 o superior), que es quien pinta las fechas.

== Instalación ==

1. Plugins → Añadir nuevo → Subir plugin → `academy-programacion.zip` → Activar.
2. Ve a **Programación** en el menú lateral, ajusta las fechas y pulsa **Guardar programación**.

Pueden editar la programación los administradores y los editores.

== Shortcodes ==

Los aporta el tema y usan esta programación:

* `[academy_fechas nivel=basico]` — fechas del nivel o «Próximamente».
* `[academy_fechas nivel=basico mostrar=primera]` — solo la primera fecha.
* `[academy_fechas_tarjeta nivel=basico]` — recuadro «Fechas» de las tarjetas.
* `[academy_fecha_insignia nivel=basico]` — insignia con día y mes.

== Para desarrolladores ==

* Opción: `academy_programacion`.
* Filtro del tema que alimenta: `academy_schedule`.
* Acción tras guardar: `academy_programacion_updated` (también vacía las cachés de WP Rocket, W3 Total Cache, WP Super Cache, LiteSpeed, SiteGround y Autoptimize).
* Capacidad: filtro `academy_programacion_capability` (por defecto `edit_pages`).

== Changelog ==

= 1.0.0 =
* Primera versión.
