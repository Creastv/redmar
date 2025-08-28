<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<meta name="theme-color" content="#fff">
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title><?php wp_title('|', true, 'right'); ?></title>
<!-- Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link
    href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&display=swap"
    rel="stylesheet">
<?php wp_head(); ?>
<!-- Google Tag Manager -->
<script>
    (function(w, d, s, l, i) {
        w[l] = w[l] || [];
        w[l].push({
            'gtm.start': new Date().getTime(),
            event: 'gtm.js'
        });
        var f = d.getElementsByTagName(s)[0],
            j = d.createElement(s),
            dl = l != 'dataLayer' ? '&l=' + l : '';
        j.async = true;
        j.src =
            'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
        f.parentNode.insertBefore(j, f);
    })(window, document, 'script', 'dataLayer', 'GTM-TGJP47RZ');
</script>
<!-- End Google Tag Manager -->

</head>

<body <?php body_class(); ?>>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TGJP47RZ" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <div class="header-main ">
        <?php get_template_part('templates-parts/header/header', 'top-bar'); ?>
        <?php get_template_part('templates-parts/header/header', 'main'); ?>
        <?php get_template_part('templates-parts/header/header', 'title'); ?>
    </div>
    <main id="main">
        <?php if (is_singular('projekty')) : ?>
            <?php get_template_part('templates-parts/header/header', 'hero-project'); ?>
        <?php endif; ?>
        <div class="container">
            <div class="row">