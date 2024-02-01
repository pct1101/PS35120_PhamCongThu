const searchclick = document.querySelector('.searchclick');
const searchicon = document.querySelector('.fa-magnifying-glass');
const togglecheckbox = document.getElementById('check');

togglecheckbox.addEventListener('change', function(){
  if(this.checked){
    document.body.classList.add('body');
  }
  else{
    document.body.classList.remove('body');
  }
})

searchicon.addEventListener("click",function(){
  if(searchclick.style.display === 'none'){
    searchclick.style.display = 'block';
  }
  else
  searchclick.style.display = 'none';
});

// header scroll

const header = document.getElementById('header');

function headerscroll(){
  if(window.scrollY > 0){
    header.classList.add('scrolled');
  }
  else{
    header.classList.remove('scrolled');
  }
}
window.addEventListener('scroll',headerscroll);

// auto type words
document.addEventListener('DOMContentLoaded', function (){
  const options = {
    names : ['Dev', 'Coder', 'Programmer'],
    typeSpeed : 150,
    typeBack : 50,
    typeDelay : 3000
  }
  const multiText = document.querySelector('.multi-text');
  let index = 0;
  let temp = '';
  let isDeleting = false;

  function type(){
    const fullTextTemp = options.names[index];
    if(isDeleting){
      temp = fullTextTemp.substring(0,temp.length - 1)
    }
    else{
      temp = fullTextTemp.substring(0, temp.length + 1);
    }
    multiText.innerHTML = temp;
    let typeSpeed = options.typeSpeed;
    if(isDeleting){
      typeSpeed /= 2; //Faster when isdeting
    }

    if(!isDeleting && temp === fullTextTemp){
      typeSpeed = options.typeDelay;
      isDeleting = true;
    }
    else if(isDeleting && temp === ''){
      isDeleting = false;
      index = (index + 1) % options.names.length;
    }
    setTimeout(type, typeSpeed);
  }
  type();
});


// hotcarls scroll

const cardWrapper = document.querySelector('.hotcards');
const cardWrapperChildren = Array.from(cardWrapper.children);
const widthToScroll = cardWrapper.children[0].offsetWidth;
const arrowPrev = document.querySelector('.leftbtn');
const arrowNext = document.querySelector('.rightbtn');
const column = Math.floor(cardWrapper.offsetWidth - (widthToScroll + 24));

cardWrapperChildren.slice(-column).reverse().forEach(item =>{
  cardWrapper.insertAdjacentHTML('afterbegin', item.outerHTML)
});

cardWrapperChildren.slice(0,column).forEach(item =>{
  cardWrapper.insertAdjacentHTML('beforeend', item.outerHTML)
});

cardWrapper.scrollLeft = cardWrapper.offsetWidth;

arrowPrev.onclick = function(){
  cardWrapper.scrollLeft -= widthToScroll;
}

arrowNext.onclick = function(){
  cardWrapper.scrollLeft += widthToScroll;
}

let autoScroll

cardWrapper.onscroll = function(){
  if(cardWrapper.scrollLeft === 0){
    cardWrapper.classList.add('no-smooth');
    cardWrapper.scrollLeft = cardWrapper.scrollWidth - (2 * cardWrapper.offsetWidth);
    cardWrapper.classList.remove('no-smooth');
  }
  else if(cardWrapper.scrollLeft === cardWrapper.scrollWidth - cardWrapper.offsetWidth){
    cardWrapper.classList.add('no-smooth');
    cardWrapper.scrollLeft = cardWrapper.offsetWidth
    cardWrapper.classList.remove('no-smooth');
  }
  if(autoScroll){
    clearTimeout(autoScroll);
  }

  autoScroll = setTimeout(() =>{
    cardWrapper.classList.remove('no-smooth');
    cardWrapper.scrollLeft += widthToScroll;
  }, 3000);
}

// click media
const navList = document.querySelector('.nav-list');
const checkBox = document.getElementById('checkbox');

checkBox.addEventListener('change', function() {
  if(this.checked){
    navList.style.display = 'block';
  }
  else{
    navList.style.display = 'none';
  }

});