# AGENTS.md — Instrucciones operativas

Este archivo es la guía operativa para herramientas de IA en este repositorio. No sustituye la
constitución, las specs ni la documentación del tema y del plugin.

**Estado**: adaptación FALEXOM y constitución aprobadas el 2026-11-10. La aprobación es
documental; no certifica compatibilidad técnica ni aceptación funcional/visual.

## Orden de lectura

1. `.specify/memory/constitution.md` — principios y restricciones duraderos.
2. `AGENTS.md` — este documento.
3. `docs/roadmap.md` — capacidades actuales, dependencias y estado.
4. SPEC aplicable: `specs/<id>-<nombre>/spec.md`.
5. Historia aplicable: dentro de la SPEC o en `specs/stories/US-XXX-<nombre>.md`.
6. `README.md` y `academy/README.md` — visión general, instalación y edición.
7. `academy/DESIGN_IMPLEMENTATION.md` y `academy/QA.md` — decisiones de diseño y checklist.
8. `academy-programacion/readme.txt` — solo si el cambio afecta al plugin.

Si no existe una SPEC o historia para el cambio, no se implementa: primero se prepara la
historia y se obtiene aprobación humana.

## Localizar la SPEC y la historia aplicables

- Si existe `specs/`, buscar con `find specs -maxdepth 3 -type f | sort`.
- La SPEC vivirá en `specs/<id>-<nombre>/spec.md`.
- La historia puede estar dentro de la SPEC o en `specs/stories/US-XXX-<nombre>.md`.
- Si ya existe una historia suficiente, reutilizarla; no duplicarla.
- No reconstruir historias de cambios ya entregados.

## Análisis y Build

- **Análisis**: leer, inspeccionar, diagnosticar y proponer. No modificar código ni datos.
- **Build**: solo después de la aprobación humana de la historia. Implementar el alcance
  aprobado con cambios proporcionales.
- No ejecutar `/speckit.plan`, `/speckit.tasks`, `/speckit.analyze` ni `/speckit.implement`
  automáticamente. El flujo ligero usa Constitution → Specify → Clarify; después FALEXOM
  continúa con historia aprobada, Build, verificación y aceptación.
- `plan.md` y `tasks.md` no son obligatorios. Las tareas siempre se descomponen, aunque no se
  creen esos archivos.

## Flujo FALEXOM

- SpecKit se utiliza para **Constitution → Specify → Clarify** cuando corresponda.
- Cada funcionalidad o fix independiente necesita una historia pequeña con alcance y criterios
  comprobables.
- Las historias suficientes dentro de una SPEC pueden reutilizarse sin duplicarlas.
- La aprobación humana de la historia precede a Build.
- Las tareas se descomponen siempre; `plan.md` y `tasks.md` no son obligatorios.
- Build realiza verificaciones técnicas focalizadas.
- Las suites extensas y las pruebas funcionales/E2E automatizadas requieren autorización,
  salvo controles obligatorios aplicables.
- La aceptación funcional y visual corresponde a la persona responsable.
- Las revisiones adicionales de QA y seguridad son proporcionales al riesgo; los controles
  críticos se atienden desde el diseño y Build.
- La aprobación de una historia no concede autorización automática para commit, merge o push.
- No se requieren agentes personalizados ni worktrees para aplicar FALEXOM.

## Comandos de verificación

Comandos respaldados por el proyecto y disponibles en el entorno local:

- **PHP lint**:
  `find . -name "*.php" -not -path "./.git/*" -print0 | xargs -0 -n1 php -l`
- **Sintaxis JS**:
  - `node --check academy/assets/js/navigation.js`
  - `node --check academy/blocks/hero-slider/index.js`
  - `node --check academy/blocks/hero-slider/view.js`
- **JSON**:
  - `jq empty academy/theme.json`
  - `jq empty academy/blocks/hero-slider/block.json`
- **WordPress funcional/visual**: seguir `academy/QA.md` en un WordPress 6.5+. No está
  automatizado en el repositorio.
- No ejecutar pruebas funcionales/E2E ni levantar servicios sin autorización.
- Registrar en la historia o en `QA.md` qué se ejecutó, con fecha, entorno y resultado.

## Límites operativos y protección de secretos

- No modificar el tema o el plugin fuera del alcance de la historia aprobada.
- No cambiar arquitectura, dependencias, versiones mínimas ni contratos sin SPEC y aprobación.
- No ejecutar migraciones, no alterar bases de datos, no levantar servicios y no tocar
  producción.
- No leer, imprimir ni commitear secretos, tokens, credenciales, `.env`, `wp-config.php` ni
  archivos de autenticación. Si se necesita un secreto, pedirlo por un canal seguro.
- No guardar credenciales en `.opencode/`, `.specify/`, documentación ni historias.
- No añadir CI, frameworks de pruebas, herramientas de calidad, agentes personalizados ni
  dependencias ajenas a la historia aprobada sin autorización.
- Mantener las comprobaciones de `ABSPATH`, el escapado de salidas, los nonces y las
  capacidades en cualquier cambio.

## Git y aprobaciones humanas

- No hacer commit, merge, push, tag ni reescritura de historial sin autorización explícita para
  esa operación.
- La aprobación de una historia no autoriza Git.
- Mantener los cambios en la rama de trabajo; no actualizar `main` ni cambiar la base
  automáticamente.
- Revisar el diff y los enlaces antes de entregar.
- No descartar ni sobrescribir trabajo ajeno.
- Los commits, si se autorizan, deben ser claros y limitados al alcance.

## Documentación

- Idioma: español, salvo que se indique otra cosa.
- Fuente única: no duplicar requisitos, checklists ni reglas entre constitución, AGENTS, specs
  y README.
- `academy/QA.md` es la checklist de verificación; `academy/DESIGN_IMPLEMENTATION.md` es el
  registro histórico de diseño y arquitectura.
- No crear una segunda constitución en `docs/`.
- No crear SPEC ficticias para completar la estructura.
- Los comandos de SpecKit viven en `.opencode/commands/`; su presencia no autoriza su
  ejecución.
