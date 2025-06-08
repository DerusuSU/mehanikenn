document.addEventListener("DOMContentLoaded", (event) => {
  var splide = new Splide('.splide', {
    type: 'fade',
    rewind: true,
    pagination: false,
  });
  splide.mount();

  let tabs = document.querySelectorAll(".product__tab");
  let all_content = document.querySelectorAll(".product__content");
  let activeTab = 0;
  let old = 0;
  let heights = [];
  let dur = 0.4;
  let animation;

  for (let i = 0; i < tabs.length; i++) {
    tabs[i].index = i;
    heights.push(all_content[i].offsetHeight); // get height of each article
    gsap.set(all_content[i], { autoAlpha: 0 }); // push all articles up out of view
    tabs[i].addEventListener("click", doCoolStuff);
  }

  gsap.set(all_content[0], { autoAlpha: 1 });
  gsap.set(".product__content-box", { height: heights[0] });

  function doCoolStuff() {
    if (this.index != activeTab) {
      if (animation && animation.isActive()) {
        animation.progress(1);
      }
      animation = gsap.timeline({ defaults: { duration: 0.4 } });
      old = activeTab;
      activeTab = this.index;
      tabs[activeTab].classList.add('button-2--active');
      tabs[old].classList.remove('button-2--active');
      animation.to(all_content[old], { autoAlpha: 0, ease: "power2.in", duration: 0.25 });
      animation.to(".product__content-box", { height: heights[activeTab], duration: 0.5 });
      animation.to(all_content[activeTab], { duration: 0.25, autoAlpha: 1, ease: "power2.in" }, "-=0.25");
    }
  }

  // Product shop list
  let list_items = document.querySelectorAll(".shop__item");
  let list_wrapper = document.querySelector(".shop__wrapper");
  let item_height = list_items[0].offsetHeight;
  let list_button = document.querySelector(".shop__list-button");
  let list_height_short;
  let list_height_total;

  function shop_list_init() {
    if (list_items.length > 4) {
      list_height_short = 4 * item_height;
      list_height_total = list_items.length * item_height;
      list_wrapper.style.height = list_height_short + "px";
      for (let i = 4; i <= list_items.length; i++) {
        gsap.to(list_items[i], { autoAlpha: 0, duration: 0 });
      }
    }
    else {
      list_button.style.display = "none";
    }
  }

  shop_list_init();
  list_button.addEventListener("click", shop_list_uncover);

  function shop_list_uncover() {
    animation = gsap.timeline({ defaults: { duration: 0.4 } });
    animation.to(list_button, { autoAlpha: 0, duration: 0.25, onStart: function () { list_button.style.transition = "none" } });
    animation.to(list_button, { duration: 0.25, css: { marginTop: 0, height: 0 } });
    animation.to(".shop__wrapper", { height: list_height_total, duration: 0.3 }, "+=0.3");
    for (let i = 4; i <= list_items.length; i++) {
      animation.to(list_items[i], { autoAlpha: 1, duration: 0.3 });
    }
  }
});