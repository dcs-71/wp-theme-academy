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
- **Verificación técnica**: `academy/QA.md` conserva un registro histórico de validaciones
  automáticas y una checklist manual. No hay logs ni CI en el repositorio que permitan
  reproducir esas marcas; no se reejecutaron durante esta adaptación documental.
- **Aceptación humana**: no está registrada en el repositorio. Corresponde a la persona
  responsable confirmarla; este roadmap no la declara.
- **Aprobación de la adaptación**: documental, 2026-11-10; no sustituye la aceptación
  funcional/visual ni la verificación técnica pendiente.
- **Integración y publicación**: se realizan en el cierre aprobado; la aprobación documental no
  certifica su resultado. Verificar el estado final en Git y en el remoto.

## Adaptación FALEXOM

| Elemento | Estado |
|---|---|
| SpecKit | Inicializado en `.specify/` para OpenCode; comandos nativos en `.opencode/commands/` |
| Constitución | Aprobada el 2026-11-10 en `.specify/memory/constitution.md`; versión 1.0.0 |
| Instrucciones operativas | `AGENTS.md` creado y aprobado el 2026-11-10 |
| Roadmap | Este documento |
| Correcciones documentales | Aplicadas en README (raíz y tema), QA y DESIGN_IMPLEMENTATION |
| SPEC e historias | No creadas todavía; se prepararán para el próximo incremento real |
| Revisión final | Aprobada el 2026-11-10 |

## Próximo incremento funcional

**Por definir.** No se asignan prioridades, fechas, funcionalidades ni SPEC históricas. Cuando
se elija un cambio real, se preparará una SPEC pequeña y su historia con alcance, criterios
comprobables y estado de aprobación.

## Documentación canónica

- [`README.md`](../README.md) — visión general e instalación.
- [`academy/README.md`](../academy/README.md) — manual del tema.
- [`academy/DESIGN_IMPLEMENTATION.md`](../academy/DESIGN_IMPLEMENTATION.md) — mapeo histórico
  diseño→código.
- [`academy/QA.md`](../academy/QA.md) — checklist de validación.
- [`academy-programacion/readme.txt`](../academy-programacion/readme.txt) — documentación del
  plugin.
- [`AGENTS.md`](../AGENTS.md) — instrucciones operativas para IA.
- [`.specify/memory/constitution.md`](../.specify/memory/constitution.md) — constitución en
  borrador.
