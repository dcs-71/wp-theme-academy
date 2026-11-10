# Academy by Total Therapy — Constitución

**Estado**: Aprobada por la persona responsable el 2026-11-10.

Esta constitución define los principios y restricciones duraderos del tema `academy` y del
plugin `academy-programacion`. No sustituye la documentación operativa: `README.md`,
`academy/README.md`, `academy/DESIGN_IMPLEMENTATION.md` y `academy/QA.md` conservan el
detalle de instalación, diseño y verificación.

## Core Principles

### I. Separación de responsabilidades entre tema y plugin

El tema `academy` es responsable de la presentación: plantillas, partes, patrones, tokens de
`theme.json`, el bloque Hero Slider y la capa de SEO del tema. El plugin
`academy-programacion` es responsable de la administración de la programación y de los
alumnos formados.

- El tema **DEBE** poder renderizar la landing sin el plugin.
- La lógica de negocio compleja —pagos, reservas, inscripciones o CPT ajenos a la
  presentación— **NO DEBE** incorporarse al tema.
- Los cambios **DEBEN** respetar esta separación y no convertir al plugin en un requisito
  oculto del tema.

**Razón**: es una decisión documentada en `README.md`, `academy/README.md` §7 y
`academy/DESIGN_IMPLEMENTATION.md` §4, y sostiene la instalación independiente del tema.

### II. Contratos de integración explícitos

La integración entre tema y plugin se realiza mediante contratos documentados:

- Filtros `academy_schedule` y `academy_alumni`.
- Shortcodes de programación (`academy_fechas`, `academy_fechas_tarjeta`,
  `academy_fecha_insignia`) y de alumnos (`academy_alumnos`).
- Valores por defecto del tema cuando el plugin no está activo.

El plugin **DEBE** inyectar datos mediante los filtros, no modificando plantillas ni
patrones. Los patrones **DEBEN** seguir usando los shortcodes para las fechas dinámicas.
Cambiar un contrato **DEBE** actualizar la documentación y verificar la compatibilidad entre
tema y plugin.

**Razón**: el funcionamiento independiente y la integración actual están documentados en
`academy/README.md` y en las cabeceras de `academy/functions.php` y del plugin.

### III. Seguridad por defecto

- Las salidas **DEBEN** escaparse con `esc_url`, `esc_html`, `esc_attr` o la función
  adecuada al contexto.
- Los archivos PHP **DEBEN** proteger el acceso directo con la comprobación de `ABSPATH`.
- Las acciones administrativas del plugin **DEBEN** comprobar capacidades y nonces antes de
  guardar datos.
- Los datos de entrada **DEBEN** validarse y sanearse antes de persistirse.
- **NO DEBE** almacenarse ni exponerse ningún secreto, token o credencial en el repositorio.

**Razón**: son controles respaldados por `academy/QA.md` §9 y por el código actual del plugin.

### IV. Accesibilidad y rendimiento como requisitos de presentación

- La interfaz **DEBE** mantener foco visible, navegación por teclado y controles accesibles.
- El slider **DEBE** conservar sus roles ARIA, navegación con flechas, swipe y respeto a
  `prefers-reduced-motion`.
- Las fuentes **DEBEN** servirse localmente; no se introducen llamadas a Google Fonts.
- El JavaScript **DEBE** cargarse solo cuando sea necesario y evitar dependencias pesadas o
  jQuery innecesario.
- Las imágenes **DEBEN** mantener carga diferida y dimensiones explícitas cuando corresponda.

**Razón**: son decisiones documentadas en `academy/DESIGN_IMPLEMENTATION.md` §6 y
`academy/QA.md` §7–§8.

### V. Cambios proporcionales y reutilización de convenciones

- Los cambios **DEBEN** ser proporcionales al problema y reutilizar las convenciones
  existentes: `theme.json`, plantillas, partes, patrones, filtros y shortcodes.
- El tema **DEBE** mantenerse como Block Theme FSE, sin page builders externos.
- **NO DEBE** introducirse una dependencia, un paso de build o una nueva abstracción sin una
  necesidad demostrada y aprobación explícita.
