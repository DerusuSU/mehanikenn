<?php

function wpmehanikenn_setup()
{
    load_theme_textdomain('wpmehanikenn');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    register_nav_menu('primary', 'Меню в шапке');
}
add_action('after_setup_theme', 'wpmehanikenn_setup');
add_filter('wpcf7_autop_or_not', '__return_false');

function wpmehanikenn_scripts()
{
    //подключение файлов стилей
    wp_enqueue_style('fonts-gstatic', 'https://fonts.gstatic.com');
    wp_enqueue_style('fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap');
    wp_enqueue_style('flicking', get_template_directory_uri() . '/css/flicking.css');
    wp_enqueue_style('flicking-inline', get_template_directory_uri() . '/css/flicking-inline.css');
    wp_enqueue_style('flicking-plugins', get_template_directory_uri() . '/css/flicking-plugins.css');
    wp_enqueue_style('pagination', get_template_directory_uri() . '/css/pagination.css');
    wp_enqueue_style('splide', get_template_directory_uri() . '/css/splide.min.css');
    wp_enqueue_style('style-css', get_stylesheet_uri());
    


    //подключение файлов скриптов
    wp_enqueue_script('gsap', get_template_directory_uri() . '/js/gsap.min.js');
    wp_enqueue_script('flicking', get_template_directory_uri() . '/js/flicking.pkgd.min.js');
    wp_enqueue_script('plugins', get_template_directory_uri() . '/js/plugins.js');
    wp_enqueue_script('ScrollTrigger', get_template_directory_uri() . '/js/ScrollTrigger.min.js');
    wp_enqueue_script('splide', get_template_directory_uri() . '/js/splide.min.js');
    wp_enqueue_script('header', get_template_directory_uri() . '/js/header.js');
    if ( is_page( 12 ) ) {
        wp_enqueue_script('hero', get_template_directory_uri() . '/js/hero.js');
    }
    if ( is_single() ) {
        wp_enqueue_script('product', get_template_directory_uri() . '/js/product.js');
    }
}
add_action('wp_enqueue_scripts', 'wpmehanikenn_scripts');


use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action('carbon_fields_register_fields', 'crb_attach_theme_options');
function crb_attach_theme_options()
{


    // Общие настройки сайта
    Container::make('theme_options', __('Настройки сайта'))
        ->add_tab('Общие настройки', [
            Field::make('image', 'site_logo', 'Логотип'),
        ])

        ->add_tab('Контакты', [
            Field::make('text', 'site_phone_1', 'Телефон 1'),
            Field::make('text', 'site_phone_1_digits', 'Телефон 1 без пробелов (+79000000000)'),
            Field::make('text', 'site_phone_2', 'Телефон 2 (многоканальный)'),
            Field::make('text', 'site_phone_2_digits', 'Телефон 2 без пробелов (+79000000000)'),
            Field::make('text', 'site_address', 'Адрес'),
            Field::make('text', 'site_email', 'Почта'),
        ])
        
        ->add_tab('Текст на странице товара', [
            Field::make('text', 'shop_title', 'Заголовок в блоке ссылок'),
            Field::make('text', 'shop_text_1', 'Текст в блоке ссылок 1 абзац'),
            Field::make('text', 'shop_text_2', 'Текст в блоке ссылок 2 абзац'),
            Field::make('text', 'shop_link_to_shop', 'Ссылка на главную магазина'),
        ]);
}


add_action('carbon_fields_register_fields', 'crb_post_meta');
function crb_post_meta()
{


    // Поля для главной страницы
    Container::make('post_meta', __('Дополнительные поля'))
        ->show_on_page(12)
        ->add_tab('Слайдер - главная', [
            Field::make('media_gallery', 'gallery_hero', 'Слайдер на главной'),
        ])
        ->add_tab('О нас', [
            Field::make('text', 'about_title', 'Заголовок'),
            Field::make('rich_text', 'about_text_1', 'Текст 1 (Левая колонка)'),
            Field::make('rich_text', 'about_text_2', 'Текст 2 (Правая колонка)'),
        ])
        ->add_tab('Каталог', [
            Field::make('text', 'catalog_home_title', 'Заголовок'),
            Field::make('rich_text', 'catalog_home_text_1', 'Текст 1 (Левая колонка)'),
            Field::make('rich_text', 'catalog_home_text_2', 'Текст 2 (Правая колонка)'),
            Field::make('association', 'home_classic_door', 'Дверцы классические')
                ->set_types([
                    [
                        'type' => 'post',
                        'post_type' => 'fireplace_door',
                    ]
                ]),
            Field::make('association', 'home_arch_door', 'Дверцы по эскизу')
                ->set_types([
                    [
                        'type' => 'post',
                        'post_type' => 'fireplace_door',
                    ]
                ]),
            Field::make('association', 'home_design_door', 'Дверцы дизайнерские')
                ->set_types([
                    [
                        'type' => 'post',
                        'post_type' => 'fireplace_door',
                    ]
                ]),
        ]);



    // Поля для страницы каталога
    Container::make('post_meta', __('Дополнительные поля'))
        ->show_on_page(16)
        ->add_tab('Каталог', [
            Field::make('text', 'catalog_title', 'Заголовок'),
            Field::make('rich_text', 'catalog_text_1', 'Текст 1 (Левая колонка)'),
            Field::make('rich_text', 'catalog_text_2', 'Текст 2 (Правая колонка)'),
            Field::make('association', 'catalog_classic_door', 'Дверцы классические')
                ->set_types([
                    [
                        'type' => 'post',
                        'post_type' => 'fireplace_door',
                    ]
                ]),
            Field::make('association', 'catalog_arch_door', 'Дверцы по эскизу')
                ->set_types([
                    [
                        'type' => 'post',
                        'post_type' => 'fireplace_door',
                    ]
                ]),
            Field::make('association', 'catalog_design_door', 'Дверцы дизайнерские')
                ->set_types([
                    [
                        'type' => 'post',
                        'post_type' => 'fireplace_door',
                    ]
                ]),
        ]);


    // Поля для страницы товара
    Container::make('post_meta', __('Основная информация'))
        ->show_on_post_type('fireplace_door')
        ->add_tab('Галерея товара', [
            Field::make('media_gallery', 'gallery_product', 'Слайдер на странице товара'),
        ])
        ->add_tab('Информация о товаре', [
            Field::make('text', 'product_subtitle', 'Класс товара (например: MEHANIKENN «PRO»)'),
            Field::make('text', 'product_title', 'Название товара на странице (например: Классическая одностворчатая каминная дверца)'),
            Field::make('text', 'product_card_title', 'Название товара в карточке (например: «PRO» Одностворчатая)'),
            Field::make('rich_text', 'product_text', 'Описание товара'),
            Field::make('rich_text', 'product_advantages', 'Преимущества товара (маркированый список)'),
        ])
        ->add_tab('Характеристики товара', [
            Field::make('text', 'product_min-height', 'Минимальная высота')->set_width(20),
            Field::make('text', 'product_max-height', 'Максимальная высота')->set_width(20),
            Field::make('text', 'product_min-length', 'Минимальная ширина')->set_width(20),
            Field::make('text', 'product_max-length', 'Максимальная ширина')->set_width(20),
            Field::make('text', 'product_width', 'Глубина')->set_width(20),
        ])
        ->add_tab('Список ссылок', [
            Field::make('complex', 'links_to_shop', 'Добавление ссылок на страницу магазина')
            ->add_fields( array(
                Field::make("text", "length", "Длина")->set_width(20),
                Field::make("text", "width", "Ширина")->set_width(20),
                Field::make("text", "knob", "Ручка (слева, справа) (с маленькой буквы)")->set_width(60),
                Field::make("text", "link", "Ссылка на страницу магазина")->set_width(100),
            )),
        ]);
}


