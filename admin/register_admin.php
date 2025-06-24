<?php
include '../components/connect.php';
session_start();

if(!isset($_SESSION['admin_id'])){
   header('location:admin_login.php');
   exit();
}

// Debug: Check if form is submitted
if(isset($_POST['submit'])){
   echo "<pre>Form submitted! POST data: "; print_r($_POST); echo "</pre>";
   
   $name = $_POST['name'] ?? '';
   $pass = $_POST['pass'] ?? '';
   $cpass = $_POST['cpass'] ?? '';

   // Basic validation
   if(empty($name) || empty($pass) || empty($cpass)){
      $message[] = 'All fields are required!';
   } elseif($pass !== $cpass){
      $message[] = 'Confirmed password does not match!';
   } else {
      // Check if username exists
      $select_admin = $conn->prepare("SELECT * FROM `admin` WHERE name = ?");
      $select_admin->execute([$name]);
      
      if($select_admin->rowCount() > 0){
         $message[] = 'Username already exists!';
      } else {
         // Hash the password
         $hashed_password = password_hash($pass, PASSWORD_DEFAULT);
         
         // Insert new admin
         $insert_admin = $conn->prepare("INSERT INTO `admin` (name, password) VALUES (?, ?)");
         if($insert_admin->execute([$name, $hashed_password])){
            $message[] = 'New Admin registered successfully!';
         } else {
            $message[] = 'Registration failed! Error: '. implode(' ', $conn->errorInfo());
         }
      }
   }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Register</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/admin_style.css?v=<?= time() ?>">

</head>
<body>

<?php include '../components/admin_header.php' ?>

<!-- register admin section starts  -->

<section class="form-container">

   <form action="" method="POST">
      <h3>Register New</h3>
      <input type="text" name="name" maxlength="20" required placeholder="Enter your Username" class="box" oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="password" name="pass" maxlength="20" required placeholder="Enter your Password" class="box" oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="password" name="cpass" maxlength="20" required placeholder="Confirm your Password" class="box" oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="submit" value="Register Now" name="submit" class="btn">
   </form>

</section>

<!-- register admin section ends -->

<!-- custom js file link  -->
<script src="../js/admin_script.js"></script>

</body>
</html>