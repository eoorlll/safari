jQuery(function ($) {
  /* Hamburger */
  $(".hamburger").click(function () {
    $("body").toggleClass("noscroll");
    $(".mobile-menu-modal").toggleClass("mobile-menu-modal--open");
    $(".hamburger").toggleClass("hamburger--open");
  });
});