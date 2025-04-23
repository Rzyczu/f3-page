<?php

// Admin
require_once __DIR__ . '/admin/menu.php';
require_once __DIR__ . '/admin/assets.php';
require_once __DIR__ . '/admin/filters.php';

// Customizer
require_once __DIR__ . '/customizer/sections/about.php';
require_once __DIR__ . '/customizer/sections/join-us.php';
// require_once __DIR__ . '/customizer/sections/structures.php';
require_once __DIR__ . '/customizer/sections/support.php';
require_once __DIR__ . '/customizer/panel.php';

// Meta
require_once __DIR__ . '/meta/news-meta.php';
require_once __DIR__ . '/meta/opinion-meta.php';
require_once __DIR__ . '/meta/structure-meta.php';

// CPT
require_once __DIR__ . '/post-types/news.php';
require_once __DIR__ . '/post-types/opinion.php';
require_once __DIR__ . '/post-types/structure.php';

// Setup Theme
require_once __DIR__ . '/setup/theme.php';

// Helpers
require_once __DIR__ . '/helpers.php';
