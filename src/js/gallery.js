const focusImage = document.getElementById('js-focus-img'),
  galleryImages = document.querySelectorAll('.js-single-image');


function setImageAsFocusImage(e) {
  galleryImages.forEach(element => {
    element.classList.remove("single-projects__image--active");
  });
  e.target.classList.add('single-projects__image--active');
  let imageSrc = e.target.getAttribute('data-image');

  // console.log(imageSrc)
  focusImage.src = imageSrc
}
galleryImages.forEach((item) => item.addEventListener('click', setImageAsFocusImage))
