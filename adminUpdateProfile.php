<?php

@include 'connectDetails.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:login.php');
};

if(isset($_POST['update_profile'])){

   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);

   $update_profile = $conn->prepare("UPDATE `users` SET name = ?, email = ? WHERE id = ?");
   $update_profile->execute([$name, $email, $admin_id]);

   $image = $_FILES['image']['name'];
   $image = filter_var($image, FILTER_SANITIZE_STRING);
   $image_size = $_FILES['image']['size'];
   $image_tmp_name = $_FILES['image']['tmp_name'];
   $image_folder = 'customer_img/'.$image;
   $old_image = $_POST['old_image'];

   if(!empty($image)){
      if($image_size > 2000000){
         $message[] = 'Image size is too large!';
      }else{
         $update_image = $conn->prepare("UPDATE `users` SET image = ? WHERE id = ?");
         $update_image->execute([$image, $admin_id]);
         if($update_image){
            move_uploaded_file($image_tmp_name, $image_folder);
            unlink('customer_img/'.$old_image);
            $message[] = 'Image updated successfully!';
         };
      };
   };

   $old_pass = $_POST['old_pass'];
   $update_pass = md5($_POST['update_pass']);
   $update_pass = filter_var($update_pass, FILTER_SANITIZE_STRING);
   $new_pass = md5($_POST['new_pass']);
   $new_pass = filter_var($new_pass, FILTER_SANITIZE_STRING);
   $confirm_pass = md5($_POST['confirm_pass']);
   $confirm_pass = filter_var($confirm_pass, FILTER_SANITIZE_STRING);

   if(!empty($update_pass) AND !empty($new_pass) AND !empty($confirm_pass)){
      if($update_pass != $old_pass){
         $message[] = 'Old password does not matched!';
      }elseif($new_pass != $confirm_pass){
         $message[] = 'Confirm password does not matched!';
      }else{
         $update_pass_query = $conn->prepare("UPDATE `users` SET password = ? WHERE id = ?");
         $update_pass_query->execute([$confirm_pass, $admin_id]);
         $message[] = 'Password updated successfully!';
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
   <title>Roshnee Supermarket</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/components.css">

</head>
<body>
   
<?php include 'adminHeader.php'; ?>

<section class="update-profile">

   <h1 class="title">Update profile</h1>

   <form action="" method="POST" enctype="multipart/form-data">
      <img src="customer_img/<?= $fetch_profile['image']; ?>" alt="">
      <div class="flex">
         <div class="inputBox">
            <span>Username :</span>
            <input type="text" name="name" value="<?= $fetch_profile['name']; ?>" placeholder="Update your username" required class="box">
            <span>Email :</span>
            <input type="email" name="email" value="<?= $fetch_profile['email']; ?>" placeholder="Update your email" required class="box">
            <span>Update picture :</span>
            <input type="file" name="image" accept="image/jpg, image/jpeg, image/png" class="box">
            <input type="hidden" name="old_image" value="<?= $fetch_profile['image']; ?>">
         </div>
         <div class="inputBox">
            <input type="hidden" name="old_pass" value="<?= $fetch_profile['password']; ?>">
            <span>Old password :</span>
            <input type="password" name="update_pass" placeholder="Enter your previous password" class="box">
            <span>New password :</span>
            <input type="password" name="new_pass" placeholder="Enter your new password" class="box">
            <span>Confirm password :</span>
            <input type="password" name="confirm_pass" placeholder="Confirm your new password" class="box">
         </div>
      </div>
      <div class="flex-btn">
         <input type="submit" class="btn" value="update profile" name="update_profile">
         <a href="adminPage.php" class="option-btn">Go back</a>
      </div>
   </form>

</section>













<script src="js/script.js"></script>

</body>
</html>