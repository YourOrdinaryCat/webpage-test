<?php
  session_start();
?>

<!-- Title goes here -->
<?php $title = "How to sleep correctly" ?>

<!-- Intro paragraph -->
<?php $intro = "The first step to get a good sleep is not learning JavaScript. It's
  really bad, seriously don't or I wipe you from this plane of existence." ?>

<!-- Author of the article, date -->
<?php $author = "Omar, 2021" ?>

<?php include("parts/part1.html"); ?>
<title><?php echo $title; ?></title>

<?php include("parts/part2.html"); ?>
<link rel="stylesheet" href="../../stylesheets/<?php echo $_SESSION["mode"]; ?>/<?php echo $_SESSION["theme"]; ?>.css"/>

<?php include("parts/part3.html"); ?>
      <!-- Sidebar of the article -->

<?php include("parts/part4.html"); ?>
      <!-- Title -->
      <h1 id="0"><?php echo $title; ?></h1>

      <p><?php echo $intro; ?></p>

<?php include("parts/part5.html"); ?>