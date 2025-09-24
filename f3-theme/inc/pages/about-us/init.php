<?php

// Admin
require_once __DIR__ . '/admin/menu.php';
require_once __DIR__ . '/admin/columns.php';
require_once __DIR__ . '/admin/filters.php';
require_once __DIR__ . '/admin/quick-edit.php';

// Customizer
require_once __DIR__ . '/customizer/sections/association.php';
require_once __DIR__ . '/customizer/sections/brotherhood.php';
require_once __DIR__ . '/customizer/sections/history.php';
require_once __DIR__ . '/customizer/sections/intro.php';
require_once __DIR__ . '/customizer/sections/teams.php';
require_once __DIR__ . '/customizer/sections/board.php';
require_once __DIR__ . '/customizer/panel.php';

// Meta
require_once __DIR__ . '/meta/board-meta.php';
require_once __DIR__ . '/meta/team-meta.php';
require_once __DIR__ . '/meta/brotherhood-meta.php';

// CPT
require_once __DIR__ . '/post-types/board.php';
require_once __DIR__ . '/post-types/brotherhood.php';
require_once __DIR__ . '/post-types/team.php';
