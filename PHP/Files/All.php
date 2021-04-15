<?php include("Parts/Part1.html"); ?>
    <title>All</title>

<?php include("Parts/Part2.html"); ?>
      <ul>
        <li><div class="outline-link" onclick="location.href='index.html';"><a href="index.html">Home</a></div></li>
        <li><div class="outline-link" onclick="location.href='categories.html';"><a href="categories.html">Categories</a></div></li>
      </ul>

<?php include("Parts/Part3.html"); ?>
      <h1>All</h1>

<?php
  foreach($_SESSION["all"] as $key=>$value) {
    // Get article author
    $author = substr($value, strpos($value, ";;") + 2, strpos($value, ";;"));
    $author = substr($author, 0, -4);

    // Get article title from array
    $title = substr($value, 0, 0 - strlen($author) - 6);
    $title = substr($title, strpos($title, "/", 6) + 1, strpos($title, "/", 6));

    // Get article category
    $category = substr($value, 0, 0 - strlen($title) - strlen($author) - 7);
    $category = substr($category, 10);

    echo '<blockquote>
      <img alt="' . $title . '" class="thumbnail" src="Assets/Thumbnails/', $title, '.png" onerror="this.src=\'Assets/Thumbnails/Default.png\'"/>
      <h4><a href="', $title, '.html">', $title, '</a></h4>

      <figcaption>', $author, ', ', $category, '</figcaption>
    </blockquote>';
  }
?>

<?php include("Parts/Part4.html"); ?>

<?php include("Parts/Part5.html"); ?>