- La documentación **DEBE** prepararse para el incremento que se va a realizar, no
  reconstruirse retroactivamente para todo el sistema.
- Las decisiones importantes no confirmadas **DEBEN** marcarse como pendientes, no
  presentarse como aprobadas.

**Razón**: es la convención documentada en `academy/DESIGN_IMPLEMENTATION.md` §4 y el
principio de trabajo incremental de FALEXOM.

## Restricciones técnicas y compatibilidad

### Decisiones documentadas

- El tema se implementa como Block Theme FSE y no usa Elementor, WPBakery ni page builders
  externos.
- `theme.json` concentra colores, tipografía, spacing, layout y estilos globales.
- Los patrones se implementan en PHP para reutilizar imágenes y escapar salidas.
- El tema incluye una capa de SEO propia: título, meta description, canonical de portada,
  Open Graph, Twitter Cards, iconos y datos estructurados JSON-LD. Si detecta Yoast, Rank
  Math, AIOSEO o SEOPress, se aparta y deja que el plugin gestione esas etiquetas.
- El plugin requiere el tema Academy by Total Therapy 1.7.0 o superior, según su propio
  `readme.txt`.

### Características observadas, no permanentes

- El número actual de patrones, plantillas y bloques propios es una fotografía del estado
  actual, no un límite permanente.
- La ausencia actual de un paso de build, de Composer/npm y de dependencias externas es una
  característica observada. Introducir cualquiera de ellos requiere justificación y
  aprobación; no se prohíbe de forma absoluta.
- El número de niveles, alumnos o fechas de ejemplo no forma parte de la constitución.

### Pendiente de confirmar

- La compatibilidad real con WordPress 6.5+ y PHP 7.4+ está declarada por el proyecto, pero
  no se ha verificado en esta adaptación.
- El estado de publicación de las fechas y de los datos de alumnos vive fuera del
  repositorio y no se puede verificar desde él.
- La aceptación funcional y visual del sistema existente no está registrada en el
  repositorio; corresponde a la persona responsable.

## Flujo de desarrollo y aprobaciones

- SpecKit se utiliza para **Constitution → Specify → Clarify** cuando corresponda.
- Cada funcionalidad o fix independiente **DEBE** tener una historia pequeña con alcance y
  criterios comprobables.
- Las historias suficientes dentro de una SPEC pueden reutilizarse sin duplicarlas.
- La aprobación humana de la historia **DEBE** preceder a Build.
- Las tareas se descomponen siempre; `plan.md` y `tasks.md` no son obligatorios.
- Build **DEBE** realizar verificaciones técnicas focalizadas.
- Las suites extensas y las pruebas funcionales/E2E automatizadas requieren autorización,
  salvo controles obligatorios aplicables.
- La aceptación funcional y visual corresponde a la persona responsable.
- Las revisiones adicionales de QA y seguridad **DEBEN** ser proporcionales al riesgo; los
  controles críticos se atienden desde el diseño y Build.
- La aprobación de una historia **NO** concede autorización automática para commit, merge o
  push.
- Los comandos concretos, los límites operativos y las reglas Git se mantienen en
  `AGENTS.md`; esta constitución no los duplica.

## Governance

Esta constitución prevalece sobre prácticas que la contradigan. Las enmiendas requieren
justificación, revisión humana y actualización de la versión.

- **MAJOR**: eliminación o redefinición incompatible de principios o restricciones.
- **MINOR**: nuevo principio, sección o ampliación material de la guía.
- **PATCH**: aclaraciones, correcciones de redacción o refinamientos no semánticos.

La conformidad se revisa al preparar cada historia y al cerrar cada incremento. Si una
decisión no está confirmada, se marca como pendiente y no se presenta como aprobada.

La ratificación de esta constitución no implica que la compatibilidad con WordPress 6.5+ y
PHP 7.4+ ni la aceptación funcional/visual hayan sido verificadas; esas limitaciones siguen
en «Pendiente de confirmar».

**Version**: 1.0.0 | **Ratified**: 2026-11-10 | **Last Amended**: 2026-11-10
