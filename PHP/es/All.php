<?php
  $title = "Todo";
  $author = "Omar";
  $description = "Todos los artículos del blog de Omar.";

  include("Parts/Part1.php");
?>

      <nav>
        <details open>
          <summary>
            <h1>Contenido</h1>
          </summary>

          <ul>
            <li><a class="list-link" href="Index.html">Inicio</a></li>
          </ul>

        </details>
      </nav>

      <ul class="nobullet">
        <?php
          foreach($all as $key_a=>$value_a) {
            echo '<li>
              <a class="list-link" href="', $filenames[$key_a], '.html" title="', $titles[$key_a], '">',
                '<img alt="', $titles[$key_a], '" src="../Assets/Thumbnails/', $filenames[$key_a], '.png"/>
                <div>
                  <p>', $titles[$key_a], '</p>
                  <figcaption>', $authors[$key_a], ', ', $categories[$key_a], '</figcaption>
                </div>
              </a>
            </li>';
          }
        ?>
      </ul>

<?php include("Parts/Part2.html"); ?>