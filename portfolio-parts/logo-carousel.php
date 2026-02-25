<?php
/**
 * Template Part: Logo Carousel Section
 * Two rows that move on scroll — top row left-to-right, bottom row right-to-left.
 */

$logos = get_option('alejandro_carousel_logos', array());

if (empty($logos)) {
    return;
}

// Split logos into two rows
$total = count($logos);
$half = ceil($total / 2);
$row1_logos = array_slice($logos, 0, $half);
$row2_logos = array_slice($logos, $half);

// If only a few logos, use all in both rows
if (count($row2_logos) < 2) {
    $row2_logos = $row1_logos;
}
?>

<section class="logo-carousel">
    <div class="logo-carousel-container">
        <div class="logo-carousel-row" data-direction="1">
            <?php for ($repeat = 0; $repeat < 3; $repeat++) : ?>
                <?php foreach ($row1_logos as $logo_id) :
                    $img_url = wp_get_attachment_image_url($logo_id, 'full');
                    $alt = get_post_meta($logo_id, '_wp_attachment_image_alt', true);
                    if ($img_url) :
                ?>
                    <div class="logo-carousel-item">
                        <img src="<?php echo esc_url($img_url); ?>" alt="<?php echo esc_attr($alt ?: 'Logo'); ?>">
                    </div>
                <?php endif; endforeach; ?>
            <?php endfor; ?>
        </div>
        <div class="logo-carousel-row" data-direction="-1">
            <?php for ($repeat = 0; $repeat < 3; $repeat++) : ?>
                <?php foreach ($row2_logos as $logo_id) :
                    $img_url = wp_get_attachment_image_url($logo_id, 'full');
                    $alt = get_post_meta($logo_id, '_wp_attachment_image_alt', true);
                    if ($img_url) :
                ?>
                    <div class="logo-carousel-item">
                        <img src="<?php echo esc_url($img_url); ?>" alt="<?php echo esc_attr($alt ?: 'Logo'); ?>">
                    </div>
                <?php endif; endforeach; ?>
            <?php endfor; ?>
        </div>
    </div>
</section>
