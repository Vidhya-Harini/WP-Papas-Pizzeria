<?php
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>

<header class="header">

   <section class="flex">

      <div class="logo-container">
         <a href="home.php" class="logo">
            <img src="images/papas-pizzeria-logo.png" alt="Papa's Pizzeria Logo" style="height: 50px;">
         </a>
         <a href="home.php" class="logo-text">Papa's Pizzeria</a>
      </div>

      <nav class="navbar">
         <a href="home.php">Home</a>
         <a href="menu.php">Menu</a>
         <a href="orders.php">Orders</a>
         <a href="about.php">About</a>
         <a href="contact.php">Contact</a>
      </nav>

      <div class="icons">
         <?php
            $count_cart_items = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
            $count_cart_items->execute([$user_id]);
            $total_cart_items = $count_cart_items->rowCount();
         ?>
         <a href="search.php"><i class="fas fa-search"></i></a>
         <a href="cart.php"><i class="fas fa-shopping-cart"></i><span>(<?= $total_cart_items; ?>)</span></a>
         <div id="user-btn" class="fas fa-user"></div>
         
      </div>

      <div class="profile">
         <?php
            $select_profile = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
            $select_profile->execute([$user_id]);
            if($select_profile->rowCount() > 0){
               $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
         ?>
         <p class="name">Welcome, <?= $fetch_profile['name']; ?>.</p>
         <div class="flex">
            <a href="profile.php" class="btn">Profile</a>
            <a href="components/user_logout.php" onclick="return confirm('Logout from this Website?');" class="delete-btn">Logout</a>
         </div>
         <?php
            }else{
         ?>
            <p class="name">Please Login or Register</p>
            <div class="flex">
               <a href="login.php" class="btn">Login</a>
               <a href="register.php" class="btn" style="margin-left: 0.5rem;">Register</a>
            </div>
         <?php
            }
         ?>
      </div>

   </section>

</header>