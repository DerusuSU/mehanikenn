const benefits_slider = new Flicking("#benefits-slider", {
    gap: 40,
    align: "prev",
    preventClickOnDrag: true,
    preventDefaultOnDrag: true,
    inputType: ["touch", "mouse"],
})

const benefits_progress = document.querySelector(".benefits__progress-status");
let minRange = benefits_slider.camera.range.min;
let maxRange = benefits_slider.camera.range.max;
let benefits_position = benefits_slider.camera.position;
let benefits_percentage = 0;

benefits_slider.on("move", evt => {
    benefits_position = benefits_slider.camera.position;
    benefits_percentage = ((benefits_position - minRange) / (maxRange - minRange)) * 100;
    benefits_progress.style.width = `${benefits_percentage}%`
})

benefits_slider.on("afterResize", evt => {
    console.log("Hey")
})