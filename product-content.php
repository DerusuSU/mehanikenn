<?php
$product_id = get_the_ID();

$product_img_id = get_the_post_thumbnail_url($product_id, 'full');
?>

<a class="catalog-items__item" href="<?php the_permalink(); ?>">
    <img class="catalog-items__img" src="<?php echo $product_img_id; ?>">
    <span class="catalog-items__lable">
        <p class="catalog-items__name">
            <?php echo carbon_get_post_meta($product_id, 'product_card_title'); ?>
        </p>
    </span>
</a>