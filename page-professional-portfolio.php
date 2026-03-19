<?php
/**
 * Template Name: Professional Portfolio
 *
 * Standalone portfolio page — no header, footer, or nav links.
 * Intended for sharing directly with potential clients or employers.
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <?php wp_head(); ?>
</head>
<body <?php body_class('professional-portfolio-page'); ?>>
<?php wp_body_open(); ?>

<main>
    <?php get_template_part('portfolio-parts/hero'); ?>
    <?php get_template_part('portfolio-parts/about'); ?>
    <?php get_template_part('portfolio-parts/logo-carousel'); ?>
    <?php get_template_part('portfolio-parts/what-i-do'); ?>
    <?php get_template_part('portfolio-parts/projects'); ?>
    <?php get_template_part('portfolio-parts/contact'); ?>
</main>

<?php wp_footer(); ?>
</body>
</html>
