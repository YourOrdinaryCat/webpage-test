<?php include("Parts/Part1.html"); ?>
    <title>Categories</title>

<?php include("Parts/Part2.html"); ?>
      <!-- Title -->
      <h1>Categories</h1>

      <?php
        foreach($_SESSION["categories"] as $key=>$value) {
          echo '<h2 id="' . $key + 1 . '">' . substr($value, strlen($lang) + 5) . '</h2>';

          // Get articles inside category
          $in_category = glob($value . "/*.php");

          // Order array by creation date
          usort($in_category, function($file1, $file2) {
            $file1 = filectime($file1);
            $file2 = filectime($file2);
            if($file1 == $file2) {
              return 0;
            }
            return $file1 < $file2 ? 1 : -1;
          });

          // Fill the articles section
          foreach($in_category as $key=>$value) {
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
        }
      ?>

<?php include("Parts/Part3.html"); ?>
        <ul>
          <li><a class="nav-link" href="Home.html">Home</a></li>
          <li><a class="nav-link" href="All.html">All</a></li>
        </ul>

        <hr class="divider">

        <ul>
          <?php
            foreach($_SESSION["categories"] as $key=>$value) {
              echo '<li><a class="nav-link" href="#', $key + 1, '">', substr($value, strlen($lang) + 5), '</a></li>';
            }
          ?>
        </ul>

<?php include("Parts/Part4.html"); ?>