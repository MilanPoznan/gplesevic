<div id="gallery-modal" class="modal">
    <div class="modal__close" id="js-close-modal"></div>
    <div class="modal__images" style="background: url('${bgImage}')">
    </div>
      <span class="modal__prev modal__slide"></span>
      <span class="modal__next modal__slide"></span>
</div>
<div class="project-galery">
      <div id="gallery-modal" class="modal">
        <div class="modal__close" id="js-close-modal"></div>
        <div class="modal__images">
          <img src=${setStarterImageToModal()} class="modal__image" /> 
        </div>
      </div>
      <div class="project-galery__wrapper">
        <!-- ${galleryArray.map( -->
          <!-- image =>  -->
            `<div class="project-galery__item" data-url=${image.galerija_image} style="background-image: url('${image.galerija_image}')">
            </div>`
          <!-- ).join('') -->
        }
      </div>
    </div>