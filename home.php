<?php
/*
Template Name: Главная - шаблон
*/
?>
<?php $page_id = get_the_ID(); ?>

<?php get_header(); ?>
<section class="hero">
    <div class="hero__text-wrap">
        <p class="hero__subtitle">Официальный сайт завода Mehanikenn</p>
    </div>
    <div class="hero__slider flicking-viewport" id="hero-slider">
        <div class="hero__wrapper flicking-camera">
            <?php
            $hero_gallery = carbon_get_post_meta($page_id, 'gallery_hero');
            ?>

            <?php foreach ($hero_gallery as $gallery_id):
                $top_img_src = wp_get_attachment_image_url($gallery_id, 'full');
                ?>
                <div class="hero__item panel">
                    <img class="hero__img" src="<?php echo $top_img_src ?>">
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="hero__text-wrap">
        <h1 class="hero__title">Каминные дверцы mehanikenn</h1>
    </div>
</section>

<section class="about">
    <div class="text-info">
        <p class="text-info__subtitle">О нас</p>
        <h2 class="text-info__title"><?php echo carbon_get_post_meta($page_id, 'about_title'); ?></h2>
        <div class="text-info__text">
            <div class="text-info__p">
                <p>
                    <?php echo carbon_get_post_meta($page_id, 'about_text_1'); ?>
                </p>
            </div>
            <div class="text-info__p">
                <p>
                    <?php echo carbon_get_post_meta($page_id, 'about_text_2'); ?>
                </p>
            </div>
        </div>
    </div>
    <div class="about__company-digits">
        <div class="about__digit">
            <span>14000</span>
            <span>клиентов</span>
        </div>
        <div class="about__digit">
            <span>12</span>
            <span>лет компании</span>
        </div>
        <div class="about__digit">
            <span>14</span>
            <span>видов дверец</span>
        </div>
    </div>
    <div class="about__button-wrapper">
        <button class="button">
            О КОМПАНИИ
            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 7.2H12.96L10.88 5.12L12 4L16 8L12 12L10.88 10.88L12.96 8.8H0V7.2Z" fill="" />
            </svg>
        </button>
    </div class="about__button-wrapper">
</section>

<section class="catalog-info">
    <div class="text-info">
        <p class="text-info__subtitle">Каталог</p>
        <h2 class="text-info__title"><?php echo carbon_get_post_meta($page_id, 'catalog_home_title'); ?></h2>
        <div class="text-info__text">
            <div class="text-info__p">
                <p><?php echo carbon_get_post_meta($page_id, 'catalog_home_text_1'); ?></p>
            </div>
            <div class="text-info__p">
                <p>
                    <?php echo carbon_get_post_meta($page_id, 'catalog_home_text_2'); ?>
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
            <a class="catalog-items__button-wrapper" href="<?php echo get_permalink(16); ?>">
                <button class="button catalog-items__button">
                    БОЛЬШЕ
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0 7.2H12.96L10.88 5.12L12 4L16 8L12 12L10.88 10.88L12.96 8.8H0V7.2Z" fill="" />
                    </svg>
                </button>
            </a>
        </div>
        <?php
        $home_classic_door = carbon_get_post_meta($page_id, 'home_classic_door');
        $home_classic_door_ids = wp_list_pluck($home_classic_door, 'id');

        if (!empty($home_classic_door_ids)) {
            $home_classic_door_query_args = [
                'post_type' => 'fireplace_door',
                'post__in' => $home_classic_door_ids,
            ];
            $home_classic_door_query = new WP_Query($home_classic_door_query_args);

            if ($home_classic_door_query->have_posts()): ?>
                <div class="catalog-items__wrapper-items">
                    <?php while ($home_classic_door_query->have_posts()):
                        $home_classic_door_query->the_post(); ?>
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
            <a class="catalog-items__button-wrapper" href="<?php echo get_permalink(16); ?>">
                <button class="button catalog-items__button">
                    БОЛЬШЕ
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0 7.2H12.96L10.88 5.12L12 4L16 8L12 12L10.88 10.88L12.96 8.8H0V7.2Z" fill="" />
                    </svg>
                </button>
            </a>
        </div>
        <?php
        $home_arch_door = carbon_get_post_meta($page_id, 'home_arch_door');
        $home_arch_door_ids = wp_list_pluck($home_arch_door, 'id');

        if (!empty($home_arch_door_ids)) {
            $home_arch_door_query_args = [
                'post_type' => 'fireplace_door',
                'post__in' => $home_arch_door_ids,
            ];
            $home_arch_door_query = new WP_Query($home_arch_door_query_args);

            if ($home_arch_door_query->have_posts()): ?>
                <div class="catalog-items__wrapper-items">
                    <?php while ($home_arch_door_query->have_posts()):
                        $home_arch_door_query->the_post(); ?>
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
            <a class="catalog-items__button-wrapper" href="<?php echo get_permalink(16); ?>">
                <button class="button catalog-items__button">
                    БОЛЬШЕ
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0 7.2H12.96L10.88 5.12L12 4L16 8L12 12L10.88 10.88L12.96 8.8H0V7.2Z" fill="" />
                    </svg>
                </button>
            </a>
        </div>
        <?php
        $home_design_door = carbon_get_post_meta($page_id, 'home_design_door');
        $home_design_door_ids = wp_list_pluck($home_design_door, 'id');

        if (!empty($home_design_door_ids)) {
            $home_design_door_query_args = [
                'post_type' => 'fireplace_door',
                'post__in' => $home_design_door_ids,
            ];
            $home_design_door_query = new WP_Query($home_design_door_query_args);

            if ($home_design_door_query->have_posts()): ?>
                <div class="catalog-items__wrapper-items">
                    <?php while ($home_design_door_query->have_posts()):
                        $home_design_door_query->the_post(); ?>
                        <?php echo get_template_part('product-content'); ?>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                </div>
            <?php endif;
        }
        ?>
    </div>
</section>

<!-- <section class="advantages">
    <div class="advantages__panel">
        <p class="advantages__subtitle">Преимущества</p>
        <div class="advantages__arrows">
            <button class="arrow arrow--left advantages__arrow" id="adv-arrow-left">
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M-2.38419e-07 7.2H12.96L10.88 5.12L12 4L16 8L12 12L10.88 10.88L12.96 8.8H-2.38419e-07V7.2Z"
                        fill="#000000" />
                </svg>
            </button>
            <button class="arrow arrow--right advantages__arrow" id="adv-arrow-right">
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M-2.38419e-07 7.2H12.96L10.88 5.12L12 4L16 8L12 12L10.88 10.88L12.96 8.8H-2.38419e-07V7.2Z"
                        fill="#000000" />
                </svg>
            </button>
        </div>
    </div>
    <div class="advantages__slider flicking-viewport" id="advantages-slider">
        <div class="flicking-camera">
            <div class="advantages__item panel">
                <p class="advantages__index">1</p>
                <img class="advantages__icon" src="svg/icon/icon_1.svg">
                <h3 class="advantages__name">Индивидуальный подход</h3>
                <p class="advantages__text">
                    Мы предоставляем широкий выбор типовых каминных дверец, а также,
                    при необходимости, готовы изготовить дверцу по вашим определенным запросам.
                </p>
                <img class="advantages__back-icon" src="svg/icon/icon_1_shadow.svg">
            </div>
            <div class="advantages__item panel"></div>
            <div class="advantages__item panel"></div>
            <div class="advantages__item panel"></div>
            <div class="advantages__item panel"></div>
            <div class="advantages__item panel"></div>
        </div>
    </div>
</section> -->

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