// popover sopra le icone categoria
const buttons = document.querySelectorAll('.firsticon');
const tooltips = document.querySelectorAll('.tooltip');

for (let i = 0; i < 10; i++) {
  let popperInstance = Popper.createPopper(buttons[i], tooltips[i], {
    modifiers:[
      {
        name: 'offset',
        options: {
          offset: [0, 8],
        },
      },
    ],
  });
}

buttons.forEach((button, i)=>{
  button.addEventListener('mouseover',()=>{
    tooltips[i].style.display="block";

  })
})

buttons.forEach((button, i)=>{
  button.addEventListener('mouseleave',()=>{
    tooltips[i].style.display="none";
  })
})

// CAROUSEL Javascript

let carousel = document.querySelector("#carousel-cards");

// dichiara le variabili per il mouse e il comportamento del carosello
let isDragging = false;
let startX;
let scrollLeft;

//lista dei mouseEvent applicati al selettore carosello

//evento per il tasto del mouse tenuto premuto (mousedown). identificazione della x iniziale. pageX restituisce la coordinata X in corrispondenza della quale è stato fatto clic con il mouse
if (carousel !== null){
  carousel.addEventListener('mousedown', function(e) {
    isDragging = true;
    startX = e.pageX - carousel.offsetLeft;
    scrollLeft = carousel.scrollLeft;
  });
  
  // evento per lo scorrimento. calcolo spostamento del mouse
  // "preventDefault()" per evitare che la finestra del browser scorrerà accidentalmente
  
  carousel.addEventListener('mousemove', function(e) {
    if(!isDragging) return;
    e.preventDefault();
    let x = e.pageX - carousel.offsetLeft;
    let walk = (x - startX) * 3;
    carousel.scrollLeft = scrollLeft - walk;
  });
  
  // evento per interrompere lo scroll al rilascio del pulsante del mouse
  carousel.addEventListener('mouseup', function(e) {
    isDragging = false;
  });
}


// stelline di gradimento

// const ratingStars = [...document.getElementsByClassName("rating__star")];
// const ratingResult = document.querySelector(".rating__result");

// printRatingResult(ratingResult);

// function executeRating(stars, result) {
//    const starClassActive = "rating__star fas fa-star";
//    const starClassUnactive = "rating__star far fa-star";
//    const starsLength = stars.length;
//    let i;
//    stars.map((star) => {
//       star.onclick = () => {
//         console.log(ratingStars)
//          i = stars.indexOf(star);

//          if (star.className.indexOf(starClassUnactive) !== -1) {
//             printRatingResult(result, i + 1);
//             for (i; i >= 0; --i) stars[i].className = starClassActive;
//          } else {
//             printRatingResult(result, i);
//             for (i; i < starsLength; ++i) stars[i].className = starClassUnactive;
//          }
//       };
//    });
// }

// function printRatingResult(result, num = 0) {
//    result.textContent = `${num}/5`;
// }

// executeRating(ratingStars, ratingResult);

// CAROSELLO DI DETTAGLIO

var swiper = new Swiper(".mySwiper", {
  spaceBetween: 10,
  slidesPerView: 6,
  freeMode: true,
  watchSlidesProgress: true,
});
var swiper2 = new Swiper(".mySwiper2", {
  spaceBetween: 10,
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  thumbs: {
    swiper: swiper,
  },
});



