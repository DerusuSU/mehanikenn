document.addEventListener("DOMContentLoaded", (event) => {
    const advantages_slider = new Flicking("#advantages-slider", {
        circular: false,
        align: "prev",
        horizontal: true,
        panelsPerView: 4,
        bound: true,
    });

    window.onresize = function () {
        adv_resize(document.body.clientWidth);
    }

    window.onload = function () {
        adv_resize(document.body.clientWidth);
    }

    function adv_resize(width) {
        if (width > 1600) {
            advantages_slider.panelsPerView = 4;
        }
        if (width <= 1600) {
            advantages_slider.panelsPerView = 3;
        }
        if (width <= 1280) {
            advantages_slider.panelsPerView = 2;
        }
        if (width <= 920) {
            advantages_slider.panelsPerView = 1;
        }
    }

    document.querySelector("#adv-arrow-left").addEventListener("click", function () {
        if (!advantages_slider.animating) advantages_slider.prev();
    }, false);
    document.querySelector("#adv-arrow-right").addEventListener("click", function () {
        if (!advantages_slider.animating) advantages_slider.next();
    }, false);
});