<?php
  $title = "All";
  $author = "Omar";
  $description = "All the articles from Omar's blog.";

  include("Parts/Part1.php");
?>

      <nav>
        <details open>
          <summary>
            <h1>Contents</h1>
          </summary>

          <ul>
            <li><a class="list-link" href="../en/">Home</a></li>
          </ul>

        </details>
      </nav>

      <ul class="nobullet">
        <?php
          foreach($all as $key_a=>$value_a) {
            echo '<li>
              <a class="list-link" href="', $data[$key_a][5], '.html" title="', $data[$key_a][4], '">',
                '<img alt="" src="../Assets/Thumbnails/', $data[$key_a][5], '.png"/>
                <div>
                  <p>', $data[$key_a][1], '</p>
                  <figcaption>', $data[$key_a][2], ', ', $data[$key_a][3], ' - ', date("Y-m-d", $data[$key_a][0]),'</figcaption>
                </div>
              </a>
            </li>';
          }
        ?>
      </ul>

<?php include("Parts/Part2.html"); ?>