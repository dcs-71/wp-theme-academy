# US-001 — Centralizar el teléfono de contacto en un archivo JSON

**ID**: US-001

**SPEC relacionada**: [`specs/001-contact-phone-config/spec.md`](../001-contact-phone-config/spec.md)

**Tipo**: Funcionalidad / configuración del tema

**Estado**: CERRADA

**Fecha de preparación**: 2026-11-10

**Aprobación del contrato**: 2026-11-10

**Alcance de esta etapa**: Build de US-001. Las decisiones aprobadas se registran en la sección 11. El cierre y la aceptación se registran en las secciones 12–14.

## 1. Contexto y problema

El teléfono de contacto aparece hoy en varios lugares del tema con distintas representaciones:

- Una constante `ACADEMY_WHATSAPP` en `academy/functions.php`.
- URLs de WhatsApp generadas por `academy_whatsapp_url()`.
- Enlaces `wa.me` escritos directamente en `academy/parts/header.html` y `academy/parts/footer.html`.
- Texto visible del número en el footer y en una respuesta de las FAQ.
- El `telephone` del JSON-LD de organización en `academy_schema_graph()`.

La constante centraliza solo una parte. Los enlaces estáticos del header/footer y el texto visible pueden quedar desincronizados si cambia el número. El objetivo es que una única edición del JSON actualice todos los usos activos controlados por el tema, sin añadir un panel administrativo ni una opción en base de datos.

## 2. Usos encontrados en el estado inicial

### Usos activos del estado inicial

| Uso | Archivo y referencia | Representación inicial |
|---|---|---|
| Constante del tema | `academy/functions.php:32-34` | `51993582936` |
| Generador de URL de WhatsApp | `academy/functions.php:45-52` | `https://wa.me/51993582936` |
| `telephone` del JSON-LD | `academy/functions.php:799` | `+51993582936` |
| Enlace «Contacto» del header | `academy/parts/header.html:13` | `wa.me` con mensaje `info` |
| Botón «Inscríbete» del header | `academy/parts/header.html:19` | `wa.me` con mensaje `inscripcion` |
| Teléfono visible del footer | `academy/parts/footer.html:18` | Texto `+51 993 582 936` y enlace `wa.me` con mensaje `info` |
| CTA «Escríbenos por WhatsApp» del footer | `academy/parts/footer.html:72` | `wa.me` con mensaje `inscripcion` |
| CTA del Hero Slider | `academy/patterns/hero-slider.php:27` y `:50` | `wa.me` con mensajes `reserva` e `info` |
| CTA del banner promocional | `academy/patterns/cta-banner.php:14` y `:31` | `wa.me` con mensaje `info` |
| Texto visible de FAQ | `academy/patterns/faq.php:40` | `+51 993 582 936` dentro de una respuesta |
| CTA de FAQ | `academy/patterns/faq.php:60` y `:88` | `wa.me` con mensaje `consulta` |
| CTA de Alumnos formados | `academy/patterns/alumni.php:13` y `:46` | `wa.me` con mensaje `reserva` |

### Documentación y ejemplos

- `academy/README.md:51-58` documentaba el número y los tres lugares que debían coincidir antes de este cambio.
- `academy/README.md:117-118` documenta los mensajes de WhatsApp.
- No se encontraron enlaces `tel:` activos.
- No se encontró el teléfono en `academy/templates/`, `academy/blocks/`, `academy/assets/js/`, `academy/assets/css/`, `academy/theme.json`, `academy/blocks/hero-slider/block.json` ni en `academy-programacion/`.

### Contenido no inspeccionable desde el repositorio

- Páginas, patrones insertados y partes de plantilla guardados en la base de datos de WordPress.
- Navegación o contenido personalizado desde el Site Editor.
- Cachés de página u objeto del sitio.
- Cualquier copia del número en correos, CRM, campañas o sistemas externos.

## 3. Comportamiento esperado

### Configuración

Un único archivo versionado en el tema:

`academy/config/contact.json`

```json
{
  "phone": {
    "number": "+51908932632",
    "display": "+51 908 932 632"
  }
}
```

Reglas:

- `phone.number` es el teléfono canónico, obligatorio, en formato internacional E.164 y prefijo `+`.
- `phone.display` es la representación visible, obligatoria, no vacía, con los mismos dígitos que `number` y limitada a caracteres de formato telefónico.
- Ambos campos son necesarios. Si falta uno, el teléfono está vacío, el formato no es válido o los dígitos no coinciden, la configuración es inválida.
- El valor inicial del JSON es el número actual, declarado explícitamente como configuración. No queda como fallback en código.
- No se crea panel administrativo, opción de base de datos ni endpoint REST.

### Lectura y validación

