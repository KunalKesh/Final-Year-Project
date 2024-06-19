<?php

include '../components/connect.php';

if(isset($_COOKIE['tutor_id'])){
   $tutor_id = $_COOKIE['tutor_id'];
}else{
   $tutor_id = '';
   header('location:login.php');
}

$select_contents = $conn->prepare("SELECT * FROM `content` WHERE tutor_id = ?");
$select_contents->execute([$tutor_id]);
$total_contents = $select_contents->rowCount();

$select_playlists = $conn->prepare("SELECT * FROM `playlist` WHERE tutor_id = ?");
$select_playlists->execute([$tutor_id]);
$total_playlists = $select_playlists->rowCount();

$select_likes = $conn->prepare("SELECT * FROM `likes` WHERE tutor_id = ?");
$select_likes->execute([$tutor_id]);
$total_likes = $select_likes->rowCount();

$select_comments = $conn->prepare("SELECT * FROM `comments` WHERE tutor_id = ?");
$select_comments->execute([$tutor_id]);
$total_comments = $select_comments->rowCount();

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Dashboard</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/admin_style.css">
   <link rel="icon" href="../images/favicon.png" type="image/x-icon">
</head>
<body>

<?php include '../components/admin_header.php'; ?>
   
<section class="dashboard">

   <h1 class="heading">dashboard</h1>

   <div class="box-container">

      <div class="box">
         <h3>Welcome To Techtube !</h3>
         <p><?= $fetch_profile['name']; ?></p>
         <a href="profile.php" class="btn">view profile</a>
      </div>

      <div class="box">
         <h3><i style="background:#00b894" class="fa-solid fa-video"></i> <?= $total_contents; ?></h3>
         <p>total contents uploaded</p>
         <a href="add_content.php" class="btn">add new content</a>
      </div>

      <div class="box">
         <h3><i class="fa-solid fa-circle-play"></i> <?= $total_playlists; ?></h3>
         <p>total playlists created</p>
         <a href="add_playlist.php" class="btn">add new playlist</a>
      </div>

      <div class="box">
         <h3><i style="background:#ff7675;" class="about_icon fas fa-heart"></i> <?= $total_likes; ?></h3>
         <p>total likes received</p>
         <a href="contents.php" class="btn">view contents</a>
      </div>

      <div class="box">
         <h3><i style="background:#f9ca24" class="about_icon fas fa-comment"></i> <?= $total_comments; ?></h3>
         <p>total comments received</p>
         <a href="comments.php" class="btn">view comments</a>
      </div>

      <div class="box">
         <h3>Quick Select</h3>
         <p>login or register</p>
         <div class="flex-btn">
            <a href="login.php" class="option-btn">login</a>
            <a href="register.php" class="delete-btn">register</a>
         </div>
      </div>

   </div>

</section>
















<script src="../js/admin_script.js"></script>

</body>
</html>