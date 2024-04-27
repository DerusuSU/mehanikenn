// let wrapper = document.querySelector(".hero__wrapper");
// let focus_position = (document.documentElement.clientWidth / 2) + 16;
// let focused_start_pos = document.querySelector(".hero__item--focus").getBoundingClientRect().x;
// let wrapper_start_pos = focus_position - focused_start_pos;
// let focused_width, item_width;

// function init() {
//     wrapper.style.left = wrapper_start_pos + "px";
//     item_width = document.querySelector(".hero__item").getBoundingClientRect.width;
//     focused_width = document.querySelector(".hero__item--focus").getBoundingClientRect.width;
// }

const lerp = (f0, f1, t) => (1 - t) * f0 + t * f1;
const clamp = (val, min, max) => Math.max(min, Math.min(val, max));

class DragScroll {
    constructor (obj) {
        this.el = document.querySelector(obj.el);
        this.wrap = document.querySelector(obj.wrap);
        this.items = document.querySelectorAll(obj.item);
        this.focused = document.querySelector(obj.focused);
        this.init();
    }

    init() {
        this.progress = 0;
        this.x = 0;
        this.oldx = 0;
        this.speed = 0;
        this.playrate = 0;

        this.bindings();
        this.events();
        this.calculate();
        this.raf();
    }

    bindings() {
        [
            "events",
            "calculate",
            "raf",
            "handleWheel",
            "move",
            "handleTouchStart",
            "handleTouchMove",
            "handleTouchEnd"
        ].forEach((method) => {
            this[method] = this[method].bind(this);
        })
    }
    
    calculate() {
        this.progress = 0;
        this.itemWidth = this.items[0].clientWidth;
        this.focusWidth = this.focused.clientWidth;
        (this.wrapWidth = (this.itemWidth + 24) * (this.items.length - 1) + this.focusWidth);
        this.wrap.style.width = `${this.wrapWidth}px`;
        this.maxScroll = this.wrapWidth - this.el.clientWidth;

        this.focus_position = (document.documentElement.clientWidth / 2) + 16;
        this.focused_start_pos = this.focused.getBoundingClientRect().x;
        this.prev_focus_pos = this.focus_position - this.itemWidth - 24;
        this.next_focus_pos = this.focus_position + this.focusWidth + 24;

        this.progress = Math.abs(this.focus_position - this.focused_start_pos);

    }

    handleWheel(e) {
        this.progress += e.deltaY;
        this.move();
    }

    handleTouchStart(e) {
        e.preventDefault();
        this.dragging = true;
        this.startX = e.clientX || e.touches[0].clientX;
    }

    handleTouchMove(e) {
        if (!this.dragging) return false;
        const x = e.clientX || e.touches[0].clientX;
        this.progress += (this.startX - x) * 2.5;
        this.startX = x;
        this.move();
    }

    handleTouchEnd() {
        this.dragging = false;
    }

    move() {
        this.progress = clamp(this.progress, 0, this.maxScroll);
        this.items.forEach((item) => {
            
        })
    }

    events() {
        window.addEventListener("resize", this.calculate);
        window.addEventListener("wheel", this.handleWheel);

        this.el.addEventListener("touchstart", this.handleTouchStart);
        window.addEventListener("touchmove", this.handleTouchMove);
        window.addEventListener("touchend", this.handleTouchEnd);

        this.el.addEventListener("mousedown", this.handleTouchStart);
        this.el.addEventListener("mousemove", this.handleTouchMove);
        this.el.addEventListener("mouseup", this.handleTouchEnd);
        document.body.addEventListener("mouseleave", this.handleTouchEnd);
    }

    raf() {
        this.x = lerp(this.x, this.progress, 0.1);
        this.playrate = this.x / this.maxScroll;

        this.wrap.style.transform = `translatex(${-this.x}px)`;
        
        this.speed = Math.min(100, this.oldX - this.x);
        this.oldx = this.x;

        this.scale = lerp(this.scale, this.speed, 0.1);
        this.items.forEach((item) => {
            item.style.transform = `scale(${1 - Math.abs(this.speed) *0.005})`;
        })
    }
}   

const scroll = new DragScroll({
    el: ".hero__slider",
    wrap: ".hero__wrapper",
    item: ".hero__item",
    focused: ".hero__item--focus",
});

const animateScroll = () => {
    requestAnimationFrame(animateScroll);
    scroll.raf();
}

animateScroll();