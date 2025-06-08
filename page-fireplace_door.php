<?php

/* 
Template Name: Страница товара - шаблон
Template Post Type: fireplace_door
*/

?>

<?php
$page_id = get_the_ID();
$links = carbon_get_post_meta(get_the_ID(), 'links_to_shop');
?>


<?php get_header(); ?>
<section class="product">
    <div class="product__crumbs">
        <p class="product__crumbs-p"><a href="<?php echo get_home_url(); ?>">Главная</a> / <a href="<?php echo get_permalink(16); ?>">Каталог</a> / Классическая одностворчатая каминная дверца «PRO»</p>
    </div>
    <div class="product__slider splide">
        <div class="splide__arrows">
            <button class="splide__arrow splide__arrow--prev arrow product__arrow" id="prdct-arrow-left">
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M-2.38419e-07 7.2H12.96L10.88 5.12L12 4L16 8L12 12L10.88 10.88L12.96 8.8H-2.38419e-07V7.2Z"
                        fill="#000000" />
                </svg>
            </button>
            <button class="splide__arrow splide__arrow--next arrow product__arrow" id="prdct-arrow-right">
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M-2.38419e-07 7.2H12.96L10.88 5.12L12 4L16 8L12 12L10.88 10.88L12.96 8.8H-2.38419e-07V7.2Z"
                        fill="#000000" />
                </svg>
            </button>
        </div>
        <div class="splide__track">
            <ul class="splide__list">
                <?php
                $product_gallery = carbon_get_post_meta($page_id, 'gallery_product');
                ?>
                <?php foreach ($product_gallery as $gallery_id):
                    $top_img_src = wp_get_attachment_image_url($gallery_id, 'full');
                    ?>
                    <li class="product__item splide__slide">
                        <img class="product__image" src="<?php echo $top_img_src ?>">
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
    <div class="product__info">
        <div class="product__name">
            <p class="product__subtitle"><?php echo carbon_get_post_meta($page_id, 'product_subtitle'); ?></p>
            <h2 class="product__title"><?php echo carbon_get_post_meta($page_id, 'product_title'); ?></h2>
        </div>
        <div class="product__description">
            <div class="product__tabs">
                <button class="button-2 product__tab button-2--active">Описание</button>
                <button class="button-2 product__tab">Особенности</button>
                <button class="button-2 product__tab">Размеры</button>
            </div>
            <div class="product__content-box">
                <div class="product__content product__content--active">
                    <p>
                        <?php echo carbon_get_post_meta($page_id, 'product_text'); ?>
                    </p>
                </div>
                <div class="product__content">
                    <?php echo carbon_get_post_meta($page_id, 'product_advantages'); ?>
                </div>
                <div class="product__content product__sizes">
                    <div class="product__size">
                        <p>Высота</p>
                        <p>от <?php echo carbon_get_post_meta($page_id, 'product_min-height'); ?>мм до
                            <?php echo carbon_get_post_meta($page_id, 'product_max-height'); ?>мм
                        </p>
                    </div>
                    <div class="product__size">
                        <p>Ширина</p>
                        <p>от <?php echo carbon_get_post_meta($page_id, 'product_min-length'); ?>мм до
                            <?php echo carbon_get_post_meta($page_id, 'product_max-length'); ?>мм
                        </p>
                    </div>
                    <div class="product__size">
                        <p>Глубина</p>
                        <p><?php echo carbon_get_post_meta($page_id, 'product_width'); ?>мм</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="shop">
    <div class="text-info">
        <p class="text-info__subtitle">Заказ</p>
        <h2 class="text-info__title"><?php echo carbon_get_theme_option('shop_title'); ?></h2>
        <div class="text-info__text shop__text">
            <div class="text-info__p shop__p">
                <p><?php echo carbon_get_theme_option('shop_text_1'); ?></p>
            </div>
            <div class="text-info__p shop__p">
                <p><?php echo carbon_get_theme_option('shop_text_2'); ?></p>
            </div>
        </div>
        <a class="shop__button-wrapper" href="<?php echo carbon_get_theme_option('shop_link_to_shop'); ?>">
            <button class="button">
                ИНТЕРНЕТ-МАГАЗИН
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0 7.2H12.96L10.88 5.12L12 4L16 8L12 12L10.88 10.88L12.96 8.8H0V7.2Z" fill="" />
                </svg>
            </button>
        </a>
        <div class="shop__line"></div>
    </div>
    <div class="shop__list">
        <div class="shop__labels">
            <span class="shop__label">Ширина</span>
            <span class="shop__label">Высота</span>
            <span class="shop__label">Расположение ручки</span>
        </div>
        <ul class="shop__wrapper">
            <?php if ($links): ?>
                <?php foreach ($links as $link): ?>
                    <li class="shop__item">
                        <a href="<?php echo $link["link"] ?>">
                            <span class="shop__label shop__label--val"><?php echo esc_html($link["length"]) ?>мм</span>
                            <span class="shop__label shop__label--val"><?php echo esc_html($link["width"]) ?>мм</span>
                            <span class="shop__label shop__label--val"><span>Ручка
                                </span><?php echo esc_html($link["knob"]) ?></span>
                            <button class="arrow">
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M-2.38419e-07 7.2H12.96L10.88 5.12L12 4L16 8L12 12L10.88 10.88L12.96 8.8H-2.38419e-07V7.2Z"
                                        fill="#000000" />
                                </svg>
                            </button>
                        </a>
                    </li>
                <?php endforeach; ?>
            <?php endif; ?>
        </ul>
        <button class="button shop__list-button">
            РАЗВЕРНУТЬ
            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M7.25 7.25411V0H8.75V7.25411H16V8.75411H8.75V16H7.25V8.75411H0V7.25411H7.25Z" fill="" />
            </svg>
        </button>
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