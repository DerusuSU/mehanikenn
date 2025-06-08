<?php $page_id = get_the_ID(); ?>
<?php get_header(); ?>

<?php 

/* 
Template Name: Каталог - шаблон
*/

?>

<section class="catalog-info" style="margin-top: 0; padding-top: 120px;">
    <div class="text-info">
        <p class="text-info__subtitle">Каталог</p>
        <h2 class="text-info__title"><?php echo carbon_get_post_meta($page_id, 'catalog_title'); ?></h2>
        <div class="text-info__text">
            <div class="text-info__p">
                <p><?php echo carbon_get_post_meta($page_id, 'catalog_text_1'); ?></p>
            </div>
            <div class="text-info__p">
                <p>
                    <?php echo carbon_get_post_meta($page_id, 'catalog_text_2'); ?>
                </p>
            </div>
        </div>
    </div>
</section>

<section class="catalog-items">
    <div class="catalog-items__block">
        <div class="catalog-items__text">
            <h3 class="catalog-items__title">Классические дверцы</h3>
            <p class="catalog-items__p">Стандартные каминные дверцы, которые подойдут для
                большинства каминов. Производятся в прямоугольной форме разных размеров.
            </p>
        </div>
        <?php
        $catalog_classic_door = carbon_get_post_meta($page_id, 'catalog_classic_door');
        $catalog_classic_door_ids = wp_list_pluck($catalog_classic_door, 'id');

        if (!empty($catalog_classic_door_ids)) {
            $catalog_classic_door_query_args = [
                'post_type' => 'fireplace_door',
                'post__in' => $catalog_classic_door_ids,
            ];
            $catalog_classic_door_query = new WP_Query($catalog_classic_door_query_args);

            if ($catalog_classic_door_query->have_posts()): ?>
                <div class="catalog-items__wrapper-items">
                    <?php while ($catalog_classic_door_query->have_posts()):
                        $catalog_classic_door_query->the_post(); ?>
                        <?php echo get_template_part('product-content'); ?>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                </div>
            <?php endif;
        }
        ?>
    </div>
    <div class="catalog-items__block">
        <div class="catalog-items__text">
            <h3 class="catalog-items__title">Дверцы по эскизу</h3>
            <p class="catalog-items__p">Дверцы арочного типа изготавливаются по вашим индивидуальным размерам.</p>
        </div>
        <?php
        $catalog_arch_door = carbon_get_post_meta($page_id, 'catalog_arch_door');
        $catalog_arch_door_ids = wp_list_pluck($catalog_arch_door, 'id');

        if (!empty($catalog_arch_door_ids)) {
            $catalog_arch_door_query_args = [
                'post_type' => 'fireplace_door',
                'post__in' => $catalog_arch_door_ids,
            ];
            $catalog_arch_door_query = new WP_Query($catalog_arch_door_query_args);

            if ($catalog_arch_door_query->have_posts()): ?>
                <div class="catalog-items__wrapper-items">
                    <?php while ($catalog_arch_door_query->have_posts()):
                        $catalog_arch_door_query->the_post(); ?>
                        <?php echo get_template_part('product-content'); ?>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                </div>
            <?php endif;
        }
        ?>
    </div>
    <div class="catalog-items__block">
        <div class="catalog-items__text">
            <h3 class="catalog-items__title">Дизайнерские дверцы</h3>
            <p class="catalog-items__p">Дверцы нестандартной формы для дизайнерских проектов.</p>
        </div>
        <?php
        $catalog_design_door = carbon_get_post_meta($page_id, 'catalog_design_door');
        $catalog_design_door_ids = wp_list_pluck($catalog_design_door, 'id');

        if (!empty($catalog_design_door_ids)) {
            $catalog_design_door_query_args = [
                'post_type' => 'fireplace_door',
                'post__in' => $catalog_design_door_ids,
            ];
            $catalog_design_door_query = new WP_Query($catalog_design_door_query_args);

            if ($catalog_design_door_query->have_posts()): ?>
                <div class="catalog-items__wrapper-items">
                    <?php while ($catalog_design_door_query->have_posts()):
                        $catalog_design_door_query->the_post(); ?>
                        <?php echo get_template_part('product-content'); ?>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                </div>
            <?php endif;
        }
        ?>
    </div>
</section>
<section class="feedback">
    <div class="text-info">
        <p class="text-info__subtitle">Обратная связь</p>
        <h2 class="text-info__title">Заполните форму и наш менеджер свяжется с вами и ответит на все ваши вопросы</h2>
        <div class="text-info__text">
            <p class="text-info__p feedback__p">
                Вы можете оставить свои данные для получения обратной связи или позвонить нам для получения оперативной
                консультации.
            </p>
        </div>
    </div>
    <?php echo do_shortcode('[contact-form-7 id="50538ea" title="Feedback"]'); ?>
</section>
<?php get_footer(); ?>