<?php include("Parts/Part1.html"); ?>
    <title>Categories</title>

<?php include("Parts/Part2.html"); ?>
      <ul>
        <li><div class="outline-link" onclick="location.href='index.html';"><a href="index.html">Home</a></div></li>
        <li><div class="outline-link" onclick="location.href='all.html';"><a href="all.html">All</a></div></li>
      </ul>

      <hr class="divider">

      <ul>
        <?php
          foreach($_SESSION["categories"] as $key=>$value) {
            echo '<li><div class="outline-link" onclick="location.href=\'#', $key + 1, '\';"><a href="#', $key + 1, '">', substr($value, 10), '</a></div></li>';
          }
        ?>
      </ul>

<?php include("Parts/Part3.html"); ?>
      <!-- Title -->
      <h1>Categories</h1>

      <?php
        foreach($_SESSION["categories"] as $key=>$value) {
          echo '<h2 id="' . $key + 1 . '">' . substr($value, 10) . '</h2>';

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
        }
      ?>

<?php include("Parts/Part4.html"); ?>

<?php include("Parts/Part5.html"); ?>