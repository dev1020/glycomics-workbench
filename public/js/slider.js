var slideIndex = 1;
var millis = 5000;
var interval;
let carouselDom = document.querySelector('.carousel');
let SliderDom = carouselDom.querySelector('.carousel .list');
startSlides();

function startSlides(){
  pauseSlides();
  nextSlide();
  interval = setInterval(nextSlide, millis);
}


function resumeSlides() {
  //nextSlide();
  interval = setInterval(nextSlide, millis);
}

function pauseSlides() {
  clearInterval(interval);
}

function nextSlide() {
  showSlide();
  slideIndex++;
}

function plusSlides(n) {
  clearInterval(interval);
  slideIndex += n;
  nextSlide();
  interval = setInterval(nextSlide, millis);
}

function currentSlide(n) {
  clearInterval(interval);
  slideIndex = n + 1;
  nextSlide();
  interval = setInterval(nextSlide, millis);
}

function showSlide() {
  var i;
  var slides = document.getElementsByClassName("slideitems");
  var dots = document.getElementsByClassName("thumbitems");

  let  SliderItemsDom = SliderDom.querySelectorAll('.carousel .list .item');
  let thumbnailItemsDom = document.querySelectorAll('.carousel .thumbnail .item');

  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  if (slideIndex > slides.length) {
    slideIndex = 1;
  }
  if (slideIndex < 1) {
    slideIndex = slides.length;
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex - 1].style.display = "block";
  SliderDom.appendChild(SliderItemsDom[0]);
  thumbnailBorderDom.appendChild(thumbnailItemsDom[0]);
  dots[slideIndex - 1].className += " active";
}
