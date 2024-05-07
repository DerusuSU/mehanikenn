const hero_slider = new Flicking("#hero-slider", {
    circular: true,
    gap: 32,
    panelsPerView: 3,
    align: "prev"
});

const autoPlayTime = 4000;
const autoPlay = new Flicking.Plugins.AutoPlay({ duration: autoPlayTime });
hero_slider.addPlugins(autoPlay);

window.onresize = function() {
    hero_resize(document.body.clientWidth);
} 

window.onload = function() {
    hero_resize(document.body.clientWidth);
}

function hero_resize(width) {
    if (width <= 500) {
        hero_slider.panelsPerView = 2;
    }
}