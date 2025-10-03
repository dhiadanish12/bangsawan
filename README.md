# Bangsawan Pictures – WordPress Block Theme

This theme is a lightweight Full Site Editing (FSE) block theme for your company site.

## Upload to WordPress
1. Zip the theme folder `bangsawan-pictures`.
2. In WordPress Admin: Appearance > Themes > Add New > Upload Theme > select the zip > Install > Activate.

## Recommended Settings
- Settings > Permalinks: Post name
- Appearance > Editor: set menus and edit templates
- Add pages: Home, About, Services, Gallery, Contact

## Optional Plugins
- SEO: Yoast SEO or Rank Math
- Forms: WPForms Lite or Contact Form 7
- Caching: WP Super Cache or W3 Total Cache
- Security: Wordfence

## Notes
- Colors and typography are defined in `theme.json`.
- Edit header/footer in `parts/` and templates in `templates/`.
- Patterns (hero, services, contact) are in `patterns/` and can be inserted in the Site Editor.

## Windsurf → WordPress workflow
1. Design locally in this repo using the files under `wp-themes/bangsawan-pictures/`:
   - Global styles: `theme.json`
   - CSS/JS: `assets/css/main.css`, `assets/js/main.js`
   - Header/footer: `parts/header.html`, `parts/footer.html`
   - Templates: `templates/*.html` (front-page, page, single, index, archive, home, search, 404)
   - Patterns: `patterns/*.html`
2. When ready, create a ZIP of the `bangsawan-pictures` folder and upload in WP Admin (self-hosted):
   - Appearance > Themes > Add New > Upload Theme
3. Set homepage and menus:
   - Settings > Reading > Your homepage displays > A static page > Home
   - Appearance > Menus or Site Editor navigation block
4. Import demo pages (optional): Tools > Import > WordPress > upload `content/demo-content.xml`.

### Notes for IDE linters
If your IDE shows undefined function warnings for WordPress functions (e.g., `add_action`, `wp_enqueue_style`), they are resolved at runtime inside WordPress. This is expected in a plain PHP context.
