<?php include("Parts/Part1.html"); ?>
    <title>All</title>

<?php include("Parts/Part2.html"); ?>
      <h1>All</h1>

      <?php
        foreach($_SESSION["all"] as $key=>$value) {
          // Get article author
          $author = substr($value, strpos($value, ";;") + 2);
          $author = substr($author, 0, -4);

          // Get article title
          $title = substr($value, strpos($value, "/", 4) + 1);
          $title = substr($title, 0, 0 - strlen($author) - 6);

          // Get article category
          $category = substr($value, strpos($value, "cat-") + 4);
          $category = substr($category, 0, strpos($category, "/"));

          echo '<blockquote>
            <img alt="' . $title . '" class="thumbnail" src="../Assets/Thumbnails/', $title, '.png" onerror="this.src=\'../Assets/Thumbnails/Default.png\'"/>
            <h4><a href="', $title, '.html">', $title, '</a></h4>

            <figcaption>', $author, ', ', $category, '</figcaption>
          </blockquote>';
        }
      ?>

<?php include("Parts/Part3.html"); ?>
        <ul>
          <li><a class="nav-link" href="Home.html">Home</a></li>
          <li><a class="nav-link" href="Categories.html">Categories</a></li>
        </ul>

<?php include("Parts/Part4.html"); ?>