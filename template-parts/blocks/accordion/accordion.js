jQuery(function ($) {
  $(".accordion__head").click(function () {
    $(this).next(".accordion__content").slideToggle();
    $(this).closest(".accordion").toggleClass("accordion--open");
  });
});
