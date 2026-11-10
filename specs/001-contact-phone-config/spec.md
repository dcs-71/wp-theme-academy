# Feature Specification: Centralización del teléfono de contacto

**Feature Branch**: `001-contact-phone-config`

**Created**: 2026-11-10

**Status**: Accepted — cerrada el 2026-11-10

**Input**: User description: "Centralizar en un archivo JSON el número de teléfono utilizado en todo el tema WordPress, que actualmente está hardcodeado, y poder cambiarlo desde un único lugar."

## Clarifications

### Session 2026-11-10

- No se identificaron preguntas adicionales que el repositorio no pudiera resolver sobre usos, formatos o mensajes. La historia detallada vive en [`specs/stories/US-001-centralize-contact-phone.md`](../stories/US-001-centralize-contact-phone.md).
- Contrato aprobado el 2026-11-10: JSON único, fallo seguro, migración manual del contenido persistido, eliminación de `ACADEMY_WHATSAPP` y `display` obligatorio con validación de dígitos.
- Compatibilidad verificada en el código fuente de WordPress 6.5: Block Bindings admite `core/button` con el atributo `url`; `core/navigation-link` no está entre los bloques compatibles de esa versión. Se usará un filtro de render focalizado para el enlace de navegación, sin elevar la versión mínima ni añadir dependencias.
- Ajuste de esquema 2026-11-10: la propiedad JSON es `phone.number`; no se añade compatibilidad con `phone.e164`. Los helpers públicos conservan sus nombres porque describen el formato E.164, no la clave del archivo.
- Aceptación funcional y visual confirmada por la persona responsable el 2026-11-10, incluido el ajuste de esquema. No se declaran verificaciones técnicas o de compatibilidad no ejecutadas.

## User Scenarios & Testing *(mandatory)*

### User Story 1 - Cambiar el teléfono desde un solo archivo (Priority: P1)

La persona responsable del tema edita un único archivo JSON y, tras recargar la web, todos los usos activos del teléfono de contacto —texto visible, enlaces de WhatsApp y datos estructurados— reflejan el valor configurado, sin editar plantillas, patrones ni código PHP.

**Why this priority**: elimina el riesgo de que el número quede desincronizado entre la constante, el header, el footer, los patrones y el SEO. Es la unidad mínima que entrega valor y puede validarse de forma independiente.

**Independent Test**: modificar el valor del JSON en un entorno WordPress 6.5+, recargar la portada y las páginas afectadas, y comprobar que el número visible, los enlaces de WhatsApp y el `telephone` del JSON-LD usan el nuevo valor; después restaurar la configuración.

**Acceptance Scenarios**:

1. **Given** una configuración JSON válida, **When** se cambian el teléfono canónico y su presentación visible, **Then** todos los usos activos del tema muestran el nuevo número y los enlaces se generan con los formatos correctos.
2. **Given** una configuración JSON ausente, inválida o vacía, **When** se carga la web, **Then** no aparece el teléfono anterior, no se generan enlaces de contacto incorrectos y no se producen errores PHP visibles.
3. **Given** una página con patrones ya insertados o una parte de plantilla personalizada en WordPress, **When** se cambia el JSON, **Then** la limitación de propagación automática está documentada y el contenido persistido se revisa o actualiza según el procedimiento de aceptación.

### Edge Cases

- El archivo JSON no existe o no es legible por el servidor web.
- El archivo contiene JSON inválido o una estructura distinta de la esperada.
- El teléfono canónico está vacío, no cumple el formato internacional o contiene caracteres no permitidos.
- El texto visible está vacío o no coincide con los dígitos del teléfono canónico.
- El contenido persistido en WordPress conserva URLs o textos antiguos que no pueden actualizarse automáticamente.
- La página o el objeto están en caché y siguen sirviendo el valor anterior después de editar el JSON.
- Un enlace `tel:` no existe hoy en el tema; si se incorpora uno, debe usar el mismo teléfono canónico.

## Requirements *(mandatory)*

### Functional Requirements