- Leer el archivo con una ruta de tema (`get_theme_file_path( 'config/contact.json' )`).
- Comprobar que el archivo existe y es legible antes de leerlo.
- Decodificar el JSON y validar su estructura y valores.
- No usar `wp_json_file_decode()` como lectura principal si su comportamiento ante archivo ausente o JSON inválido produce `wp_trigger_error()`; la lectura debe ser segura y silenciosa en frontend.
- Cachear el resultado en memoria durante la petición.
- Ante archivo ausente, JSON inválido, estructura incorrecta, `number` inválido o `display` vacío: devolver una configuración vacía y no emitir el número anterior.
- No producir errores PHP visibles ni enlaces con un número incorrecto.

### Formatos derivados

- **Visualización**: `phone.display`.
- **Enlace telefónico**: `tel:` + `phone.number` (por ejemplo, `tel:+51908932632`).
- **WhatsApp**: `https://wa.me/` + dígitos de `number` sin `+`, conservando el parámetro `text` y los mensajes actuales.
- **JSON-LD**: `telephone` con `phone.number`; si la configuración no es válida, omitir la propiedad.

### Integración propuesta

- Mantener `academy_whatsapp_url()` y `academy_whatsapp_message()` como API existente; cambiar solo la fuente del número.
- Añadir helpers de lectura y formato para el teléfono.
- Usar **Block Bindings** nativo de WordPress 6.5 para el atributo `url` de `core/button`, que sí está soportado en la versión mínima declarada. El binding se registra en `init` y toma el número desde el JSON.
- Para `core/navigation-link`, que no está soportado por Block Bindings en WordPress 6.5, usar un filtro focalizado de `render_block` sobre un marcador estable en la URL del enlace «Contacto». El filtro resuelve la URL desde el JSON y, si la configuración no es válida, omite el elemento de navegación. No se eleva la versión mínima.
- Usar shortcodes para el texto visible que no puede resolverse con Block Bindings:
  - `[academy_contact_phone]` para el texto visible.
  - `[academy_contact_phone_link motivo="info"]` para el enlace visible del footer.
  - `[academy_contact_phone_link motivo="consulta" label="Escríbenos por WhatsApp"]` para el CTA de FAQ.
- Reutilizar el filtro existente de shortcodes en `core/html` y `core/paragraph`.
- Si la configuración no es válida, los botones vinculados se omiten, el enlace de navegación se omite y los shortcodes devuelven una cadena vacía; no se renderiza un enlace vacío ni el número anterior.
- No se añade un bloque personalizado, una librería ni un paso de build.

### Mensajes de WhatsApp

Se conservan exactamente los mensajes actuales de `academy_whatsapp_message()`:

- `info`
- `reserva`
- `inscripcion`
- `consulta`

Los enlaces estáticos del header/footer deben pasar a usar la misma función, de modo que el mensaje no se duplique ni se desincronice.

## 4. Alcance

- `academy/config/contact.json` (nuevo).
- `academy/functions.php`: lectura, validación, helpers, shortcodes, binding source, JSON-LD y reemplazo de la constante.
- `academy/parts/header.html`: enlace «Contacto» y botón «Inscríbete».
- `academy/parts/footer.html`: teléfono visible y CTA.
- `academy/patterns/hero-slider.php`: CTAs de WhatsApp.
- `academy/patterns/cta-banner.php`: CTA de WhatsApp.
- `academy/patterns/faq.php`: texto visible y CTA.
- `academy/patterns/alumni.php`: CTA.
- `academy/README.md` y `academy/QA.md`: documentación de edición, validación, caché y migración.
- Pruebas manuales en WordPress 6.5+ para los usos anteriores.

## 5. Exclusiones

- No se crea un panel administrativo.
- No se guarda el teléfono en una opción de base de datos.
- No se inventa un número nuevo.
- No se usa el número anterior como fallback silencioso.
- No se cambian los mensajes de WhatsApp, las etiquetas visibles ni el diseño.
- No se añaden dependencias, librerías, bloques propios ni pasos de build.
- No se modifica el plugin `academy-programacion`.
- No se añade un enlace `tel:` visible si no existe hoy; el helper de formato queda disponible para un uso futuro aprobado.
- No se migran automáticamente patrones ya insertados, páginas ni partes de plantilla persistidas en WordPress.
- No se implementa ni se ejecuta nada en esta etapa.

## 6. Dependencias

