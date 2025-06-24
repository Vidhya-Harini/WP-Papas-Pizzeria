<?php
include 'components/connect.php';
session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
}

include 'components/add_cart.php';

$filter = isset($_GET['filter']) ? $_GET['filter'] : 'all';

if($filter == 'all'){
    $select_products = $conn->prepare("SELECT * FROM `products`");
    $select_products->execute();
} elseif($filter == 'veg') {
    $select_products = $conn->prepare("SELECT * FROM `products` WHERE category = 'Veg'");
    $select_products->execute();
} elseif($filter == 'non-veg') {
    $select_products = $conn->prepare("SELECT * FROM `products` WHERE category = 'Non-Veg'");
    $select_products->execute();
} elseif($filter == 'drinks') {
    $select_products = $conn->prepare("SELECT * FROM `products` WHERE category = 'Drinks'");
    $select_products->execute();
}
?>

<!DOCTYPE html>
<html lang="en" style="background-color: var(--black);">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Menu | Papa's Pizzeria</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css?v=<?= time() ?>">

</head>
<body>
   
<!-- header section starts  -->
<?php include 'components/user_header.php'; ?>
<!-- header section ends -->

<!-- menu section starts  -->
<section class="products">
   <div class="menu-header-container">
      <div class="menu-header">
         <h1>Our Authentic Italian Pizzas</h1>
         <h3>Handcrafted with the finest ingredients imported directly from Italy</h3>
         
         <div class="filters">
            <a href="menu.php?filter=all" class="filter-btn <?= $filter == 'all' ? 'active' : '' ?>">All</a>
            <a href="menu.php?filter=veg" class="filter-btn <?= $filter == 'veg' ? 'active' : '' ?>">Vegetarian</a>
            <a href="menu.php?filter=non-veg" class="filter-btn <?= $filter == 'non-veg' ? 'active' : '' ?>">Non-Vegetarian</a>
            <a href="menu.php?filter=drinks" class="filter-btn <?= $filter == 'drinks' ? 'active' : '' ?>">Drinks</a>
         </div>
      </div>
   </div>

   <div class="box-container">
      <?php
      if($select_products->rowCount() > 0){
         while($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)){
      ?>
      <form action="" method="post" class="box">
         <!-- Our existing product display code -->
         <input type="hidden" name="pid" value="<?= $fetch_products['id']; ?>">
         <input type="hidden" name="name" value="<?= $fetch_products['name']; ?>">
         <input type="hidden" name="price" value="<?= $fetch_products['price']; ?>">
         <input type="hidden" name="image" value="<?= $fetch_products['image']; ?>">
         <button type="submit" class="fas fa-shopping-cart" name="add_to_cart"></button>
         <img src="uploaded_img/<?= $fetch_products['image']; ?>" alt="">
         <div class="cat"><?= $fetch_products['category']; ?></div>
         <div class="name"><?= $fetch_products['name']; ?></div>
         <div class="flex">
            <div class="price"><span>€</span><?= $fetch_products['price']; ?></div>
            <input type="number" name="qty" class="qty" min="1" max="99" value="1" maxlength="2">
         </div>
      </form>
      <?php
         }
      }else{
         echo '<p class="empty">No products added yet!</p>';
      }
      ?>
   </div>
</section>
<!-- menu section ends -->

<!-- footer section starts  -->
<?php include 'components/footer.php'; ?>
<!-- footer section ends -->

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>