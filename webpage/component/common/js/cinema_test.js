var slideIndex = 0;
window.onload = function(){
    showSlides();
}

function showSlides() {
    var slides = document.getElementsByClassName("ad");
    for (var i = 0; i < slides.length; i++) {
     slides[i].style.display = "none";  
 }
 slideIndex++;
 if (slideIndex > slides.length) {slideIndex = 1}
    slides[slideIndex-1].style.display = "block";
    setTimeout(showSlides, 4000); // Change image every 2 seconds
}