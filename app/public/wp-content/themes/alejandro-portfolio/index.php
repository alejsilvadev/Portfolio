<?php
/**
 * Main template file
 * Fallback template when no more specific template is available
 */
get_header();
?>

<section class="hero" style="min-height: 60vh;">
    <div class="container">
        <div class="section-header" style="padding-top: 100px;">
            <h1 class="section-title"><?php the_title(); ?></h1>
        </div>

        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <article>
                    <div class="entry-content">
                        <?php the_content(); ?>
                    </div>
                </article>
            <?php endwhile; ?>
        <?php else : ?>
            <p>No content found.</p>
        <?php endif; ?>
    </div>
</section>

<?php get_footer(); ?>
