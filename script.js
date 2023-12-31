window.addEventListener('DOMContentLoaded', (event) => {
  var sliderImages = document.querySelectorAll('.slider-image');
  var currentImageIndex = 0;

  function showNextImage() {
    sliderImages[currentImageIndex].classList.remove('active');
    currentImageIndex = (currentImageIndex + 1) % sliderImages.length;
    sliderImages[currentImageIndex].classList.add('active');
  }

  setInterval(showNextImage, 3000);
});

const menu = document.querySelector(".menu");
const navigation = document.querySelector(".navigation");
menu.onclick = () => {
  menu.classList.toggle("active");
  navigation.classList.toggle("active");
};

function myFunction() {
  location.replace("https://www.w3schools.com")
}


