<?php
include '../components/connect.php';
session_start();

// Debug output
error_reporting(E_ALL);
ini_set('display_errors', 1);

if(isset($_POST['submit'])){
   $name = $_POST['name'] ?? '';
   $pass = $_POST['pass'] ?? '';

   if(!empty($name) && !empty($pass)){
      $select_admin = $conn->prepare("SELECT * FROM `admin` WHERE name = ?");
      $select_admin->execute([$name]);
      
      if($select_admin->rowCount() > 0){
         $admin = $select_admin->fetch(PDO::FETCH_ASSOC);
         
         // Verify password (support both SHA1 and bcrypt during transition)
         if(password_verify($pass, $admin['password']) || 
            sha1($pass) === $admin['password']){
            
            $_SESSION['admin_id'] = $admin['id'];
            header('location:dashboard.php');
            exit();
         } else {
            $message[] = 'Incorrect password!';
         }
      } else {
         $message[] = 'Username not found!';
      }
   } else {
      $message[] = 'Please fill all fields!';
   }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/admin_style.css?v=<?= time() ?>">

</head>
<body>

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

<!-- admin login form section starts  -->

<section class="form-container">

   <form action="" method="POST">
      <h3>Login Now</h3>
      <input type="text" name="name" maxlength="20" required placeholder="Enter your Username" class="box" oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="password" name="pass" maxlength="20" required placeholder="Enter your Password" class="box" oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="submit" value="Login Now" name="submit" class="btn">
   </form>

</section>

<!-- admin login form section ends -->

</body>
</html>