- WordPress 6.5+ para Block Bindings en `core/button` con atributo `url`.
- WordPress 6.5+ con `WP_HTML_Tag_Processor` para el filtro focalizado del enlace `core/navigation-link`.
- PHP 7.4+ para la sintaxis del tema.
- `get_theme_file_path()` y lectura local de archivos de WordPress.
- Funciones existentes `academy_whatsapp_url()` y `academy_whatsapp_message()`.
- Filtro existente de shortcodes en `core/html` y `core/paragraph`.
- Permisos de lectura del archivo JSON por parte del servidor web.
- Purga manual de caché de página/objeto después de editar el JSON.
- Aceptación funcional y visual por la persona responsable.

## 7. Riesgos

- **Block Bindings en 6.5**: `core/button` está soportado, pero `core/navigation-link` no. El enlace de navegación usa un filtro focalizado; debe validarse en el entorno real.
- **Contenido persistido**: los patrones ya insertados y las partes de plantilla personalizadas no heredan automáticamente los nuevos bindings, shortcodes o marcadores.
- **Caché**: una página cacheada puede seguir mostrando el número anterior hasta purgar la caché.
- **Configuración inválida**: el fallo seguro puede dejar zonas de contacto vacías; es preferible a mostrar un número incorrecto.
- **Duplicación de representaciones**: `number` y `display` deben validarse para que sus dígitos coincidan.
- **Constante existente**: no se encontraron consumidores de `ACADEMY_WHATSAPP` fuera de `academy/functions.php`; se elimina. Un child theme externo no presente en el repositorio podría consumirla, pero no hay evidencia que justifique conservarla.
- **Editor**: los botones con bindings y el marcador del enlace de navegación deben seguir siendo editables y comprensibles en el Site Editor.

## 8. Tratamiento del contenido persistido

- **Patrones nuevos**: se insertan con bindings/shortcodes y se actualizan al cambiar el JSON.
- **Patrones ya insertados antes del cambio**: conservan el markup guardado; hay que reinsertarlos o actualizar manualmente sus enlaces/textos.
- **Partes de plantilla del tema**: el archivo del tema se actualiza, pero si el sitio guardó una copia personalizada en la base de datos, esa copia tiene prioridad; hay que actualizarla o restaurarla desde el Site Editor.
- **Páginas y contenido libre**: revisar el número/URL antiguos y actualizarlos manualmente.
- **Aceptación**: incluir una búsqueda del número y de `wa.me/51908932632` en el contenido renderizado y en el editor; documentar los lugares que requieren actualización manual.
- **No** se añade un filtro de compatibilidad que reemplace el número antiguo en tiempo de render, para no introducir un fallback oculto ni una capa adicional.

## 9. Criterios de aceptación

1. **AC-01 — Fuente única**: el teléfono activo del tema se configura solo en `academy/config/contact.json`; no quedan valores literales activos en `functions.php`, header, footer ni patrones.
2. **AC-02 — Propagación**: al cambiar `number` y `display` en el JSON, tras recargar y purgar caché, el número visible, los enlaces de WhatsApp y el `telephone` del JSON-LD usan los nuevos valores.
3. **AC-03 — Formatos**: el texto visible coincide con `display`; el enlace telefónico, si se usa, es `tel:+...`; los enlaces de WhatsApp usan los dígitos de `number` y conservan el mensaje correspondiente.
4. **AC-04 — Mensajes**: los textos de `info`, `reserva`, `inscripcion` y `consulta` no cambian.
5. **AC-05 — Fallo seguro**: con archivo ausente, JSON inválido, `number` inválido o `display` vacío, no aparece el número anterior ni se generan enlaces incorrectos; no hay errores PHP visibles; el `telephone` del JSON-LD se omite.
6. **AC-06 — Diseño**: las clases, etiquetas, estructura visual y comportamiento de los componentes no cambian.
7. **AC-07 — Páginas y patrones**: los nuevos insertos usan bindings, shortcodes o el marcador de navegación; los insertos previos se revisan y actualizan según el procedimiento documentado.
8. **AC-08 — Documentación**: `README.md` y `QA.md` explican el JSON, la validación, la purga de caché y la migración de contenido persistido.
9. **AC-09 — Verificación técnica**: `jq empty academy/config/contact.json` y el lint PHP pasan; el JSON-LD es válido.
10. **AC-10 — Aceptación humana**: la persona responsable valida escritorio, móvil, enlaces de WhatsApp y datos estructurados, y registra la aceptación antes del cierre.

## 10. Descomposición técnica breve

1. Crear `academy/config/contact.json` con el valor inicial actual, sin nuevo número.
2. Añadir en `functions.php` la lectura segura, validación, caché por petición y helpers de formato.
3. Reemplazar la constante y el uso en `academy_whatsapp_url()` y `academy_schema_graph()`.
4. Registrar el binding source `academy/contact` para `whatsapp_url` y `tel_url`, usarlo en el atributo `url` de `core/button` y añadir un filtro focalizado para el marcador del enlace `core/navigation-link`.
5. Añadir los shortcodes de texto visible y enlace, reutilizando el filtro existente de `core/html` y `core/paragraph`.
6. Actualizar header, footer y patrones con bindings/shortcodes, conservando clases, mensajes y diseño.
7. Actualizar README y QA; documentar la migración manual del contenido persistido y la purga de caché.
8. Verificar con `jq`, lint PHP, búsqueda del número anterior y revisión funcional/visual en WordPress 6.5+.

