jQuery(function ($) {
  $(".hero").each(function () {
    let sliderID = "#" + $(this).attr("id");
    let prev = sliderID + "__prev";
    let next = sliderID + "__next";

    const swiper = new Swiper(sliderID, {
      // Optional parameters
      direction: "horizontal",
      loop: false,
      slidesPerView: 1,
      spaceBetween: 0,
      effect: "fade",

      breakpoints: {
        768: {
          spaceBetween: 0,
          slidesPerView: 1,
        },
      },

      // Navigation arrows
      navigation: {
        nextEl: next,
        prevEl: prev,
      },
    });
  });
});
