<?php
  $title = "Todo";
  $author = "Omar";
  $description = "Todos los artículos del blog de Omar.";

  include("Parts/Part1.php");
?>
      <?php
        foreach($all as $key_a=>$value_a) {
          echo '<blockquote>
            <img alt="' . $titles[$key_a] . '" class="thumbnail" src="../Assets/Thumbnails/', $filenames[$key_a], '.png" onerror="this.src=\'../Assets/Thumbnails/Default.png\'"/>
            <h4><a href="', $filenames[$key_a], '.html">', $titles[$key_a], '</a></h4>

            <p>' , $descriptions[$key_a], '</p>

            <figcaption>', $authors[$key_a], ', ', $categories[$key_a], '</figcaption>
            <figcaption>', filemtime($value), '</figcaption>
          </blockquote>';
        }
      ?>

<?php include("Parts/Part2.html"); ?>
        <ul>
          <li><a class="nav-link" href="Index.html">Inicio</a></li>
        </ul>

<?php include("Parts/Part3.html"); ?>