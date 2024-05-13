let slideIndex = 1;
let prevScrollPos = window.scrollY;

showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("mySlides");

  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  
  slides[slideIndex-1].style.display = "block";  

}

window.onscroll = function() {
    let currentScrollPos = window.scrollY;
    if (prevScrollPos > currentScrollPos) {
      document.getElementById("header").style.top = "0";
    } else {
      document.getElementById("header").style.top = "-100px"; // Ajusta esto según la altura de tu encabezado
    }
    prevScrollPos = currentScrollPos;
  }