document.addEventListener("DOMContentLoaded", (event) => {
    const hero_slider = new Flicking("#hero-slider", {
        circular: true,
        align: "center",
        easing: x => x,
    });

    const autoPlay = new Flicking.Plugins.AutoPlay({ duration: 1, animationDuration: 6000, });
    hero_slider.addPlugins(autoPlay);
})

// document.addEventListener("DOMContentLoaded", (event) => {
//     const gallery_slider = new Flicking("#gallery-slider", {
//         circular: false,
//         align: "prev"
//     });
// })