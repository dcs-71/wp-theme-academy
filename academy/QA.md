# QA.md — Checklist de validación · Academy by Total Therapy

Lista de verificación para validar el tema en un WordPress real (6.5+). Marca cada
ítem al probarlo.

> **Revisión documental (2026-11-10):** se actualizaron referencias de patrones, plantillas,
> logo, responsive y procedimiento de fechas; el menú se corrigió en el README del tema. Esta
> revisión no ejecutó pruebas funcionales ni certifica la aceptación del tema.
>
> **Alcance de las marcas:** las casillas marcadas en la sección 0 son un registro histórico
> del entorno de desarrollo original. No hay logs ni CI en el repositorio que permitan
> reproducirlas; no se reejecutaron en esta adaptación.

---

## 0. Validaciones automáticas declaradas (registro histórico)

- [x] `theme.json` — JSON válido.
- [x] `blocks/hero-slider/block.json` — JSON válido.
- [x] `assets/js/navigation.js` — sintaxis válida (`node --check`).
- [x] `blocks/hero-slider/index.js` — sintaxis válida.
- [x] `blocks/hero-slider/view.js` — sintaxis válida.
- [ ] **PHP lint** — no había PHP en el entorno local. Ejecutar en el servidor:
      `find . -name "*.php" -print0 | xargs -0 -n1 php -l`

---

## 1. Activación

- [ ] El tema aparece en **Apariencia → Temas** con nombre, descripción y screenshot.
- [ ] Se activa sin warnings.
- [ ] Con `define('WP_DEBUG', true)` **no** aparecen errores/notices PHP.

## 2. Site Editor (FSE)

- [ ] **Apariencia → Editor** abre sin errores.
- [ ] Header editable como parte de plantilla; el logo se puede subir/cambiar.
- [ ] Footer editable (navegación, redes, badges, copyright).
- [ ] Plantillas visibles: `front-page`, `page-eventos`, `page-alumnos`, `page`, `single`,
      `index`, `404`, `page-no-title`.
- [ ] En **Estilos** se ven la paleta Academy y la tipografía Poppins.

## 3. Patrones (Gutenberg)

- [ ] El insertor **(+) → Patrones → Academy** muestra: Hero, Ruta de formación, Promo,
      Temario, Docente, Material académico, Testimonios, Así se vive la formación,
      Preguntas frecuentes, Aliados, Alumnos formados y Eventos·Lista.
- [ ] Cada patrón se inserta y se ve igual que en el frontend (consistencia editor↔web).
- [ ] Textos, imágenes, botones y enlaces de los patrones son editables.

## 4. Bloque Hero Slider

- [ ] Se inserta *Academy · Hero Slider* y permite añadir/editar slides (Cover).
- [ ] En el editor las slides se ven apiladas con la nota de ayuda.
- [ ] La barra lateral permite togglear autoplay, bucle, intervalo, flechas, puntos.
- [ ] En frontend funciona el carrusel: autoplay, flechas, puntos.
- [ ] Navegación por teclado (← →) y swipe en móvil.
- [ ] Con `prefers-reduced-motion: reduce` el autoplay no se activa.
- [ ] El JS del slider solo se carga en páginas con el bloque.

## 5. Página de inicio, Eventos y Alumnos

- [ ] Página estática de inicio usa `front-page.html` con todas las secciones.
- [ ] La página "Eventos" con plantilla *Página de Eventos* muestra hero + lista.
- [ ] La página "Alumnos" usa la plantilla *Página de Alumnos* y muestra la cuadrícula de
      alumnos formados.

## 6. Responsive (desktop / tablet / móvil)

- [ ] Desktop (≥1200px): grids de 3–4 columnas, layout correcto.
- [ ] Tablet (~768–1024px): las tarjetas de niveles pasan a 2 columnas y las credenciales a 1.
- [ ] Móvil (≤600px): niveles y material a 1 columna; blog y docente se apilan; header con
      menú hamburguesa.
- [ ] Tarjeta de evento se apila verticalmente en móvil.

## 7. Rendimiento y dependencias

- [ ] No se cargan jQuery extra ni librerías de terceros innecesarias.
- [ ] Fuentes Poppins servidas localmente (sin requests a fonts.gstatic.com).
- [ ] CSS/JS encolados con versión (cache-busting).
- [ ] Imágenes con `loading="lazy"`.

## 8. Accesibilidad

- [ ] Foco visible en enlaces, botones y controles del slider.
- [ ] Contraste suficiente (texto blanco sobre navy/indigo; navy sobre claros).
- [ ] Slider expone roles ARIA y es operable solo con teclado.
- [ ] Animaciones respetan `prefers-reduced-motion`.

## 9. Seguridad

- [ ] Salidas en patrones escapadas (`esc_url`, `esc_html`, `esc_attr`).
- [ ] `ABSPATH` check en `functions.php`.
- [ ] Sin lógica de negocio (pagos/reservas/CPT complejos) dentro del tema.

## 10. Teléfono de contacto configurable

> Estas comprobaciones quedan pendientes de la validación humana en WordPress 6.5+. No se
> ejecutaron pruebas funcionales durante la implementación.

- [ ] `academy/config/contact.json` existe, `jq empty` pasa y `number` cumple el formato
      internacional E.164.
- [ ] `display` contiene los mismos dígitos que `number` y solo usa caracteres de formato
      telefónico.
- [ ] No quedan usos activos de `ACADEMY_WHATSAPP` ni del número anterior fuera del JSON.
- [ ] Con configuración válida, el teléfono visible del footer y las FAQ, los enlaces de
      WhatsApp del header/footer/patrones y el `telephone` del JSON-LD usan el valor
      configurado.
- [ ] Los mensajes `info`, `reserva`, `inscripcion` y `consulta` se conservan.
- [ ] El enlace «Contacto» del header resuelve a WhatsApp; el marcador
      `#academy-contact-whatsapp-info` no queda visible en el frontend.
- [ ] Con el archivo ausente o inválido en un entorno de desarrollo, no aparece el número
      anterior, no se generan enlaces incorrectos, no hay errores PHP visibles y el
      `telephone` del JSON-LD se omite.
- [ ] Tras purgar la caché y recargar, un cambio en el JSON se refleja en todos los usos
      activos.
- [ ] Se revisaron patrones insertados, páginas y partes de plantilla personalizadas; los
      valores antiguos se actualizaron manualmente.

---

## Notas

- Las imágenes son fotografías reales de la formación (Grupo 2026-II, día 1) ya optimizadas en
  `assets/images/`. Para cambiarlas, sustituye el archivo o edita el bloque desde WordPress.
- El logo va como bloque *Imagen*: `logo-academy-header.svg` en el header y
  `logo-academy-blanco.webp` en el footer; si prefieres gestionarlo desde **Ajustes →
  Identidad del sitio**, cámbialo por *Logotipo del sitio*.
- Revisar antes de publicar: enlaces de redes sociales del footer (aún en `#`) y las URLs
  `/contacto` y `/eventos`, que deben existir como páginas.
- Las fechas se administran en **Academy → Fechas** (plugin) o en
  `academy_schedule_defaults()` (sin plugin). Los patrones usan shortcodes; no se editan para
  cambiar fechas.
- Para eventos dinámicos, ver `README.md` §7 (plugin `academy-core` + Query Loop).
