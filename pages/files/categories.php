<?php include("project-files/parts/part1.html"); ?>
    <title>Categories</title>

<?php include("project-files/parts/part2.html"); ?>
<?php include("project-files/parts/part3.html"); ?>
      <ul>
        <li><div class="sidebar-link" onclick="location.href='../';"><a href="../">Home</a></div></li>
      </ul>

      <hr class="divider">

      <ul>
        <?php
          try {
            $host = "localhost";
            $dbname = "articles";
            $username = "root";
            $password = "";
        
            $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
            $stmt = $conn->prepare("SELECT Category FROM articles");
            $stmt->execute();
        
            $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $categories = array_unique($categories, SORT_REGULAR);

            foreach($categories as $key=>$value) {
              echo '<li><div class="sidebar-link" onclick="location.href=\'#' . $key + 1 . '\';"><a href="#' . $key + 1 . '">' . $categories[$key]["Category"] . '</a></div></li>';
            }
          } catch(PDOException $e) {
            echo "<p>Huh. This error shouldn't show up. Send this to
            <a href='https://t.me/YourOrdinaryCat'>YourOrdinaryCat</a>:</p>
            <div class=\"elevated-section\">
              <h4>Something went wrong</h4>
              <p>" . $e->getMessage(). "</p>" .
              "<figcaption>Computers were a mistake.</figcaption>
            </div>";
          }
        ?>
      </ul>

<?php include("project-files/parts/part4.html"); ?>
      <!-- Title -->
      <h1 id="0">Categories</h1>

      <?php
        try {
          foreach($categories as $key=>$value) {
            $category = $categories[$key]["Category"];

            $stmt = $conn->prepare("SELECT * FROM articles WHERE Category='$category'");
            $stmt->execute();

            $articles = $stmt->fetchAll(PDO::FETCH_ASSOC);

            echo '<h2 id="' . $key + 1 . '">' . $categories[$key]["Category"] . '</h2>';

            foreach($articles as $key=>$value) {
              echo '<blockquote>
                <h4><a href="', $articles[$key]["Filename"], '.html">', $articles[$key]["Title"], '</a></h4>';

              if($articles[0]["Thumbnail"] == null) {
                echo '<p>', $articles[0]["Intro"], '</p>';
              } else {
                echo '<div class="hstack-wrap">
                  <p>', $articles[0]["Intro"], '</p>
                  <img src="assets/', $articles[0]["Filename"], '/photos/', $articles[0]["Thumbnail"], '">
                </div>';
              }

              echo '<figcaption>', $articles[$key]["Author"], ', ', $articles[$key]["Date"], '</figcaption>
              <figcaption>', $articles[$key]["Category"], '</figcaption>
              </blockquote>';
            }
          }

        } catch(PDOException $e) {
          echo "<p>Huh. This error shouldn't show up. Send this to
          <a href='https://t.me/YourOrdinaryCat'>YourOrdinaryCat</a>:</p>
          <div class=\"elevated-section\">
            <h4>Something went wrong</h4>
            <p>" . $e->getMessage(). "</p>" .
            "<figcaption>Computers were a mistake.</figcaption>
          </div>";
        }
      ?>

<?php include("project-files/parts/part5.html"); ?>