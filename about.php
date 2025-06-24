<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>About | Papa's Pizzeria</title>

   <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css?v=<?= time() ?>">

</head>
<body>
   
<!-- header section starts  -->
<?php include 'components/user_header.php'; ?>
<!-- header section ends -->

<div class="heading">
   <h3>About Us</h3>
</div>

<!-- about section starts  -->
<section class="about">

   <div class="row">

      <div class="image">
         <img src="images/about-img.svg" alt="">
      </div>

      <div class="content">
         <h1>Our Story Since 1975</h1>
         <h2>From Naples to Your Neighborhood</h2>
         <h3>Authentic Italian flavors passed down through generations</h3>
         <p>Our wood-fired ovens reach temperatures of 900°F, baking our hand-stretched dough to perfection in just 90 seconds - just like in the old country. Every pizza is made with love and the finest ingredients: San Marzano tomatoes from Mount Vesuvius, fresh mozzarella di bufala, and basil grown in our own garden.</p>
         <a href="menu.php" class="btn">Our Menu</a>
      </div>

   </div>

</section>
<!-- about section ends -->

<!-- promise section starts  -->
<section class="promise">

   <h1 class="title" style="color: var(--brown);">Our Promise to You</h1>

   <div class="box-container">

      <div class="box">
         <div style="font-size: 5rem; color: var(--primary-red);">🍅</div>
         <h3>Authentic Ingredients</h3>
         <p>We import key ingredients directly from Italy to ensure authentic flavor in every bite.</p>
      </div>

      <div class="box">
         <div style="font-size: 5rem; color: var(--primary-red);">👨‍🍳</div>
         <h3>Master Pizzaiolos</h3>
         <p>Our chefs train for years in Naples to perfect the art of traditional pizza making.</p>
      </div>

      <div class="box">
         <div style="font-size: 5rem; color: var(--primary-red);">❤️</div>
         <h3>Family Values</h3>
         <p>We treat every customer like family, because that's how Papa Mario would want it.</p>
      </div>

   </div>

</section>
<!-- promise section ends -->

<!-- reviews section starts  -->
<section class="reviews">

   <h1 class="title" style="color: var(--brown);">What Our Customers Say</h1>
   
   <div class="swiper reviews-slider">
      
      <div class="swiper-wrapper">
         
         <div class="swiper-slide slide">
            <img src="images/pic-1.png" alt="">
            <p>"The Margherita pizza took me right back to my honeymoon in Naples. Perfect crust, perfect balance of flavors!"</p>
            <div class="stars">
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star-half-alt"></i>
            </div>
            <h3>- Maria G.</h3>
         </div>

         <div class="swiper-slide slide">
            <img src="images/pic-2.png" alt="">
            <p>"I've been coming here since 1985, and the quality has never changed. That's why we have pizza night every Thursday!"</p>
            <div class="stars">
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star-half-alt"></i>
            </div>
            <h3>- Robert T.</h3>
         </div>

         <div class="swiper-slide slide">
            <img src="images/pic-3.png" alt="">
            <p>"The Carbonara pizza is my guilty pleasure. Creamy, rich, and absolutely delicious. Worth every calorie!"</p>
            <div class="stars">
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star-half-alt"></i>
            </div>
            <h3>- Sophia L.</h3>
         </div>

         <div class="swiper-slide slide">
            <img src="images/pic-4.png" alt="">
            <p>"The perfect wood-fired crust and fresh toppings make this the most authentic pizza I have tasted outside Italy!".</p>
            <div class="stars">
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star-half-alt"></i>
            </div>
            <h3>- Marco P.</h3>
         </div>

         <div class="swiper-slide slide">
            <img src="images/pic-5.png" alt="">
            <p>"The Diavola pizza set my taste buds on fire—in the best way possible!"</p>
            <div class="stars">
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star-half-alt"></i>
            </div>
            <h3>- Elena F.</h3>
         </div>

         <div class="swiper-slide slide">
            <img src="images/pic-6.png" alt="">
            <p>"Mamma mia! The Margherita here tastes like it is straight from Naples."</p>
            <div class="stars">
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star-half-alt"></i>
            </div>
            <h3>- Antonio L.</h3>
         </div>
      
      </div>
      <div class="swiper-pagination"></div>
   </div>
</section>
<!-- reviews section ends -->

<!-- footer section starts  -->
<?php include 'components/footer.php'; ?>
<!-- footer section ends -->

<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="js/script.js"></script>

<script>
var swiper = new Swiper(".reviews-slider", {
   loop:true,
   grabCursor: true,
   effect: "slide",
   speed: 1500,
   autoplay: {
      delay: 4000,
      disableOnInteraction: false,
   },
   spaceBetween: 20,
   pagination: {
      el: ".swiper-pagination",
      clickable:true,
   },
   breakpoints: {
      0: {
      slidesPerView: 1,
      },
      700: {
      slidesPerView: 2,
      },
      1024: {
      slidesPerView: 3,
      },
   },
});
</script>

</body>
</html>