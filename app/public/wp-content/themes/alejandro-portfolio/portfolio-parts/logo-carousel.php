<?php
/**
 * Template Part: Logo Carousel Section
 */

$logos = get_option('alejandro_carousel_logos', array());

if (empty($logos)) {
    return;
}
?>

<section class="logo-carousel">
    <div class="logo-carousel-container">
        <div class="logo-carousel-track">
            <?php foreach ($logos as $logo_id) :
                $img_url = wp_get_attachment_image_url($logo_id, 'full');
                $alt = get_post_meta($logo_id, '_wp_attachment_image_alt', true);
                if ($img_url) :
            ?>
                <div class="logo-carousel-item">
                    <img src="<?php echo esc_url($img_url); ?>" alt="<?php echo esc_attr($alt); ?>">
                </div>
            <?php endif; endforeach; ?>

            <?php foreach ($logos as $logo_id) :
                $img_url = wp_get_attachment_image_url($logo_id, 'full');
                $alt = get_post_meta($logo_id, '_wp_attachment_image_alt', true);
                if ($img_url) :
            ?>
                <div class="logo-carousel-item">
                    <img src="<?php echo esc_url($img_url); ?>" alt="<?php echo esc_attr($alt); ?>">
                </div>
            <?php endif; endforeach; ?>
        </div>
    </div>
</section>
