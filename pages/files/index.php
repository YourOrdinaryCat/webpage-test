<!-- Articles -->
<?php
  // Start PDO stuff
  $host = "localhost";
  $dbname = "articles";
  $username = "root";
  $password = "";
        
  // Attempt connection to database ($dbname) in server
  try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT ID FROM articles"); // Get IDs
    $stmt->execute();
          
    $table_items = array_reverse($stmt->fetchAll(PDO::FETCH_ASSOC), true);

    foreach($table_items as $key=>$value) {
      $stmt = $conn->prepare("SELECT * FROM articles WHERE ID=$key + 1");
      $stmt->execute();
            
      $articles = $stmt->fetchAll(PDO::FETCH_ASSOC);

      if($key > 9) {
        echo '<form method="get">
          <input name="loadAll" type="submit" value="Load all articles..."/>
        </form>';
        break;
      }

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
    echo "<p>Huh. This error shouldn't show up. Odd.</p>
    <div class=\"elevated-section\">
      <h4>Something went wrong</h4>
      <p>" . $e->getMessage(). "</p>" .
      "<figcaption><a href='https://t.me/YourOrdinaryCat'>Contact me</a> if you need help.</figcaption>
    </div>";
  }

  try {
    $stmt = $conn->prepare("SELECT Category FROM articles");
    $stmt->execute();
            
    $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $categories = array_unique($categories, SORT_REGULAR);

    echo '<form>
      <label for="categories">Categories</label>
            
      <br>

      <select id="categories" type="text">';

    foreach($categories as $key=>$value) {
      echo '<option value="' . $key + 2, '">' . $categories[$key]["Category"] . '</option>';
    }

    echo '</select>
      <input type="submit" onclick="goToCategory()" value="Go"/>
    </form>';

  } catch(PDOException $e) {
    echo "<p>Huh. This error shouldn't show up. Odd.</p>
    <div class=\"elevated-section\">
      <h4>Something went wrong</h4>
      <p>" . $e->getMessage(). "</p>" .
      "<figcaption><a href='https://t.me/YourOrdinaryCat'>Contact me</a> if you need help.</figcaption>
    </div>";
  }
?>