// import './IntersectionObserver'

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
    }
    prevScrollpos = currentScrollPos;
  }

}

// ******** ObSERVER
const servicesCards = document.querySelectorAll('.services__content')
const projectHomeSection = document.querySelector('.projects');
const aboutHomeSection = document.querySelector('.about-us');
const aktuelnostiHomeSection = document.querySelector('.aktuelnosti');
const clientsTestmonHomeSection = document.querySelectorAll('.clients__testemonials-wrap')
// console.log(clientsTestmonHomeSection)
let observerConfig = {
  root: null,
  rootMargin: '0px',
  threshold: 0.8
};
let clientsObserverConfig = {
  root: null,
  rootMargin: '250px',
  threshold: 0.3
}

function observeFn(entries) {
  let [interElements] = entries
  console.log(entries);
  interElements.isIntersecting && interElements.target.classList.add(`open`);
}

function cliebtObserverFn(entries) {
  console.log(entries)
  entries.map(item => setTimeout(() => item.isIntersecting && item.target.classList.add(`open`)), 500)
  // let [interElements] = entries
  // interElements = [...interElements]
  // let x = Array.from(interElements)
  // console.log(entrie)
  // interElements.target
  // interElements.isIntersecting && setTimeout(() => 

}

// On ispali callback funckiju koja se nalazi u konstruktoru kada dodje do elementa 
let observer = new IntersectionObserver(observeFn, observerConfig);
let clientsObserver = new IntersectionObserver(cliebtObserverFn, observerConfig);
// const aktuelnostiObserver = new IntersectionObserver()
projectHomeSection && observer.observe(projectHomeSection)
aboutHomeSection && observer.observe(aboutHomeSection)
aktuelnostiHomeSection && observer.observe(aktuelnostiHomeSection)


clientsTestmonHomeSection.forEach(element => {
  clientsObserver.observe(element)
});
// observer.unobserve(projectHomeSection);
// observer.disconnect();
