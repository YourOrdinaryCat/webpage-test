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
<link rel="stylesheet" href="../../stylesheets/<?php echo $_SESSION["mode"]; ?>/themes-general.php"/>
<link rel="stylesheet" href="../../stylesheets/<?php echo $_SESSION["mode"]; ?>/<?php echo $_SESSION["theme"]; ?>.css"/>

<?php include("parts/part3.html"); ?>
      <!-- Sidebar of the article -->

<?php include("parts/part4.html"); ?>
      <!-- Title -->
      <h1 id="0"><?php echo $title; ?></h1>

      <p><?php echo $intro; ?></p>

      <h2 id="1">Comments</h2>
      <?php
        if($_SESSION['comments'] == "off") {
          echo '<p>Comments are off</p>';
        }

        if($_SESSION['comments'] == "on") {
          if($_SESSION['mode'] == "auto") {
            echo "<p>Hi there! Sorry for this, but I can't change comments theme dynamically.
            I made it default to dark, so if you use light theme, please toggle themes manually!
            <a href='../index.php#2'>Change your settings...</a></p>";
            echo '<div class="comments"><script async src="https://comments.app/js/widget.js?3" data-comments-app-website="B8gkNf6d" data-limit="100" data-height="397" data-dislikes="1" data-outlined="1" data-dark="1"></script></div>';
          } elseif ($_SESSION['mode'] == "dark") {
            echo '<div class="comments"><script async src="https://comments.app/js/widget.js?3" data-comments-app-website="B8gkNf6d" data-limit="100" data-height="397" data-dislikes="1" data-outlined="1" data-dark="1"></script></div>';
          } elseif($_SESSION['mode'] == "light") {
            echo '<div class="comments"><script async src="https://comments.app/js/widget.js?3" data-comments-app-website="B8gkNf6d" data-limit="100" data-height="397" data-dislikes="1" data-outlined="1"></script></div>';
          }
        }
      ?>

<?php include("parts/part5.html"); ?>