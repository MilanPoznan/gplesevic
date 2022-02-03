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


// dipl states
let isArhitectDisplayed = false
let isVisokogradDisplayed = false
let isNiskogradDisplayed = false

//Category get from url
const currentLocation = window.location.href
const myRegexp = /\?(.*)/;
let currentCategory = myRegexp.exec(currentLocation)
currentCategory = currentCategory !== null ? currentCategory[1] : 'arhitektura'

const getAllProjects = async () => await fetch('https://gplesevic.rs/wp-json/wp/v2/projects?_embed&per_page=100')
  .then(res => res.json())
  .then(response => sortProjectsByCategory(response))

let allProjectsGlobal = []

function createSingleProject(item, category) {

  const { title, content, link, _embedded } = item

  const htmlObject = document.createElement('div');

  htmlObject.setAttribute('class', `project-box project-box--`);

  let featuredMediaUrl = Object.values(_embedded)
  featuredMediaUrl = featuredMediaUrl[0][0].source_url

  const finalProject = `<a href="${link}" class="single-project-link">
      <div class="project-box__overlay"></div>
      <img class="" src="${featuredMediaUrl})"/>
      <div class="project-box__content">
        <h3>${title.rendered}</h3>
        ${content.rendered.substring(3, 150)}
      </div>
    </a>`;
  htmlObject.innerHTML = finalProject

  switch (category) {
    case 'arhitektura':
      arhitekturaBox.appendChild(htmlObject)
      arhitekturaBox.style.display = 'flex';
      break;
    case 'niskogradnja':
      niskogradnjaBox.style.display = 'flex';
      niskogradnjaBox.appendChild(htmlObject)
      break;
    case 'visokogradnja':
      visokogradnjaBox.style.display = 'flex';
      visokogradnjaBox.appendChild(htmlObject)
      break;
  }


}


function showProjects(e) {
  //Set active class on clickable link
  categoryLink.forEach(item => item.classList.remove("cat-header__link--active"))
  e.target.classList.add("cat-header__link--active");
  //Show propper box with posts
  let category = e.target.getAttribute('data-category')
  categoryBoxes.map(item => item.style.display = 'none')
  console.log(allProjectsGlobal);
  switch (category) {
    case 'niskogradnja':
      if (!isNiskogradDisplayed) {
        allProjectsGlobal.niskogradnja.forEach(item => createSingleProject(item, 'niskogradnja'))
        isNiskogradDisplayed = true
      }
      niskogradnjaBox.style.display = 'flex';
      break;
    case 'visokogradnja':
      if (!isVisokogradDisplayed) {
        allProjectsGlobal.visokogradnja.forEach(item => createSingleProject(item, 'visokogradnja'))
        isVisokogradDisplayed = true
      }
      visokogradnjaBox.style.display = 'flex';
      break;
    case 'arhitektura':
      if (!isArhitectDisplayed) {
        allProjectsGlobal.arhitektura.forEach(item => createSingleProject(item, 'arhitektura'))
        isArhitectDisplayed = true
      }
      arhitekturaBox.style.display = 'flex';
      break;
  }
}

let isLoaded = false

const sortProjectsByCategory = (arrayProjects) => arrayProjects.reduce((acc, curr) => {
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

  const allProjects = await getAllProjects()
  allProjectsGlobal = allProjects

  isLoaded = true

  switch (category) {

    case 'niskogradnja':
      catNiskogradnjaBtn.classList.add("cat-header__link--active");
      allProjects.niskogradnja.forEach(item => createSingleProject(item, 'niskogradnja'))
      isNiskogradDisplayed = true
      break;
    case 'visokogradnja':
      catvisokogradnjaBtn.classList.add("cat-header__link--active");
      allProjects.visokogradnja.forEach(item => createSingleProject(item, 'visokogradnja'))
      isVisokogradDisplayed = true
      break;
    case 'arhitektura':
      catArhitehturaBtn.classList.add("cat-header__link--active");
      allProjects.arhitektura.forEach(item => createSingleProject(item, 'arhitektura'))
      isArhitectDisplayed = true
      break;
  }
}

categoryLink.forEach((item) => item.addEventListener('click', showProjects))

showProjectsOnLoad(currentCategory)
