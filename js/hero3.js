const gap = 24;
let offset, slide_size, focused_size;

let positions = {
    prev: null,
    focus: (document.documentElement.clientWidth / 2) + 16,
    next: null,
}

const hero_slider = new Flicking("#hero-slider", {
    circular: true,
    gap: 24,
    align: { camera: `${positions.focus}px`, panel: "0px" },
    preventClickOnDrag: true,
    preventDefaultOnDrag: true,
    inputType: ["touch", "mouse"],
    threshold: 0,
    iOSEdgeSwipeThreshold: 0,

});

// slide_size = hero_slider.currentPanel.next().size;
// hero_slider.next();
// hero_slider.currentPanel.setSize({width: slide_size*2, height: slide_size*2});
// hero_slider.viewport.setSize({ height: slide_size*2 });
const autoPlayTime = 4000;
const autoPlay = new Flicking.Plugins.AutoPlay({ duration: autoPlayTime });
hero_slider.addPlugins(autoPlay);

// position_resize();

// function position_resize() {
//     positions.focus = (document.documentElement.clientWidth / 2) + 16;
//     positions.next = hero_slider.currentPanel.next().element.getBoundingClientRect().x;
//     positions.prev = hero_slider.currentPanel.prev().element.getBoundingClientRect().x;
// }

// hero_slider.on("changed", evt => {
//     // console.log(evt);
//     evt.panel.setSize({ width: slide_size*2, height: slide_size*2 });
//     evt.prevPanel.setSize({ width: slide_size, height: slide_size });
    
// })

// function hero_resize(w) {
//     slide_size = hero_slider.currentPanel.next().size;
//     position_resize();
//     if (w <= 500) {
//         positions.focus = 16;
//     }
//     hero_slider.viewport.setSize({ height: slide_size*2});
//     hero_slider.align = { camera: `${positions.focus}px`, panel: "0px" };

//     hero_slider.init();
// }

// window.onload = function() {
//     console.log("init");
//     hero_resize(document.body.clientWidth);
// }
// window.onresize = function() {
//     console.log("resize");
//     hero_resize(document.body.clientWidth);
// }







// hero_slider.on("move", evt => {
//     // console.log(evt)
//     hero_slider.panels.forEach(element => {
//         let pos = element.element.getBoundingClientRect().x;
//         if ( pos > positions.prev && pos < positions.next) {
            
//         }
//     });
// })

// hero_slider.on("changed", evt => {
//     evt.panel.setSize({ width: focused_size, height: focused_size });
//     evt.prevPanel.setSize({ width: slide_size, height: slide_size });
// })

// flicking.on("ready", evt => {
//     flicking.currentPanel.setSize({ width: focused_size, height: focused_size });
// })


// window.onload = function () {
//     initSlider(document.body.clientWidth);
// };

// window.onresize = function () {
//     initSlider(document.body.clientWidth);
// };

// function initSlider(w) {
//     positions.focus = (w / 2) + 16;
//     switch (true) {
//         case (w > 1440):
//             focused_size = 400;
//             slide_size = 200;
//             break;
//         case (w <= 1440 && w > 768):
//             focused_size = 248;
//             slide_size = 160;
//             break;
//         case (w <= 768 && w > 500):
//             focused_size = 280;
//             slide_size = 160;
//             positions.focus = 32;
//             break;
//         case (w <= 500):
//             focused_size = 280;
//             slide_size = 160;
//             positions.focus = 16;
//             break;
//     }

//     hero_slider.viewport.setSize({ height: focused_size });
//     hero_slider.panels.forEach(element => {
//         element.setSize({ width: slide_size, height: slide_size });
//     });
//     // hero_slider.currentPanel.setSize({ width: focused_size, height: focused_size });
//     hero_slider.align = { camera: `${positions.focus}px`, panel: "0px" };
//     hero_slider.resize();
// }