- **FR-001**: El tema MUST mantener el teléfono de contacto en un único archivo JSON versionado, sin panel administrativo ni opción en base de datos.
- **FR-002**: La configuración MUST distinguir el teléfono canónico en formato internacional y su representación visible, y ambos valores MUST ser obligatorios y coherentes entre sí.
- **FR-003**: El tema MUST validar la configuración antes de usarla. Si falta el archivo, el JSON es inválido o el teléfono está vacío, MUST aplicar un fallo seguro: no mostrar el número anterior, no generar enlaces incorrectos y no producir errores PHP visibles.
- **FR-004**: La representación visible MUST usar el texto configurado para visualización; los enlaces telefónicos, si se añaden, MUST usar el formato `tel:` con el teléfono canónico; los enlaces de WhatsApp MUST usar el teléfono canónico sin el prefijo `+`.
- **FR-005**: Los mensajes iniciales de WhatsApp MUST conservarse y seguir resolviéndose mediante el mecanismo actual, sin trasladarlos al JSON ni duplicarlos.
- **FR-006**: Todos los usos activos controlados por el tema MUST consumir la misma configuración: los helpers/funciones de WhatsApp, el JSON-LD, el header, el footer, los patrones con CTA y el texto visible del footer y las FAQ.
- **FR-007**: Los patrones y las partes de plantilla MUST usar mecanismos dinámicos nativos del tema o de WordPress 6.5+ para que una edición futura del JSON se refleje sin reescribir el número en cada archivo.
- **FR-008**: El contenido persistido en WordPress que ya contenga URLs o textos antiguos MUST tratarse explícitamente: no se promete propagación automática y se documentará el procedimiento de revisión, reinserción o actualización manual.
- **FR-009**: Si la configuración no es válida, el `telephone` del JSON-LD MUST omitirse y los componentes dependientes del teléfono MUST omitirse o quedar sin enlace, sin usar el número anterior como fallback silencioso.
- **FR-010**: El cambio MUST conservar el diseño, las clases, las etiquetas visibles y el comportamiento de los enlaces de WhatsApp existentes.
- **FR-011**: La documentación del tema MUST explicar dónde está el JSON, cómo editarlo, cómo validarlo, cómo purgar cachés y qué contenido persistido requiere revisión manual.
- **FR-012**: La aceptación funcional y visual MUST realizarla la persona responsable antes del cierre; la aprobación de esta historia no autoriza commit, merge ni push.

### Key Entities

- **Configuración de contacto**: archivo JSON con el teléfono canónico y su representación visible.
- **Representaciones derivadas**: texto visible, URL `tel:` y URL de WhatsApp con mensaje.
- **Superficies consumidoras**: header, footer, patrones con CTA, FAQ, datos estructurados y cualquier enlace telefónico futuro.
- **Contenido persistido**: patrones insertados, páginas y partes de plantilla guardadas en WordPress que pueden conservar valores anteriores.

## Success Criteria *(mandatory)*

### Measurable Outcomes

- **SC-001**: Un cambio en el único archivo JSON actualiza el 100 % de los usos activos controlados por el tema tras recargar y purgar la caché correspondiente.
- **SC-002**: Una búsqueda del número anterior en el código activo del tema no devuelve valores hardcodeados fuera del JSON, la documentación de ejemplo y los datos históricos permitidos.
- **SC-003**: Con configuración ausente, inválida o vacía, la web no muestra el número anterior, no genera enlaces de WhatsApp o `tel:` incorrectos y no produce errores PHP visibles.
- **SC-004**: Los mensajes de WhatsApp, las etiquetas visibles, las clases y el aspecto de los componentes no cambian respecto del estado actual.
- **SC-005**: La persona responsable valida en escritorio y móvil el número visible, los enlaces de WhatsApp y los datos estructurados, y registra su aceptación.
- **SC-006**: La documentación y la checklist de QA permiten repetir la validación sin conocer la implementación interna.

## Assumptions

- El número actual se trasladará al JSON como valor configurado inicial explícito; no se inventa un número nuevo ni se conserva como fallback en código.
- No se añadirá un panel administrativo, una opción en base de datos ni una dependencia externa.
- No se añadirá un enlace `tel:` visible si no existe hoy; el formato queda definido para futuros enlaces telefónicos.
- WordPress 6.5+ y PHP 7.4+ son los mínimos declarados por el proyecto; la compatibilidad real no se ha verificado en esta etapa.
- Los patrones ya insertados, las páginas editadas y las partes de plantilla personalizadas en WordPress pueden requerir revisión o actualización manual.
- La caché de página u objeto puede requerir purga después de editar el JSON; no se añadirá integración de caché específica para este cambio.
