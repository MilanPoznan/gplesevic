//Elements
const $menuItem = $('.menu-item a');
const $headerMenuItems = $('#site-navigation .menu-item a');
const $mainContentDiv = $('.site-content');
const currentUrl = window.location.href;
const $hamburgerWrapper = $('.hamburger-wrapp');
const $hamburger = $('.hamburger');
const $headerMenu = $('.header__menu');
const $mobMenu = $('#primary-menu');
const $menu = $('.js-menu');
const body = document.getElementsByTagName('body');
const windowWidth = window.innerWidth;


/* START navigation */
$hamburgerWrapper.on('click', () => {
  $hamburger.toggleClass('hamburger--is-active');
  $headerMenu.toggleClass('header__menu--visible');
  $('.header').toggleClass('header--is-open');
  $('body').toggleClass('no-scroll');
  $mobMenu.toggleClass('open-menu');
});
/* END of navigation part */
$('.menu-item').on('click', (e) => console.log(e.target))
function getLastCharactersFromPageUrl(url) {
  sliceUrl = url.split('/');
  sliceUrl = sliceUrl[sliceUrl.length - 2];
}

if (windowWidth < 1200) {

  var prevScrollpos = window.pageYOffset;
  window.onscroll = function () {
    var currentScrollPos = window.pageYOffset;
    if (prevScrollpos > currentScrollPos) {
      document.getElementById("masthead").style.top = "0";
    } else {
      document.getElementById("masthead").style.top = "-200px";
      console.log('aaaa')
    }
    prevScrollpos = currentScrollPos;
  }

} 