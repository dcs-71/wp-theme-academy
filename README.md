# Academy by Total Therapy — WordPress Block Theme

Block Theme (Full Site Editing) para Academy by Total Therapy. Compatible con el Site
Editor y Gutenberg, sin page builders ni librerías pesadas. Tipografía Poppins auto-alojada.

## Tema

| Carpeta | Descripción |
|---------|-------------|
| [`academy/`](academy/) | Tema: landing de la Formación Internacional en Punción Seca (hero, ruta de formación, temario, docente, FAQ…). |
| [`academy-programacion/`](academy-programacion/) | Plugin: menú **Academy** con los submenús **Fechas** (cada nivel o «Próximamente») y **Alumnos formados** (página /alumnos/), sin tocar el tema. |

## Documentación

| Documento | Uso |
|-----------|-----|
| [`AGENTS.md`](AGENTS.md) | Instrucciones operativas para herramientas de IA y flujo FALEXOM. |
| [`.specify/memory/constitution.md`](.specify/memory/constitution.md) | Principios y restricciones duraderos; aprobada el 2026-11-10 (versión 1.0.0). |
| [`docs/roadmap.md`](docs/roadmap.md) | Capacidades actuales, dependencias y estado de la adaptación. |
| [`academy/README.md`](academy/README.md) | Instalación, edición y mantenimiento del tema. |
| [`academy/DESIGN_IMPLEMENTATION.md`](academy/DESIGN_IMPLEMENTATION.md) | Mapeo histórico diseño→código. |
| [`academy/QA.md`](academy/QA.md) | Checklist de validación. |
| [`academy-programacion/readme.txt`](academy-programacion/readme.txt) | Documentación del plugin. |

SpecKit está inicializado para OpenCode; los comandos nativos viven en `.opencode/commands/`.

Para instalar el tema: comprime la carpeta `academy/` en un `.zip` y súbelo en **Apariencia →
Temas → Añadir nuevo → Subir tema**, o copia la carpeta dentro de `wp-content/themes/`.

Para instalar el plugin: comprime `academy-programacion/` y súbelo en **Plugins → Añadir
nuevo → Subir plugin**. El tema funciona sin él (usa las fechas por defecto de
`academy_schedule_defaults()` en `functions.php`).

Consulta `academy/README.md`, `academy/DESIGN_IMPLEMENTATION.md` y `academy/QA.md` para
detalles de instalación, edición y validación.