add_action('init', 'create_global_variable');
function create_global_variable()
{
    global $mehanikenn;
    $mehanikenn = [
        'phone_1' => carbon_get_theme_option('site_phone_1'),
        'phone_1_digits' => carbon_get_theme_option('site_phone_1_digits'),
        'phone_2' => carbon_get_theme_option('site_phone_2'),
        'phone_2_digits' => carbon_get_theme_option('site_phone_2_digits'),
        'address' => carbon_get_theme_option('site_address'),
        'email' => carbon_get_theme_option('site_email'),
    ];
}

add_action('init', 'register_post_types');
function register_post_types()
{
    register_post_type('fireplace_door', [
        'labels' => [
            'name' => 'Товары', // основное название для типа записи
            'singular_name' => 'Товар', // название для одной записи этого типа
            'add_new' => 'Добавить товар', // для добавления новой записи
            'add_new_item' => 'Добавление товара', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item' => 'Редактирование товара', // для редактирования типа записи
            'new_item' => 'Новый товар', // текст новой записи
            'view_item' => 'Смотреть товар', // для просмотра записи этого типа.
            'search_items' => 'Искать товар', // для поиска по этим типам записи
            'not_found' => 'Не найдено', // если в результате поиска ничего не было найдено
            'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
            'parent_item_colon' => '', // для родителей (у древовидных типов)
            'menu_name' => 'Товары', // название меню
        ],
        'public' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-cart',
        'show_in_rest' => true,
        'supports' => ['title', 'thumbnail', 'page-attributes'],
        'rewrite' => array('slug' => 'catalog', 'with_front' => false),
        'has_archive' => false,
    ]);

    register_post_type('advantages', [
        'labels' => [
            'name' => 'Преимущества', // основное название для типа записи
            'singular_name' => 'Преимущество', // название для одной записи этого типа
            'add_new' => 'Добавить преимущество', // для добавления новой записи
            'add_new_item' => 'Добавить', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item' => 'Редактировать', // для редактирования типа записи
            'new_item' => 'Новое преимущество', // текст новой записи
            'view_item' => 'Смотреть', // для просмотра записи этого типа.
            'search_items' => 'Искать', // для поиска по этим типам записи
            'not_found' => 'Не найдено', // если в результате поиска ничего не было найдено
            'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
            'parent_item_colon' => '', // для родителей (у древовидных типов)
            'menu_name' => 'Преимущества', // название меню
        ],
        'public' => true,
        'menu_position' => 6,
        'menu_icon' => 'dashicons-star-empty',
        'show_in_rest' => true,
        'supports' => ['title'],
        'has_archive' => false,
        'publicly_queryable' => false,
    ]);

    register_taxonomy('product-categories', 'fireplace_door', [
        'labels' => [
            'name' => 'Категории товаров',
            'singular_name' => 'Категория товара',
            'search_items' => 'Искать категории',
            'all_items' => 'Все категории',
            'edit_item' => 'Изменить категорию',
            'update_item' => 'Обновить категорию',
            'add_new_item' => 'Добавить новую категорию',
            'new_item_name' => 'Новое название категории',
            'separate_items_with_commas' => 'Отделить категории запятыми',
            'add_or_remove_items' => 'Добавить или удалить категорию',
            'chose_from_most_used' => 'Выбрать самую популярную категорию',
            'menu_name' => 'Категории',
            'back_to_items' => '← Назад',
        ],
        'hierarchical' => true,
    ]);

}