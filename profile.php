<?php
include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
   header('location:login.php');
   exit();
};

// Fetch user profile data
$select_profile = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
$select_profile->execute([$user_id]);
$fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);

// Check if profile exists
if(!$fetch_profile) {
   header('location:home.php');
   exit();
}
?>

<!DOCTYPE html>
<html lang="en" style="background-color: var(--black);">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Profile | Papa's Pizzeria</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css?v=<?= time() ?>">

</head>
<body>
   
<!-- header section starts  -->
<?php include 'components/user_header.php'; ?>
<!-- header section ends -->

<section class="user-details">
   <div class="user">
      <img src="<?= !empty($fetch_profile['image']) ? 'uploaded_img/'.$fetch_profile['image'] : 'images/user-icon.png' ?>" alt="Profile Image" class="profile-image">
      
      <div class="profile-info">
         <h2>My Profile</h2>
         
         <div class="info-item">
            <i class="fas fa-user"></i>
            <span class="info-text"><?= htmlspecialchars($fetch_profile['name']) ?></span>
         </div>
         
         <div class="info-item">
            <i class="fas fa-phone"></i>
            <span class="info-text">
               <?= !empty($fetch_profile['number']) ? htmlspecialchars($fetch_profile['number']) : '<span class="not-provided">Not provided</span>' ?>
            </span>
         </div>
         
         <div class="info-item">
            <i class="fas fa-envelope"></i>
            <span class="info-text"><?= htmlspecialchars($fetch_profile['email']) ?></span>
         </div>
         
         <div class="info-item">
            <i class="fas fa-map-marker-alt"></i>
            <span class="info-text">
               <?= !empty($fetch_profile['address']) ? htmlspecialchars($fetch_profile['address']) : '<span class="not-provided">Please enter your address</span>' ?>
            </span>
         </div>
         
         <div class="action-buttons">
            <a href="update_profile.php" class="btn">Update Profile</a>
         </div>
      </div>
   </div>
</section>

<?php include 'components/footer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>