// // menu

const searchclick = document.querySelector('.searchclick');
const dropdown = document.querySelector('.dropdown-content');
const searchicon = document.querySelector('.fa-magnifying-glass');
const icondrop = document.querySelector('.fa-users');

function toggleElementDisplay(element) {
    if (element.style.display === 'none') {
        element.style.display = 'block';
    } else {
        element.style.display = 'none';
    }
}

searchicon.addEventListener("click", function () {
    toggleElementDisplay(searchclick);
});

icondrop.addEventListener("click", function () {
    toggleElementDisplay(dropdown);
});






// hotcarls scroll

const cardWrapper = document.querySelector('.hotcards');
const widthToScroll = cardWrapper.children[0].offsetWidth;
const arrowPrev = document.querySelector('.leftbtn');
const arrowNext = document.querySelector('.rightbtn');
const column = Math.floor(cardWrapper.offsetWidth - (widthToScroll + 24));

Array.from(cardWrapper.children).slice(-column).reverse().forEach(item => cardWrapper.insertAdjacentHTML('afterbegin', item.outerHTML));
Array.from(cardWrapper.children).slice(0, column).forEach(item => cardWrapper.insertAdjacentHTML('beforeend', item.outerHTML));

cardWrapper.scrollLeft = cardWrapper.offsetWidth;

arrowPrev.onclick = () => (cardWrapper.scrollLeft -= widthToScroll);
arrowNext.onclick = () => (cardWrapper.scrollLeft += widthToScroll);

let autoScroll;

cardWrapper.onscroll = function () {
    if (cardWrapper.scrollLeft === 0 || cardWrapper.scrollLeft === cardWrapper.scrollWidth - cardWrapper.offsetWidth) {
        cardWrapper.classList.add('no-smooth');
        cardWrapper.scrollLeft = cardWrapper.scrollLeft === 0 ? cardWrapper.scrollWidth - (2 * cardWrapper.offsetWidth) : cardWrapper.offsetWidth;
        cardWrapper.classList.remove('no-smooth');
    }

    if (autoScroll) clearTimeout(autoScroll);

    autoScroll = setTimeout(() => {
        cardWrapper.classList.remove('no-smooth');
        cardWrapper.scrollLeft += widthToScroll;
    }, 3000);
};




