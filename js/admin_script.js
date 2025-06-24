let profile = document.querySelector('.header .flex .profile');

document.querySelector('#user-btn').onclick = () =>{
   profile.classList.toggle('active')
   navbar.classList.remove('active');
}

let navbar = document.querySelector('.header .flex .navbar');

window.onscroll = () =>{
   profile.classList.remove('active');
   navbar.classList.remove('active');
}

subImages = document.querySelectorAll('.update-product .image-container .sub-images img');
mainImage = document.querySelector('.update-product .image-container .main-image img');

subImages.forEach(images =>{
   images.onclick = () =>{
      let src = images.getAttribute('src');
      mainImage.src = src;
   }
});