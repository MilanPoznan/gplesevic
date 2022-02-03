const catArhitehturaBtn = document.getElementById('cat-arhitektura'),
  catNiskogradnjaBtn = document.getElementById('cat-niskogradnja'),
  catvisokogradnjaBtn = document.getElementById('cat-visokogradnja'),
  categoryLink = document.querySelectorAll('.cat-header__link');
let niskogradnjaCat = [],
  visokogradnjaCat = [],
  arhitekturaCat = [],
  categoryBoxes = document.querySelectorAll('.project-arch__post-cat');
categoryBoxes = [...categoryBoxes];
const niskogradnjaBox = document.getElementById('project-nisk'),
  visokogradnjaBox = document.getElementById('project-visok'),
  arhitekturaBox = document.getElementById('project-arhit');

//Category get from url
const currentLocation = window.location.href
const myRegexp = /\?(.*)/;
let currentCategory = myRegexp.exec(currentLocation)
currentCategory = currentCategory !== null ? currentCategory[1] : 'arhitektura'

const getAllProjects = async () => await fetch('https://gplesevic.rs/wp-json/wp/v2/projects?_embed&per_page=100')
  .then(res => res.json())
  .then(response => sortProjectsByCategory(response))




function createSingleProject(item) {
  const { title, content, link, _embedded } = item
  // console.log(categories);
  // const cat = categories[0]

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

  // switch (cat) {

  arhitekturaBox.appendChild(htmlObject)
  // if (categories.includes(2)) {
  // }
  // else if (categories.includes(3)) {
  //   visokogradnjaBox.appendChild(htmlObject)
  // }
  // else if (categories.includes(5)) {
  //   niskogradnjaBox.appendChild(htmlObject)
  // }
}
let arhitekturaPosts = []
let visokogradnjaPosts = []
let niskogradnjaPosts = []


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

let isLoaded = false


const arhitekturaQuery = {

}

const sortProjectsByCategory = (arrayProjects) => arrayProjects.reduce((acc, curr) => {
  console.log(curr);
  if (curr.categories.includes(2)) { //Arhitektura
    acc.arhitektura.push(curr)
  } else if (curr.categories.includes(5)) { //Visokogradnja
    acc.visokogradnja.push(curr)
  } else if (curr.categories.includes(3)) {
    acc.niskogradnja.push(curr)
  } else {
    return acc
  }
  return acc
}, { arhitektura: [], niskogradnja: [], visokogradnja: [] })


async function showProjectsOnLoad(category) {

  categoryLink.forEach(item => item.classList.remove("cat-header__link--active"))

  console.log('onLoad', category)
  console.log(isLoaded);
  const allProjects = await getAllProjects()
  console.log(allProjects);
  isLoaded = true
  console.log(xxx);

  switch (category) {

    case 'niskogradnja':
      // arhitekturaBox.appendChild
      catNiskogradnjaBtn.classList.add("cat-header__link--active");

      break;

    case 'visokogradnja':
      catvisokogradnjaBtn.classList.add("cat-header__link--active");
      break;
    case 'arhitektura':

      // arhitekturaPosts.forEach(item => createSingleProject(item))
      catArhitehturaBtn.classList.add("cat-header__link--active");
      break;
    default:
      // arhitekturaPosts.forEach(item => createSingleProject(item))
      // arhitekturaBox.style.opacity = '1'
      catArhitehturaBtn.classList.add("cat-header__link--active");
      break;

  }
}

categoryLink.forEach((item) => item.addEventListener('click', showProjects))

showProjectsOnLoad(currentCategory)


// function getAllProjects() {
//   fetch('https://gplesevic.rs/wp-json/posts?type=projects')
//     .then(response => response.json())
//     .then(data => {
//       console.log('data puller', data);
//       return data.map(item => createSingleProject(item))
//     })
//     .then(() => showProjectsOnLoad(currentCategory))
// }
// getAllProjects()