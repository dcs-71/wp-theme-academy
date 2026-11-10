# Roadmap — Academy by Total Therapy

**Estado de la adaptación FALEXOM**: aprobada por la persona responsable el 2026-11-10. El
cierre autorizado incluye commit, fast-forward a `main`, tag anotado
`falexom-adoption-v1.0.0` y publicación de `main` y del tag. La aprobación es documental: no
implica aceptación funcional ni verificación de compatibilidad.

## Capacidades actuales

### Tema `academy`

| Capacidad | Implementación observada | Documentación |
|---|---|---|
| Landing FSE con patrones editables | Hero, ruta de niveles, promo, temario, docente, material, testimonios, blog/eventos, FAQ, aliados, alumnos y eventos | `academy/README.md` §4 y §6; `academy/DESIGN_IMPLEMENTATION.md` |
| Programación de fechas | Valores por defecto en `academy_schedule_defaults()`, shortcodes y filtro `academy_schedule` | `academy/README.md` §4; `academy/functions.php` |
| Alumnos formados | Plantilla `page-alumnos.html`, datos por defecto y filtro `academy_alumni` | `academy/README.md` §4; `academy/functions.php` |
| SEO del tema | Título, meta description, canonical de portada, Open Graph, Twitter Cards, iconos y JSON-LD; se aparta si hay plugin SEO | `academy/README.md` §8; `academy/functions.php` |
| Teléfono de contacto configurable | `config/contact.json` como fuente única, helpers de validación, bindings/shortcodes y `telephone` del JSON-LD | `academy/README.md` §3; `academy/QA.md` §10; `specs/001-contact-phone-config/spec.md` |
| Hero Slider | Bloque propio con slides basadas en Cover, accesibilidad y JS sin librerías externas | `academy/README.md` §5; `academy/blocks/hero-slider/` |
| Sistema visual | Tokens, tipografía Poppins auto-alojada y estilos globales en `theme.json` | `academy/DESIGN_IMPLEMENTATION.md` §1 y §4 |
| Accesibilidad y rendimiento | Foco visible, ARIA, teclado, `prefers-reduced-motion`, fuentes locales y carga diferida | `academy/DESIGN_IMPLEMENTATION.md` §6; `academy/QA.md` §7–§8 |

### Plugin `academy-programacion`

| Capacidad | Implementación observada | Documentación |
|---|---|---|
| Menú Academy | Menú lateral con «Fechas» y «Alumnos formados» | `academy-programacion/readme.txt`; `academy-programacion/academy-programacion.php` |
| Programación administrable | Opción `academy_programacion`, validación, guardado y purga de cachés | `academy-programacion/readme.txt`; `academy-programacion/academy-programacion.php` |
| Alumnos formados | CPT `academy_alumno`, metadatos, columnas, importación inicial y capacidad | `academy-programacion/readme.txt`; `academy-programacion/includes/alumnos.php` |

## Dependencias conocidas

| Dependencia | Estado |
|---|---|
| WordPress 6.5+ | Declarada en `academy/style.css` y en el plugin; no verificada en esta adaptación |
| PHP 7.4+ | Declarada en `academy/style.css` y en el plugin; el entorno local usa PHP 8.5.5 |
| Tema `academy` | El plugin declara requerir la versión 1.7.0 o superior |
| Plugin `academy-programacion` | Opcional para el tema; el tema funciona con sus valores por defecto |
| Build, Composer o npm | No hay configuración de build ni dependencias de producto |
| SpecKit | Inicializado con la CLI 1.2.3 para la integración OpenCode |

## Verificación y aceptación

- **Implementación observada**: el tema y el plugin existen en el repositorio y su estructura
  coincide con la documentación revisada.
- **Verificación técnica**: el cierre de US-001 incluyó comprobaciones focalizadas de sintaxis
  PHP/JSON, referencias y diff. `academy/QA.md` conserva además un registro histórico de
  validaciones automáticas y una checklist manual; no hay logs ni CI que permitan reproducir
  esas marcas. No se ejecutaron suites E2E ni verificaciones de compatibilidad WordPress/PHP.
- **Aceptación humana**: US-001 fue aceptada funcional y visualmente por la persona
  responsable el 2026-11-10, incluido el ajuste `phone.e164` → `phone.number`. No se declaran
  aceptaciones de otros incrementos.
- **Aprobación de la adaptación**: documental, 2026-11-10; no sustituye la aceptación
  funcional/visual de US-001 ni las verificaciones técnicas no ejecutadas.
- **Integración y publicación**: US-001 está integrada en `main` por fast-forward. El cierre se
  publica con el tag anotado `contact-phone-config-v1.0.0`; no se publican otras ramas ni tags.

## Adaptación FALEXOM

| Elemento | Estado |
|---|---|
| SpecKit | Inicializado en `.specify/` para OpenCode; comandos nativos en `.opencode/commands/` |
| Constitución | Aprobada el 2026-11-10 en `.specify/memory/constitution.md`; versión 1.0.0 |
| Instrucciones operativas | `AGENTS.md` creado y aprobado el 2026-11-10 |
| Roadmap | Este documento |
| Correcciones documentales | Aplicadas en README (raíz y tema), QA y DESIGN_IMPLEMENTATION |
| SPEC e historias | `001-contact-phone-config` y `US-001` cerradas; aceptación funcional/visual confirmada el 2026-11-10 |
| Revisión final de la adaptación | Aprobada el 2026-11-10 |

## Próximo incremento funcional

**Por definir.** US-001 está cerrada e integrada. No se asignan prioridades, fechas ni nuevas
funcionalidades. El siguiente incremento se preparará con su propia SPEC e historia.

## Documentación canónica

- [`README.md`](../README.md) — visión general e instalación.
- [`academy/README.md`](../academy/README.md) — manual del tema.
- [`academy/DESIGN_IMPLEMENTATION.md`](../academy/DESIGN_IMPLEMENTATION.md) — mapeo histórico
  diseño→código.
- [`academy/QA.md`](../academy/QA.md) — checklist de validación.
- [`academy-programacion/readme.txt`](../academy-programacion/readme.txt) — documentación del
  plugin.
- [`AGENTS.md`](../AGENTS.md) — instrucciones operativas para IA.
- [`.specify/memory/constitution.md`](../.specify/memory/constitution.md) — constitución
  aprobada.
