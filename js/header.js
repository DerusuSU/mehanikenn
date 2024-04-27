class Menu {
    constructor(obj) {
        this.button = document.querySelector(obj.button);
        this.screen = document.querySelector(obj.screen);
        this.nav = document.querySelector(obj.nav);
        this.links = document.querySelectorAll(obj.links);
        this.contacts = document.querySelectorAll(obj.contacts);
        this.contacts_cont = document.querySelector(obj.contacts_cont);
        this.init();
    }

    init() {
        this.button.addEventListener("click", this.burgerClick);
        window.addEventListener("resize", () => {
            if (window.innerWidth >= 1024) {
                this.nav.style.display = "";
                this.links.forEach((link) => {link.setAttribute("style", "")});
            }
        });
    }

    burgerClick = () => {
        this.button.classList.toggle("header__burger--close");
        if (this.button.classList.contains("header__burger--close")) {
            this.reveal();
        } else {
            this.close();
        }
    };

    reveal = () => {
        const tl = gsap.timeline({defaults: {overwrite: true}});
        gsap.set(this.links, { y: 40 });
        gsap.set(this.contacts, { y: "101%" });
        tl.to(this.screen, {
            onStart: () => (this.screen.style.display = "flex"),
            opacity: 1,
            duration: 0.5,
            overwrite: true
        });
        tl.to(this.links, {
            onStart: () => (this.nav.style.display = "block"),
            y: 0,
            duration: 0.7,
            ease: "0.25,0.1,0.25,1",
            stagger: 0.055,
        });
        tl.to(this.contacts, {
            onStart: () => (this.contacts_cont.style.display = "flex"),
            y: 0,
            duration: 0.7,
            ease: "0.25,0.1,0.25,1",
            stagger: 0.055,
        }, "<");
    };

    close = () => {
        const tl = gsap.timeline({defaults: {overwrite: true}});
        tl.to(this.contacts, {
            y: "-101%",
            duration: 0.7,
            ease: "0.25,0.1,0.25,1",
            stagger: 0.055,
            onComplete: () => (this.contacts_cont.style.display = "none"),
        });
        tl.to(this.links, {
            y: -40,
            duration: 0.7,
            ease: "0.25,0.1,0.25,1",
            stagger: 0.055,
            onComplete: () => (this.nav.style.display = "none"),
        }, "<");
        tl.to(this.screen, {
            opacity: 0,
            duration: 0.5,
            onComplete: () => (this.screen.style.display = "none"),
            overwrite: true,
        });
    };
}

const menu = new Menu({
    button: ".header__burger",
    screen: ".header__screen",
    nav: ".header__nav",
    links: ".header__link",
    contacts: ".header__contacts > span > p",
    contacts_cont: ".header__contacts",
})