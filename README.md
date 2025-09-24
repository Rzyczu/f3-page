# F3 Page — WordPress Theme

Custom **WordPress** theme for the scouting unit “Szczep Fioletowej Trójki” (Fioletowa Trójka). Built with **Tailwind CSS** and a rich set of WordPress features: custom post types, meta boxes, Customizer sections, admin columns/filters, and server‑rendered templates for all public pages.

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

