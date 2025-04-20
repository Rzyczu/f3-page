<?php
/**
 * Navigation template for WordPress theme.
 */
?>

<nav class="relative sticky top-0 z-40 bg-white text-gray" id="navbar" <?php if ( is_front_page() ) { echo 'data-page="index"'; } ?>>
<div class="z-50 items-center hidden gap-4 lg:block lg:absolute right-4 top-8">
            <span id="navbar-lock-icon" class="text-xl text-gray-400 cursor-pointer emoji-gray">🔓</span>
        </div>    
<div class="container flex flex-wrap items-center justify-between py-8 mx-auto max-md:pb-8">
       
        <div class="flex md:basis-2/3 lg:basis-3/12 xl:basis-2/5">
            <a href="<?php echo esc_url(home_url('/')); ?>" class="flex items-center space-x-2 group">
            <?php if (has_custom_logo()) : ?>
               <?php the_custom_logo(); ?>
               <?php else : ?>
               <img loading="lazy" id="logo" src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/svg/logo.svg'); ?>" 
                     class="h-8 svg-color-gray group-hover:svg-color-primary" 
                     alt="<?php bloginfo('name'); ?>" />
            <?php endif; ?>
               <span id="navbar-brand" class="text-xs font-medium xl:text-xs text-gray lg:text-2xs group-hover:text-pimary">
                     3 Podgórski Szczep Fioletowej Trójki<br />
                     im. Tadeusza Kościuszki
               </span>
            </a>
         </div>


        <!-- Static navigation links -->
        <a href="<?php echo esc_url(home_url('/')); ?>" 
           class="hidden py-2 font-semibold sm:text-sm text-gray hover:text-primary max-md:px-3 2xl:px-4 lg:block"
           <?php if (is_front_page() || is_page('archive_news')|| strpos($_SERVER['REQUEST_URI'], '/news/') === 0) echo 'aria-current="page"'; ?>>
           Strona Główna
        </a>
        <a href="<?php echo esc_url(home_url('/about-us')); ?>" 
           class="hidden py-2 text-xs font-semibold text-gray hover:text-primary max-md:px-3 2xl:px-4 sm:text-sm lg:block"
           <?php if (is_page(array('about-us','history'))) echo 'aria-current="page"'; ?>>
           O nas
        </a>
        <a href="<?php echo esc_url(home_url('/join-us')); ?>" 
           class="hidden py-2 text-xs font-semibold text-gray hover:text-primary max-md:px-3 2xl:px-4 sm:text-sm lg:block"
           <?php if (is_page('join-us')) echo 'aria-current="page"'; ?>>
           Dołącz do nas
        </a>
        <a href="<?php echo esc_url(home_url('/our-creativity')); ?>" 
           class="hidden py-2 text-xs font-semibold text-gray hover:text-primary max-md:px-3 2xl:px-4 sm:text-sm lg:block"
           <?php if (is_page('our-creativity')) echo 'aria-current="page"'; ?>>
           Nasza twórczość
        </a>
        <a href="<?php echo esc_url(home_url('/support-us')); ?>" 
           class="hidden py-2 text-xs font-semibold text-gray hover:text-primary max-md:px-3 2xl:px-4 sm:text-sm lg:block"
           <?php if (is_page('support-us')) echo 'aria-current="page"'; ?>>
           Wesprzyj nas
        </a>
        <a href="<?php echo esc_url(home_url('/contact')); ?>" 
           class="hidden py-2 text-xs font-semibold text-gray display-mobile sm:block hover:text-primary 2xl:px-4 max-md:px-3 sm:text-sm"
           <?php if (is_page('contact')) echo 'aria-current="page"'; ?>>
           Kontakt
        </a>
        <a href="<?php echo esc_url(home_url('/support-us')); ?>" 
           class="hidden py-2 text-sm font-semibold text-gray display-mobile sm:block hover:text-primary 2xl:px-4 max-md:px-3 sm:text-md lg:hidden"
           <?php if (is_page('support-us')) echo 'aria-current="page"'; ?>>
           1,5%
        </a>

        <!-- Mobile menu toggle -->
        <div class="flex items-center justify-center h-10 py-2 text-lg sm:pl-3 lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
            <div class="hamburger">
                <span class="hamburger-line"></span>
                <span class="hamburger-line"></span>
                <span class="hamburger-label">menu</span>
            </div>
        </div>
    </div>

    <!-- Mobile menu -->
    <div id="mobile-navbar" class="h-screen bg-primary">
        <div class="relative flex justify-center pt-20">
            <div class="relative flex flex-col space-y-6 w-min-min left-line left-1">
                <a href="<?php echo esc_url(home_url('/')); ?>" 
                   class="relative px-3 py-2 text-2xl font-semibold text-gray hover:text-white hover-left-circle"
                   <?php if (is_front_page() || is_page('archive_news')|| strpos($_SERVER['REQUEST_URI'], '/news/') === 0) echo 'aria-current="page"'; ?>>
                   Strona główna
                </a>
                <a href="<?php echo esc_url(home_url('/about-us')); ?>" 
                   class="relative px-3 py-2 text-2xl font-semibold text-gray hover:text-white hover-left-circle"
                   <?php if (is_page(array('about-us','history'))) echo 'aria-current="page"'; ?>>
                   O nas
                </a>
                <a href="<?php echo esc_url(home_url('/join-us')); ?>" 
                   class="relative px-3 py-2 text-2xl font-semibold text-gray hover:text-white hover-left-circle"
                   <?php if (is_page('join-us')) echo 'aria-current="page"'; ?>>
                   Dołącz do nas
                </a>
                <a href="<?php echo esc_url(home_url('/our-creativity')); ?>" 
                   class="relative px-3 py-2 text-2xl font-semibold text-gray hover:text-white hover-left-circle"
                   <?php if (is_page('our-creativity')) echo 'aria-current="page"'; ?>>
                   Nasza twórczość
                </a>
                <a href="<?php echo esc_url(home_url('/support-us')); ?>" 
                   class="relative px-3 py-2 text-2xl font-semibold text-gray hover:text-white hover-left-circle"
                   <?php if (is_page('support-us')) echo 'aria-current="page"'; ?>>
                   Wesprzyj nas
                </a>
                <a href="<?php echo esc_url(home_url('/contact')); ?>" 
                   class="relative px-3 py-2 text-2xl font-semibold text-gray hover:text-white hover-left-circle"
                   <?php if (is_page('contact')) echo 'aria-current="page"'; ?>>
                   Kontakt
                </a>
            </div>
        </div>
        <img loading="lazy" src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/svg/camp.svg'); ?>" 
             class="hidden w-56 svg-color-white bottom-28 right-20 md:block md:absolute" 
             alt="Camp Logo" />
    </div>
</nav>
