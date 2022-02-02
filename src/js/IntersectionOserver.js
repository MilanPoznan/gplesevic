let observerConfig = {
  root: null,
  rootMargin: '0px',
  threshold: 1.0
};

function observeFn(entries, observer) {
  console.log(...entries)
}
let observer = new IntersectionObserver(observeFn, observerConfig);