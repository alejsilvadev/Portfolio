<?php
/**
 * Template Name: Portfolio Page
 *
 * This template displays the full portfolio with all sections
 */
get_header();
?>

<?php get_template_part('portfolio-parts/hero'); ?>

<?php get_template_part('portfolio-parts/about'); ?>

<?php get_template_part('portfolio-parts/logo-carousel'); ?>

<?php get_template_part('portfolio-parts/what-i-do'); ?>

<?php get_template_part('portfolio-parts/projects'); ?>

<?php get_template_part('portfolio-parts/contact'); ?>

<?php get_footer(); ?>
