<?php
  session_start();
?>

<!-- Title goes here -->
<?php $title = "How to sleep correctly" ?>

<!-- Intro paragraph -->
<?php $intro = "The first step to get a good sleep is not learning JavaScript" ?>

<!-- Author of the article, date -->
<?php $author = "Omar, 2021" ?>

<?php echo file_get_contents("parts/part1.html"); ?>
<title><?php echo $title; ?></title>

<?php echo file_get_contents("parts/part2.html"); ?>
<link rel="stylesheet" href="../../stylesheets/<?php echo $_SESSION["mode"]; ?>/<?php echo $_SESSION["theme"]; ?>.css"/>

<?php echo file_get_contents("parts/part3.html"); ?>
      <!-- Sidebar of the article -->

<?php echo file_get_contents("parts/part4.html"); ?>
      <!-- Title -->
      <h1 id="0"><?php echo $title; ?></h1>

<?php echo file_get_contents("parts/part5.html"); ?>