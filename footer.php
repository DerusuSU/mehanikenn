<footer class="footer">
    <div class="footer__main">
        <div class="footer__phone-wrapper">
            <a class="footer__phone"
                href="tel: <?php echo $GLOBALS['mehanikenn']['phone_1_digits']; ?>"><?php echo $GLOBALS['mehanikenn']['phone_1']; ?></a>
            <a class="footer__phone"
                href="tel: <?php echo $GLOBALS['mehanikenn']['phone_2_digits']; ?>"><?php echo $GLOBALS['mehanikenn']['phone_2']; ?></a>
            <p class="footer__phone-label">(многоканальный)</p>
        </div>
        <div class="footer__contacts-wrapper">
            <p class="footer__email-label">Почта:</p>
            <a class="footer__email"
                href="mailto: <?php echo $GLOBALS['mehanikenn']['email']; ?>"><?php echo $GLOBALS['mehanikenn']['email']; ?></a>
            <p class="footer__address-label">Адрес:</p>
            <a class="footer__address"><?php echo $GLOBALS['mehanikenn']['address']; ?></a>
        </div>
        <nav class="footer__nav">
            <!-- <ul class="footer__list">
                    <li><a>Главная</a></li>
                    <li><a>Каталог</a></li>
                    <li><a>Сотрудничество</a></li>
                    <li><a>Контакты</a></li>
                    <li><a>О нас</a></li>
                </ul> -->
            <?php
            wp_nav_menu(
                array(
                    'theme_location' => 'primary',
                    'menu_class' => 'footer__list',
                    'container' => null,
                )
            );
            ?>
        </nav>
    </div>
    <div class="footer__bottom">
        <p>2012-2024 © MehanikenN</p>
        <a>Политика конфиденциальности</a>
    </div>
</footer>
</body>
<?php wp_footer(); ?>

</html>