<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    
    <!-- Meta SEO -->
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <meta name="author" content="Rzyczu">

    <!-- Open Graph / Facebook -->
    <meta property="og:title" content="<?php echo esc_attr(get_the_title()); ?>">
    <meta property="og:description" content="<?php echo wp_strip_all_tags(get_the_excerpt()); ?>">
    <meta property="og:image" content="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>">
    <meta property="og:url" content="<?php echo get_permalink(); ?>">
    <meta property="og:type" content="<?php echo (is_single()) ? 'article' : 'website'; ?>">
    <meta property="og:site_name" content="<?php bloginfo('name'); ?>">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?php echo esc_attr(get_the_title()); ?>">
    <meta name="twitter:description" content="<?php echo wp_strip_all_tags(get_the_excerpt()); ?>">
    <meta name="twitter:image" content="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>">
    <meta name="twitter:site" content="@TwojTwitter">

    <!-- Google Fonts -->
    <link rel="preload" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&family=Roboto&display=swap" as="style">
    <link rel="preload" href="<?php echo get_template_directory_uri(); ?>/assets/css/custom.css" as="style">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="dns-prefetch" href="//fonts.googleapis.com">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <!-- Favicon --> 
    <?php if (function_exists('has_site_icon') && has_site_icon()) { wp_site_icon(); } ?>
    
    <!-- FontAwesome -->
    <link
        rel="stylesheet"
        href="https://site-assets.fontawesome.com/releases/v6.7.2/css/all.css"
      >

      <link
        rel="stylesheet"
        href="https://site-assets.fontawesome.com/releases/v6.7.2/css/sharp-solid.css"
      >

      <link
        rel="stylesheet"
        href="https://site-assets.fontawesome.com/releases/v6.7.2/css/sharp-regular.css"
      >

      <link
        rel="stylesheet"
        href="https://site-assets.fontawesome.com/releases/v6.7.2/css/sharp-light.css"
      >
      <link
        rel="stylesheet"
        href="https://site-assets.fontawesome.com/releases/v6.7.2/css/duotone.css"
      />
      <link
        rel="stylesheet"
        href="https://site-assets.fontawesome.com/releases/v6.7.2/css/brands.css"
      />
    
      <script type="application/ld+json">
      {
        "@context": "https://schema.org",
        "@type": "Organization",
        "name": "<?php bloginfo('name'); ?>",
        "url": "<?php echo esc_url(get_home_url()); ?>",
        "logo": "<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/logo.png",
        "sameAs": [
          "<?php echo esc_url(get_option('facebook_url', 'https://www.facebook.com/TWOJA_STRONA')); ?>",
          "<?php echo esc_url(get_option('twitter_url', 'https://twitter.com/TWOJA_STRONA')); ?>"
        ]
      }
</script>

    </script>
  

    <!-- WordPress styles and scripts -->
    <?php wp_head();   
    ?>
</head>
<body <?php body_class(); ?>>

    <header id="site-header" class="site-header">
        <?php 
        // Include the navigation template
        get_template_part('navigation'); 
        ?>
    </header>
