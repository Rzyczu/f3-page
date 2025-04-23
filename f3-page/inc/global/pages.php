<?php

function create_default_pages() {
    // Lista stron do utworzenia
    $pages = [
        'index' => [
            'title' => 'Strona Główna',
  			'content' => 'Witamy na stronie 3 Podgórskiego Szczepu Harcerskiego „Fioletowej Trójki” im. Tadeusza Kościuszki! <br />Działamy w strukturach Związku Harcerstwa Rzeczypospolitej, kontynuując tradycję harcerską Podgórza od 1931 roku. Poznaj naszą historię, działalność oraz drużyny i dołącz do naszej fioletowej rodziny!',
            'template' => '',
        ],
        'about-us' => [
            'title' => 'O nas',
			'content' => '3 Podgórski Szczep Harcerski „Fioletowa Trójka” im. Tadeusza Kościuszki to wspólnota harcerek i harcerzy działająca w ZHR. <br />W naszej codziennej pracy wychowawczej kierujemy się Prawem i Przyrzeczeniem Harcerskim. W skład szczepu wchodzą obecnie: 2 drużyny harcerek, 4 drużyny harcerzy, 1 gromada zuchenek, 1 gromada zuchów. <br />Naszym celem jest wychowanie odpowiedzialnych, samodzielnych i gotowych do służby ludzi. Działamy na terenie krakowskiego Podgórza nieprzerwanie od 1931 roku.',
            'template' => 'about-us.php',
        ],
        'join-us' => [
            'title' => 'Dołącz do nas',
			'content' => 'Szukasz przygody, przyjaźni i możliwości rozwoju dla siebie bądź swoich dzieci? Dołącz donaszej fioletowej rodziny! <br />Oferujemy aktywność dopasowaną do wieku – od zuchów, przez harcerki i harcerzy, po wędrowników. Działamy lokalnie, ale myślimy globalnie – organizujemy biwaki, obozy, akcje społeczne i wiele więcej. <br /><strong>Napisz do nas</strong> lub odwiedź jedną z drużyn. Zapraszamy!',
            'template' => 'join-us.php',
        ],
        'support-us' => [
            'title' => 'Wesprzyj naszą działalność',
            'content' => 'Każda forma wsparcia pomaga nam lepiej realizować misję wychowawczą. <br />Dzięki Twojej pomocy możemy organizować obozy, warsztaty i zakupywać potrzebny sprzęt. <br />Możesz nas wesprzeć: <ul><li>finansowo – wpłatą darowizny,</li><li>rzeczowo – przekazując sprzęt lub materiały,</li><li>organizacyjnie – wspierając nas swoim czasem lub wiedzą.</li></ul><br />Każda pomoc ma znaczenie – dziękujemy za Twoje zaufanie!',
            'template' => 'support-us.php',
        ],
        'contact' => [
            'title' => 'Kontakt',
			'content' => 'Masz pytania? Chcesz do nas dołączyć? A może chcesz nas wesprzeć? Skontaktuj się z nami: <br />✉️ E-mail: f3@zhr.pl <br />Facebook: <a href="https://www.facebook.com/szczepf3/" target="_blank">Fioletowa Trójka</a>  <br />📍 Działamy na terenie Podgórza w Krakowie. <br />Możesz też skorzystać z formularza kontaktowego na stronie.',
            'template' => 'contact.php',
        ],
        'our-creativity' => [
            'title' => 'Fioletowa twórczość',
            'content' => 'Harcerstwo to nie tylko służba i przygoda, ale też miejsce dla wyrażania siebie. Zobacz, jak tworzymy! <br /> Prezentujemy tu nasze zdjęcia, filmy, piosenki, artykuły i inne formy twórczości, które powstały podczas zbiórek, obozów i wspólnych spotkań. <br />To przestrzeń dla naszej kreatywności, dumy i wspomnień.',
            'template' => 'our-creativity.php',
        ],
        'privacy-policy' => [
            'title' => 'Polityka prywatności',
            'content' => 'Dbamy o Twoją prywatność. <br />W tym dokumencie znajdziesz informacje o tym, jakie dane osobowe zbieramy, w jakim celu i na jakiej podstawie je przetwarzamy, a także jakie masz prawa w związku z ich przetwarzaniem.',
            'template' => 'privacy-policy.php', 
        ],
        'archive_news' => [
            'title' => 'Aktualności',
            'content' => 'Tutaj znajdziesz najnowsze informacje z życia naszego szczepu – relacje ze zbiórek, zapowiedzi wydarzeń, sukcesy drużyn i ogłoszenia. <br />Staramy się być na bieżąco – zaglądaj regularnie, by niczego nie przegapić! <br /> Zapraszamy również na naszego <a href="https://www.facebook.com/szczepf3/" target="_blank">Facebooka Fioletowej Trójki</a> ',
            'template' => 'archive-news.php', 
        ],
        'history' => [
            'title' => 'Historia',
            'content' => '3 Podgórski Szczep „Fioletowej Trójki” im. Tadeusza Kościuszki powstał w 1931 roku na krakowskim Podgórzu. Od tamtej pory nieprzerwanie kontynuujemy ideę harcerskiego wychowania, niezależnie od zmian dziejowych i wyzwań, które niesie czas. <br /> Nasza historia to opowieść o ludziach – instruktorach, harcerzach, zuchach i przyjaciołach – którzy przez dekady tworzyli Fioletową Trójkę. <br /> To również historia naszych wartości: służby, pracy nad sobą i braterstwa, które niezmiennie nas prowadzą.',
            'template' => 'history.php',
        ],
        ];

    foreach ($pages as $slug => $page) {
        // Sprawdź, czy strona już istnieje
        if (!get_page_by_path($slug)) {
            // Utwórz stronę
            $page_id = wp_insert_post([
                'post_title' => $page['title'],
                'post_name' => $slug,
                'post_content' => $page['content'],
                'post_status' => 'publish',
                'post_type' => 'page',
            ]);

            // Przypisz szablon, jeśli podano
            if (!empty($page['template'])) {
                update_post_meta($page_id, '_wp_page_template', $page['template']);
            }
        }
    }
}
add_action('after_switch_theme', 'create_default_pages');

function redirect_archives_to_home() {
    if (is_archive()) {
        wp_redirect(home_url());
        exit;
    }
}
add_action('template_redirect', 'redirect_archives_to_home');