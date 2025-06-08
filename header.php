<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <!--<![endif]-->
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet"> -->
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <header class="header">
        <a class="header__home" href="<?php echo get_home_url(); ?>">
            <img class="header__logo"
                src="<?php echo wp_get_attachment_image_url(carbon_get_theme_option('site_logo')); ?>">
        </a>
        <nav class="header__nav">
            <?php
            wp_nav_menu(
                array(
                    'theme_location' => 'primary',
                    'menu_class' => 'header__list',
                    'container' => null,
                )
            );
            ?>
        </nav>
        <button class="header__burger">
            <span></span>
            <span></span>
        </button>
        <div class="header__screen">
            <div class="header__contacts">
                <span>
                    <p>Контакты</p>
                </span>
                <span>
                    <a class="header__contacts-phone" href="tel: <?php echo $GLOBALS['mehanikenn']['phone_1_digits']; ?>"><?php echo $GLOBALS['mehanikenn']['phone_1']; ?></a>
                </span>
                <span>
                    <a class="header__contacts-email" href="mailto: <?php echo $GLOBALS['mehanikenn']['email']; ?>"><?php echo $GLOBALS['mehanikenn']['email']; ?></a>
                </span>
                <span>
                    <p><?php echo $GLOBALS['mehanikenn']['address']; ?></p>
                </span>
            </div>
        </div>
    </header>