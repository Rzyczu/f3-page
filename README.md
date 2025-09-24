# F3 Page — WordPress Theme

Custom **WordPress** theme for the scouting unit “Szczep Fioletowej Trójki”. Built with **Tailwind CSS** and a rich set of WordPress features: custom post types, meta boxes, Customizer sections, admin columns/filters, and server‑rendered templates for all public pages.

**Live Demo:** https://f3.zhr.pl/

---

## Tech Stack

- **CMS:** WordPress (PHP)
- **Theme:** custom WP theme (`f3-page`)
- **Styling:** Tailwind CSS (compiled; source in `/static`, output shipped in `/f3-page/assets/css/custom(.min).css`)
- **JS:** vanilla JavaScript (e.g., mobile navbar, footer behavior) + **Swiper** CDN for sliders
- **Assets:** images (including SVG), fonts (Google Fonts), Font Awesome
- **Build tooling (optional):** Tailwind CLI (`/static/package.json`, `tailwind.config.js`)

---

## Features (from code)

- **Public pages / templates**
  - Home (`index.php`) with sections for **news**, **opinions/testimonials**, **structures/units**, and CTA blocks (join/support).
  - Dedicated pages: `about-us.php`, `join-us.php`, `support-us.php`, `history.php`, `contact.php`, `privacy-policy.php`, `404.php`, `archive-news.php`, `single-news.php`.
  - Shared layout: `header.php`, `navigation.php`, `footer.php`.

- **Custom Post Types (CPT)**
  - `news` (archive at `/news`), `opinion`, `structure` (home/units), plus **About Us**-related CPTs: `team`, `brotherhood`, `board`.
  - Each CPT has **meta boxes** for structured fields (e.g., team short name, gender, links with icon hints, board roles, etc.).
  - Unused default fields removed where appropriate (excerpt/comments/custom‑fields off for `news`).

- **Admin UX**
  - Custom **admin menus**, **columns**, **filters**, and **quick edit** for CPTs where useful.
  - Custom page creator: automatic creation of common pages (e.g., **Privacy Policy**).
  - Admin “Pages” menu reordering/renaming for streamlined editing.

- **Customizer**
  - Panels/sections per page (e.g., Home: about/join‑us/support sections; About Us: association, brotherhood, history, teams, board).
  - Sanitizers and extended tag allowances for safe rich content (e.g., `<ul>`, `<ol>`, `<a target>`).

- **Theming & Components**
  - Tailwind‑based design tokens (colors `primary`, `gray`, container paddings, font sizes) and `Montserrat` font family.
  - Utility classes compiled and shipped (`custom.css` / `custom.min.css`), plus a small **safelist** for dynamic classes.
  - JS helpers: mobile **hamburger** menu, sticky footer behavior.
  - **Swiper** integrated via CDN.

---

## Project Structure (high‑level)

```
f3-page/                 # WordPress theme (activate this in WP)
  assets/
    css/                 # Tailwind build output (custom.css, custom.min.css)
    js/                  # navbar.js, footer-behavior.js
    images/              # PNG/SVG assets
  inc/
    global/              # enqueue, theme setup, pages setup, forms, customizer, CPTs
    pages/
      index/             # Home: CPTs (news, opinion, structure), sections, meta, admin, customizer
      about-us/          # About Us: CPTs (team, brotherhood, board), meta, customizer, admin
      join-us/, support-us/, history/, contact/
  *.php                  # page templates
  style.css              # WP theme header & meta
static/                  # Tailwind sources & build tooling
  src/input.css          # Tailwind entry
  tailwind.config.js     # tokens, safelist
  package.json           # dev script (Tailwind CLI)
```

---

## Local Development / Installation

### 1) Install the theme
1. Copy the `f3-page/` directory to your WordPress `wp-content/themes/`.
2. In WP Admin → **Appearance → Themes**, activate **F3 Page**.

### 2) (Optional) Tailwind rebuild
The repository includes prebuilt CSS. If you want to tweak styles:

```bash
cd static
npm install
npm run dev            # builds Tailwind to ./dist/styles.css (watch)
```
Then copy the generated CSS into the theme, for example replacing:
```
f3-page/assets/css/custom.css
f3-page/assets/css/custom.min.css
```

> **Note:** `tailwind.config.js` currently scans `./dist/*.{html,js}`. If you edit theme PHP templates, you may update the `content` globs to include theme files before rebuilding.

### 3) Assets & Scripts
- CSS and JS are enqueued in `inc/global/enqueue-scripts.php`.
- External CDNs used: **Google Fonts**, **Font Awesome**, **Swiper**.

---

## Content Modeling (examples)

- **News (`news`)**: title, content (editor), thumbnail; archive at `/news`.
- **Opinions (`opinion`)**: rich text content for testimonials/quotes.
- **Structures (`structure`)**: hierarchical/ordered units with thumbnails.
- **Teams (`team`)**: short name, description, gender, and an array of social/contact **links** with Font Awesome icon hints.
- **Brotherhood/Board (`brotherhood`, `board`)**: member roles and metadata for About Us sections.

All CPTs and fields are registered in `inc/pages/**/post-types/*.php` with meta boxes under `inc/pages/**/meta/*.php`.

---

## License

- Theme and build files: see `f3-page/style.css` (GPL‑2.0‑or‑later). 
- Additional licenses for third‑party packages are included where applicable (e.g., `/static/LICENSE`).

---

## Credits

- Design & development: **Rzyczu** (`style.css` theme header).
- Libraries: Tailwind CSS, Font Awesome, Swiper, Google Fonts.
