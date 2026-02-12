<?php
/**
 * Single Project Template
 */
get_header();

$live_url = get_post_meta(get_the_ID(), '_project_live_url', true);
$github_url = get_post_meta(get_the_ID(), '_project_github_url', true);
$technologies = get_post_meta(get_the_ID(), '_project_technologies', true);
$highlight_title = get_post_meta(get_the_ID(), '_project_highlight_title', true);
$highlight_text = get_post_meta(get_the_ID(), '_project_highlight_text', true);
$highlight_image = get_post_meta(get_the_ID(), '_project_highlight_image', true);
$highlight_lottie = get_post_meta(get_the_ID(), '_project_highlight_lottie', true);
$highlight_media_type = get_post_meta(get_the_ID(), '_project_highlight_media_type', true) ?: 'image';
$lottie_url = $highlight_lottie ? wp_get_attachment_url($highlight_lottie) : '';
?>

<section class="project-single">
    <div class="container">
        <div class="project-single-header">
            <a href="<?php echo home_url('/#projects'); ?>" class="back-link">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M19 12H5M12 19l-7-7 7-7"/>
                </svg>
                Back to Projects
            </a>
            <h1 class="project-single-title"><?php the_title(); ?></h1>
            <?php if ($technologies) : ?>
                <div class="project-single-tech">
                    <?php
                    $tech_array = array_map('trim', explode(',', $technologies));
                    foreach ($tech_array as $tech) :
                    ?>
                        <span class="tech-tag"><?php echo esc_html($tech); ?></span>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>

        <?php if (has_post_thumbnail()) : ?>
            <div class="project-single-image">
                <?php the_post_thumbnail('full'); ?>
            </div>
        <?php endif; ?>

        <div class="project-single-content">
            <div class="project-single-description">
                <?php the_content(); ?>
            </div>

            <div class="project-single-sidebar">
                <div class="project-single-links">
                    <?php if ($live_url) : ?>
                        <a href="<?php echo esc_url($live_url); ?>" class="btn btn-primary" target="_blank" rel="noopener">
                            View Live Site
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6M15 3h6v6M10 14L21 3"/>
                            </svg>
                        </a>
                    <?php endif; ?>
                    <?php if ($github_url) : ?>
                        <a href="<?php echo esc_url($github_url); ?>" class="btn btn-secondary" target="_blank" rel="noopener">
                            View on GitHub
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"/>
                            </svg>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <?php if ($highlight_title || $highlight_text || $highlight_image || $highlight_lottie) : ?>
            <div class="project-highlight">
                <div class="project-highlight-text">
                    <?php if ($highlight_title) : ?>
                        <h2><?php echo esc_html($highlight_title); ?></h2>
                    <?php endif; ?>
                    <?php if ($highlight_text) : ?>
                        <div class="highlight-content">
                            <?php echo wp_kses_post($highlight_text); ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="project-highlight-media">
                    <?php if ($highlight_media_type === 'lottie' && $lottie_url) : ?>
                        <lottie-player
                            src="<?php echo esc_url($lottie_url); ?>"
                            background="transparent"
                            speed="1"
                            loop
                            autoplay>
                        </lottie-player>
                    <?php elseif ($highlight_image) : ?>
                        <?php echo wp_get_attachment_image($highlight_image, 'large'); ?>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php get_footer(); ?>
