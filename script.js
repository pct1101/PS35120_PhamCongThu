const searchclick = document.querySelector('.searchclick');
const searchicon = document.querySelector('.fa-magnifying-glass');
const togglecheckbox = document.getElementById('check');

togglecheckbox.addEventListener('change', function () {
    if (this.checked) {
        document.body.classList.add('body');
    }
    else {
        document.body.classList.remove('body');
    }
})

searchicon.addEventListener("click", function () {
    if (searchclick.style.display === 'none') {
        searchclick.style.display = 'block';
    }
    else
        searchclick.style.display = 'none';
});

const dropdown_content = document.querySelector('.dropdown-content');
const dropicon = document.querySelector('.fa-users');
const togglecheckboxx = document.getElementById('check');

togglecheckboxx.addEventListener('change', function () {
    if (this.checked) {
        document.body.classList.add('body');
    }
    else {
        document.body.classList.remove('body');
    }
})

dropicon.addEventListener("click", function () {
    if (dropdown_content.style.display === 'none') {
        dropdown_content.style.display = 'block';
    }
    else
        dropdown_content.style.display = 'none';
});



// hotcarls scroll

const cardWrapper = document.querySelector('.hotcards');
const cardWrapperChildren = Array.from(cardWrapper.children);
const widthToScroll = cardWrapper.children[0].offsetWidth;
const arrowPrev = document.querySelector('.leftbtn');
const arrowNext = document.querySelector('.rightbtn');
const column = Math.floor(cardWrapper.offsetWidth - (widthToScroll + 24));

cardWrapperChildren.slice(-column).reverse().forEach(item => {
    cardWrapper.insertAdjacentHTML('afterbegin', item.outerHTML)
});

cardWrapperChildren.slice(0, column).forEach(item => {
    cardWrapper.insertAdjacentHTML('beforeend', item.outerHTML)
});

cardWrapper.scrollLeft = cardWrapper.offsetWidth;

arrowPrev.onclick = function () {
    cardWrapper.scrollLeft -= widthToScroll;
}

arrowNext.onclick = function () {
    cardWrapper.scrollLeft += widthToScroll;
}

let autoScroll

cardWrapper.onscroll = function () {
    if (cardWrapper.scrollLeft === 0) {
        cardWrapper.classList.add('no-smooth');
        cardWrapper.scrollLeft = cardWrapper.scrollWidth - (2 * cardWrapper.offsetWidth);
        cardWrapper.classList.remove('no-smooth');
    }
    else if (cardWrapper.scrollLeft === cardWrapper.scrollWidth - cardWrapper.offsetWidth) {
        cardWrapper.classList.add('no-smooth');
        cardWrapper.scrollLeft = cardWrapper.offsetWidth
        cardWrapper.classList.remove('no-smooth');
    }
    if (autoScroll) {
        clearTimeout(autoScroll);
    }

    autoScroll = setTimeout(() => {
        cardWrapper.classList.remove('no-smooth');
        cardWrapper.scrollLeft += widthToScroll;
    }, 3000);
}



// 