No se crea `plan.md` ni `tasks.md`: la descomposición anterior es suficiente para esta historia y el flujo ligero FALEXOM no exige esos archivos.

## 11. Decisiones aprobadas

Aprobadas por la persona responsable el 2026-11-10:

1. **Fallo seguro**: ocultar/omitir los componentes de teléfono y WhatsApp cuando la configuración no es válida, sin texto de reemplazo y sin usar el número anterior.
2. **Contenido persistido**: migración manual documentada, sin filtro de compatibilidad para el número anterior.
3. **Constante `ACADEMY_WHATSAPP`**: eliminarla del tema y sustituir sus usos por helpers; no hay consumidores en el repositorio.
4. **Representación visible**: exigir `display` en el JSON y validar que sus dígitos coincidan con `number`.
5. **Compatibilidad**: usar Block Bindings en `core/button` para WordPress 6.5 y un filtro focalizado de render para `core/navigation-link`, que no está soportado por Block Bindings en esa versión.

## 12. Aprobación

**Estado**: CERRADA.

Contrato aprobado el 2026-11-10. Implementación base y ajuste de esquema integrados en
`main`. Aceptación funcional y visual confirmada por la persona responsable el 2026-11-10,
incluido el renombrado `phone.e164` → `phone.number`.

Esta aceptación es funcional y visual. No implica que se hayan ejecutado suites E2E,
pruebas automatizadas adicionales ni verificaciones de compatibilidad WordPress/PHP no
registradas.

## 13. Registro de implementación base

**Rama**: `001-contact-phone-config`. La implementación base está en el commit `cc779b5` y
el ajuste de esquema en `8c6c996`; ambos se integraron en `main` por fast-forward.

**Archivos implementados**:

- `academy/config/contact.json` (nuevo).
- `academy/functions.php`.
- `academy/parts/header.html` y `academy/parts/footer.html`.
- `academy/patterns/hero-slider.php`, `cta-banner.php`, `faq.php` y `alumni.php`.
- `academy/README.md`, `academy/QA.md` y `docs/roadmap.md`.

**Verificación técnica realizada**:

- `php -l` sobre todos los PHP del tema: correcto.
- `jq empty` sobre `config/contact.json`, `theme.json` y `block.json`: correcto.
- Comentarios de bloque JSON estáticos de header, footer y patrones: correctos.
- Búsqueda del número anterior `51993582936`: no aparece en el JSON ni en código activo;
  solo permanece en la tabla histórica de esta historia.
- `ACADEMY_WHATSAPP` eliminada; no quedan consumidores en el repositorio.
- No se ejecutaron suites E2E ni pruebas automatizadas adicionales.

**Aceptación humana**:

- Aceptación funcional y visual confirmada por la persona responsable el 2026-11-10,
  incluido el ajuste `phone.e164` → `phone.number`.
- La validación humana no se atribuye a pruebas técnicas no ejecutadas ni a verificaciones
  de compatibilidad WordPress/PHP no registradas.
- El contenido persistido y la caché del sitio no se inspeccionaron desde este repositorio;
  no se declara su actualización automática.

## 14. Ajuste de esquema: `phone.e164` → `phone.number`

**Fecha**: 2026-11-10

**Estado**: CERRADA — aceptación final confirmada por la persona responsable el 2026-11-10.

- Se renombró la propiedad JSON `phone.e164` a `phone.number`.
- No se añadió compatibilidad con la clave anterior.
- Se mantienen los helpers públicos; `academy_contact_phone_e164()` conserva su nombre
  porque devuelve un valor en formato E.164, no porque el JSON use esa clave.
- Se mantienen el número oficial `+51908932632`, el display `+51 908 932 632`, los mensajes
  de WhatsApp, los enlaces y el comportamiento ante configuración inválida.
- Verificación focalizada: sintaxis JSON, formato E.164, coincidencia de dígitos, `php -l`,
  ausencia de referencias de código a `phone.e164` y diff revisado.
- **Aceptación final confirmada**: la persona responsable confirmó el funcionamiento y dio
  aceptación funcional y visual de la implementación final el 2026-11-10, incluido el
  renombrado. La validación previa del estado anterior también quedó registrada; no se
  atribuyen a este cierre verificaciones técnicas o de compatibilidad no ejecutadas.
