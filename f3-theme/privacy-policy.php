<?php
/**
 * Template Name: Privacy Policy
 */
get_header();
?>

<main class="history-page">
    <div class="container py-24 mx-auto text-primary">
        <div class="mb-6">
            <button onclick="window.history.back();" class="flex items-center text-primary hover:text-primary-light">
                <i class="mr-2 fa-solid fa-arrow-turn-left"></i> 
                <span class="px-4"> Powrót </span>
            </button>
        </div>
        <h1 class="mb-8 text-3xl font-bold"><?php echo esc_html(get_theme_mod('history_page_heading', __('Polityka Prywatności 3 Podgórskiego Szczepu im. Tadeusza Koścuszko', 'your-theme-textdomain'))); ?></h1>

        <?php
        if (have_posts()) :
            while (have_posts()) : the_post();
                $content = get_the_content();
                $content = apply_filters('the_content', $content);
                echo $content;
            endwhile;
        else :
            echo '<p>Treść polityki prywatności nie została jeszcze dodana.</p>';
        endif;
        ?>

    </div>
</main>

<?php
get_footer();
?>
