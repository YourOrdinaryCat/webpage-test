<?php $title_a = "Todo"; include("Parts/Part1.php"); ?>
      <?php
        foreach($all as $key=>$value) {
          echo '<blockquote>
            <img alt="' . $title[$key] . '" class="thumbnail" src="../Assets/Thumbnails/', $title[$key], '.png" onerror="this.src=\'../Assets/Thumbnails/Default.png\'"/>
            <h4><a href="', $title[$key], '.html">', $title[$key], '</a></h4>

            <figcaption>', $author[$key], ', ', $category[$key], '</figcaption>
          </blockquote>';
        }
      ?>

<?php include("Parts/Part2.html"); ?>
        <ul>
          <li><a class="nav-link" href="../es/">Inicio</a></li>
          <li><a class="nav-link" href="Categories.html">Categorías</a></li>
        </ul>

<?php include("Parts/Part3.html"); ?>