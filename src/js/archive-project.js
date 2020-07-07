const catArhitehturaBtn = document.getElementById('cat-arhitektura'),
  catNiskogradnjaBtn = document.getElementById('cat-niskogradnja'),
  catvisokogradnjaBtn = document.getElementById('cat-visokogradnja'),
  categoryLink = document.querySelectorAll('.cat-header__link');
console.log(categoryLink)
let niskogradnjaCat = [],
  visokogradnjaCat = [],
  arhitekturaCat = [],
  categoryBoxes = document.querySelectorAll('.project-arch__post-cat');
categoryBoxes = [...categoryBoxes];
const niskogradnjaBox = document.getElementById('project-nisk'),
  visokogradnjaBox = document.getElementById('project-visok'),
  arhitekturaBox = document.getElementById('project-arhit');

function getAllProjects() {
  fetch('http://localhost:8888/lesevic/wp-json/wp/v2/projects?_embed')
    .then(response => response.json())
    .then(data => data.map(item => createSingleProject(item)))
}

getAllProjects()


function createSingleProject(item) {

  const { categories, title, content, link, _embedded } = item
  const cat = categories[0]
  const htmlObject = document.createElement('div');
  htmlObject.setAttribute('class', `project-box project-box--${cat}`);

  let featuredMediaUrl = Object.values(_embedded)
  featuredMediaUrl = featuredMediaUrl[0][0].source_url
  // return (
  const finalProject = `<a href="${link}" class="single-project-link">
      <div class="project-box__overlay"></div>
      <img class="" src="${featuredMediaUrl})"/>
      <div class="project-box__content">
        <h3>${title.rendered}</h3>
        ${content.rendered.substring(3, 150)}
      </div>
    </a>`;
  htmlObject.innerHTML = finalProject

  switch (cat) {
    case 2:
      niskogradnjaBox.appendChild(htmlObject)
      break;
    case 3:
      visokogradnjaBox.appendChild(htmlObject)
      break;
    case 7:
      arhitekturaBox.appendChild(htmlObject)
      break;
    default:
      break;
  }

  // return htmlObject
  // console.log(htmlObject)
  // return 
  // )

}

// setProjectToBox()
// function filterProjects(e) {
//   // let category = e.target.getAttribute('data-category')


//   switch (category) {
//     case 'niskogradnja':
//       console.log(niskogradnjaCat)
//       break;
//     case 'visokogradnja':
//       console.log(visokogradnjaCat)
//       break;
//     case 'arhitektura':
//       console.log(arhitekturaCat)

//       break;
//   }

// }

function showProjects(e) {
  //Set active class on clickable link
  categoryLink.forEach(item => item.classList.remove("cat-header__link--active"))
  e.target.classList.add("cat-header__link--active");
  //Show propper box with posts
  let category = e.target.getAttribute('data-category')
  console.log(category)
  categoryBoxes.map(item => item.style.opacity = 0)
  switch (category) {
    case 'niskogradnja':
      niskogradnjaBox.style.opacity = '1'
      break;
    case 'visokogradnja':
      visokogradnjaBox.style.opacity = '1'
      break;
    case 'arhitektura':
      arhitekturaBox.style.opacity = '1'
      break;
  }


}

categoryLink.forEach((item) => item.addEventListener('click', showProjects))

