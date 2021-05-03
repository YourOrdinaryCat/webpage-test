<?php $title_a = "Categorías"; include("Parts/Part1.php"); ?>
      <?php
        foreach($categories as $key=>$value) {
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
            $author_c = substr($value, strpos($value, ";;") + 2);
            $author_c = substr($author_c, 0, -4);

            // Get article title
            $title_c = substr($value, strpos($value, "/", 4) + 1);
            $title_c = substr($title_c, 0, 0 - strlen($author_c) - 6);

            // Get article category
            $category_c = substr($value, strpos($value, "cat-") + 4);
            $category_c = substr($category_c, 0, strpos($category_c, "/"));

            echo '<blockquote>
              <img alt="' . $title_c . '" class="thumbnail" src="../Assets/Thumbnails/', $title_c, '.png" onerror="this.src=\'../Assets/Thumbnails/Default.png\'"/>
              <h4><a href="', $title_c, '.html">', $title_c, '</a></h4>

              <figcaption>', $author_c, ', ', $category_c, '</figcaption>
            </blockquote>';
          }
        }
      ?>

<?php include("Parts/Part2.html"); ?>
        <ul>
          <li><a class="nav-link" href="Index.html">Inicio</a></li>
          <li><a class="nav-link" href="All.html">Todo</a></li>
        </ul>

        <hr class="divider">

        <ul>
          <?php
            foreach($categories as $key=>$value) {
              echo '<li><a class="nav-link" href="#', $key + 1, '">', substr($value, strlen($lang) + 5), '</a></li>';
            }
          ?>
        </ul>

<?php include("Parts/Part3.html"); ?>