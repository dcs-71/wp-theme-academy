# QA.md — Checklist de validación · Academy by Total Therapy

Lista de verificación para validar el tema en un WordPress real (6.5+). Marca cada
ítem al probarlo.

---

## 0. Validaciones automáticas ya ejecutadas (entorno de desarrollo)

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
- [ ] Plantillas visibles: `front-page`, `page-eventos`, `page`, `single`, `index`,
      `404`, `page-no-title`.
- [ ] En **Estilos** se ven la paleta Academy y la tipografía Poppins.

## 3. Patrones (Gutenberg)

- [ ] El insertor **(+) → Patrones → Academy** muestra: Hero, Categorías, Promo, Cursos,
      Testimonios, Blog/Eventos, App, Partners, Eventos·Lista.
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

## 5. Página de inicio y Eventos

- [ ] Página estática de inicio usa `front-page.html` con todas las secciones.
- [ ] La página "Eventos" con plantilla *Página de Eventos* muestra hero + lista.
- [ ] Las tabs de cursos muestran la pestaña activa subrayada.

## 6. Responsive (desktop / tablet / móvil)

- [ ] Desktop (≥1200px): grids de 3–4 columnas, layout correcto.
- [ ] Tablet (~768–1024px): cursos pasan a 2 columnas; categorías se reordenan.
- [ ] Móvil (≤600px): todo a 1 columna; header con menú hamburguesa nativo.
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

---

## Notas

- Las imágenes son fotografías reales de la formación (Grupo II, día 1) ya optimizadas en
  `assets/images/`. Para cambiarlas, sustituye el archivo o edita el bloque desde WordPress.
- El logo (`logo-academy-blanco.png`) va como bloque *Imagen* en header y footer; si prefieres
  gestionarlo desde **Ajustes → Identidad del sitio**, cámbialo por *Logotipo del sitio*.
- Revisar antes de publicar: enlaces de redes sociales del footer (aún en `#`) y las URLs
  `/contacto` y `/eventos`, que deben existir como páginas.
- Actualizar fechas y niveles al lanzar una nueva edición: `patterns/levels-grid.php`,
  `patterns/schedule.php`, `patterns/program-content.php` y `patterns/events-list.php`.
- Para eventos dinámicos, ver `README.md` §7 (plugin `academy-core` + Query Loop).
