<?php include("project-files/parts/part1.html"); ?>
    <title>Categories</title>

<?php include("project-files/parts/part2.html"); ?>
<?php include("project-files/parts/part3.html"); ?>
      <ul>
        <li><div class="sidebar-link" onclick="location.href='index.html';"><a href="index.html">Home</a></div></li>
      </ul>

      <hr class="divider">

      <ul>
        <li><div class="sidebar-link" onclick="location.href='#1';"><a href="#1">All</a></div></li>
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
              echo '<li><div class="sidebar-link" onclick="location.href=\'#' . $key + 2 . '\';"><a href="#' . $key + 2 . '">' . $categories[$key]["Category"] . '</a></div></li>';
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
          echo '<h2 id="1">All</h2>';
          $stmt = $conn->prepare("SELECT ID FROM articles"); // Get IDs
          $stmt->execute();

          $table_items = array_reverse($stmt->fetchAll(PDO::FETCH_ASSOC), true);

          foreach($table_items as $key=>$value) {
            $stmt = $conn->prepare("SELECT * FROM articles WHERE ID=$key + 1");
            $stmt->execute();

            $articles = $stmt->fetchAll(PDO::FETCH_ASSOC);

            echo '<div class="elevated-section">
              <h4><a href="', $articles[0]["Filename"], '.html">', $articles[0]["Title"], '</a></h4>';

            if($articles[0]["Thumbnail"] == null) {
              echo '<p>', $articles[0]["Intro"], '</p>';
            } else {
              echo '<div class="hstack-wrap">
                <p>', $articles[0]["Intro"], '</p>
                <img src="assets/', $articles[0]["Filename"], '/photos/', $articles[0]["Thumbnail"], '">
              </div>';
            }

            echo '<figcaption>', $articles[0]["Author"], ', ', $articles[0]["Date"], '</figcaption>
            <figcaption>', $articles[0]["Category"], '</figcaption>
            </div>';
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

        try {
          foreach($categories as $key=>$value) {
            $testing = $categories[$key]["Category"];

            $stmt = $conn->prepare("SELECT * FROM articles WHERE Category='$testing'");
            $stmt->execute();

            $articles = $stmt->fetchAll(PDO::FETCH_ASSOC);

            echo '<h2 id="' . $key + 2 . '">' . $categories[$key]["Category"] . '</h2>';

            foreach($articles as $key=>$value) {
              echo '<div class="elevated-section">
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
              </div>';
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