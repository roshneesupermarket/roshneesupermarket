<?php

@include 'connectDetails.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
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
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'header.php'; ?>

<section class="about">

   <div class="row">

      <div class="box">
         <img src="images/about1.png" alt="">
         <h3>Why choose us?</h3>
         <p>If you're looking for branded and promotional shopping, it's worth choosing your supplier with care. With Roshnee Supermarket you'll enjoy the best possible products, quality, service and support – guaranteed!</p>
         <a href="contact.php" class="btn">contact us</a>
      </div>

      <div class="box">
         <img src="images/about2.png" alt="">
         <h3>What we provide?</h3>
         <p>Who are we? What makes us tick? Welcome to the world of Roshnee Supermarket where extraordinary people come together to do extraordinary things, bringing world-class online shopping to the people of Roshnee.</p>
         <a href="shop.php" class="btn">our shop</a>
      </div>

   </div>

</section>

<section class="reviews">

   <h1 class="title">Client reivews</h1>

   <div class="box-container">

      <div class="box">
         <img src="images/pic1.png" alt="">
         <p>Outstanding price, service, hard working, polite men. Truly impressed and by far the best in the business.</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
         </div>
         <h3>Cyril Ramaphosa</h3>
      </div>

      <div class="box">
         <img src="images/pic2.png" alt="">
         <p>Arrived a little late– but service was excellent. Fast–good group of guys!</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Chris Evans</h3>
      </div>

      <div class="box">
         <img src="images/pic3.png" alt="">
         <p>The team did a great job. Very kind and courteous, hard working and fast.</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Chris Hemsworth</h3>
      </div>

      <div class="box">
         <img src="images/pic4.png" alt="">
         <p>Excellent! The service exceeded my expectations. The delivery occurred when promised. Your employees were curious and professional.</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
         </div>
         <h3>Cristiano Ronaldo</h3>
      </div>

      <div class="box">
         <img src="images/pic5.png" alt="">
         <p>I was very impressed with the quality of the product I received. It was exactly what I was hoping for.</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
         </div>
         <h3>Lionel Messi</h3>
      </div>

      <div class="box">
         <img src="images/pic6.png" alt="">
         <p>Really really awesome job! Above & totally beyond. And super gentleman. Thank you, thank you!</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Neymar Júnior</h3>
      </div>

   </div>

</section>









<?php include 'footer.php'; ?>

<script src="js/script.js"></script>

</body>
</html>