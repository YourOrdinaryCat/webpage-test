<!-- Title of the article -->
<?php $title = "How to sleep correctly" ?>

<!-- Intro paragraph -->
<?php $intro = "Bad intro" ?>

<!-- Author of the article, date -->
<?php $author = "Omar, 2021" ?>

<?php echo file_get_contents("parts/part1.html"); ?>
<title><?php echo $title; ?></title>

<?php echo file_get_contents("parts/part2.html"); ?>
      <!-- Sidebar of the article -->

<?php echo file_get_contents("parts/part3.html"); ?>
      <!-- Title -->
      <h1 id="0"><?php echo $title; ?></h1>

<?php echo file_get_contents("parts/part4.html"); ?>