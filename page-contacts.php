<?php
/*
Template Name: Контакты - шаблон
*/
?>
<?php $page_id = get_the_ID(); ?>
<?php get_header(); ?>

<section class="contacts">
    <div class="contacts__crumbs">
        <p class="contacts__crumbs-p"><a href="<?php echo get_home_url(); ?>">Главная</a> / Контакты</p>
    </div>
    <div class="contacts__map">
        <div style="position:relative;overflow:hidden;width: 100%; height:100%;"><a
                href="https://yandex.ru/maps/org/mekhanikenn/49811445151/?utm_medium=mapframe&utm_source=maps"
                style="color:#eee;font-size:12px;position:absolute;top:0px;">Механикенн</a><a
                href="https://yandex.ru/maps/2/saint-petersburg/category/fireplaces_stoves/184107993/?utm_medium=mapframe&utm_source=maps"
                style="color:#eee;font-size:12px;position:absolute;top:14px;">Камины, печи в Санкт‑Петербурге</a><iframe
                src="https://yandex.ru/map-widget/v1/?from=mapframe&ll=30.444855%2C59.837375&mode=search&poi%5Buri%5D=ymapsbm1%3A%2F%2Forg%3Foid%3D49811445151&sctx=ZAAAAAgBEAAaKAoSCfwBDwwgcD5AEXPVPEfk601AEhIJWzc1EGXjtj8RIq629DL%2Fpj8iBgABAgMEBSgKOABA5K4HSAFqAnJ1nQHNzEw9oAEAqAEAvQEFLRPjwgEGn6v5x7kBggIU0LzQtdGF0LDQvdC40LrQtdC90L2KAgCSAgCaAgxkZXNrdG9wLW1hcHM%3D&sll=30.444855%2C59.837375&source=mapframe&sspn=0.123253%2C0.034516&text=%D0%BC%D0%B5%D1%85%D0%B0%D0%BD%D0%B8%D0%BA%D0%B5%D0%BD%D0%BD&utm_source=mapframe&z=14"
                width="100%" height="100%" frameborder="0" allowfullscreen="true" style="position:relative;"></iframe>
        </div>
    </div>
    <div class="contacts__info">
        <div class="contacts__item">
            <h2 class="contacts__title">основная информация</h2>
            <p class="contacts__text">Торговый дом «Механикенн» в лице, ИП Бороздина Ольга Германовна.<br>
                Свидетельство о регистрации (ОГРНИП) 320784700187836 от 27.08.2020г.,
                выдано МИФНС № 15 по Санкт-Петербургу ИНН 782509424126</p>
        </div>
        <div class="contacts__item">
            <h2 class="contacts__title">Адрес</h2>
            <p class="contacts__text"><?php echo $GLOBALS['mehanikenn']['address']; ?></p>
        </div>
        <div class="contacts__item">
            <h2 class="contacts__title">Телефон</h2>
            <p class="contacts__text">
                <?php echo $GLOBALS['mehanikenn']['phone_2']; ?><br><?php echo $GLOBALS['mehanikenn']['phone_1']; ?></p>
        </div>
        <div class="contacts__item">
            <h2 class="contacts__title">Почта</h2>
            <p class="contacts__text"><?php echo $GLOBALS['mehanikenn']['email']; ?></p>
        </div>
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