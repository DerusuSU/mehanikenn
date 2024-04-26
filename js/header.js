class Menu {
    constructor (obj) {
        this.button = document.querySelector(obj.button);
        this.screen = document.querySelector(obj.screen);
        this.nav = document.querySelector(obj.nav);
        // this.links = document.querySelectorAll(obj.links);
        this.contacts = document.querySelector(obj.contacts);
        this.init()
    }
    init() {
        this.bindings();

        this.button.addEventListener("click", this.burger_click);
        window.addEventListener("resize", () => {
            if (window.innerWidth >= 1024) {
                this.nav.setAttribute("style", "");
            }
        })
    }

    bindings() {
        [
            "burger_click",
            "reveal",
            "close",
        ].forEach((method) => {
            this[method] = this[method].bind(this);
        });
    }

    burger_click() {
        let i = this.button.classList.toggle("header__burger--close");
        console.log(i);
        if (i) {
            this.reveal();
        }
        else {
            this.close();
        }
    }

    reveal() {
        let tl = gsap.timeline();
        tl.to(this.screen, {
            onStart: () => {
                this.screen.style.display = "flex";
            },
            opacity: 1,
            duration: .5,
        });
        tl.to(this.nav, {
            onStart: () => {
                this.nav.style.display = "block";
            },
            opacity: 1,
            duration: .3,
            ease: "power1.in",
        });
        tl.to(this.contacts, {
            opacity: 1,
            duration: .3,
            ease: "power1.in",
        }, "<")
    }

    close() {
        let tl = gsap.timeline();
        tl.to(this.contacts, {
            opacity: 0,
            duration: .5,
            ease: "power1.out",
        })
        tl.to(this.nav, {
            onComplete: () => {
                this.nav.style.display = "none";
            },
            opacity: 0,
            duration: .5,
            ease: "power1.out",
        }, "<");
        tl.to(this.screen, {
            onComplete: () => {
                this.screen.style.display = "none";
            },
            opacity: 0,
            duration: .5,
        });
    }

}

const menu = new Menu({
    button: ".header__burger",
    screen: ".header__screen",
    nav: ".header__nav",
    // links: "",
    contacts: ".header__contacts",
})