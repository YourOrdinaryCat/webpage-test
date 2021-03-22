<?php include("project-files/parts/part1.html"); ?>
    <title>All</title>

<?php include("project-files/parts/part2.html"); ?>
<?php include("project-files/parts/part3.html"); ?>
      <ul>
        <li><div class="sidebar-link" onclick="location.href='../';"><a href="../">Home</a></div></li>
        <li><div class="sidebar-link" onclick="location.href='categories';"><a href="categories">Categories</a></div></li>
      </ul>

<?php include("project-files/parts/part4.html"); ?>
      <h1 id="0">All</h1>

<?php
  try {
    $host = "localhost";
    $dbname = "articles";
    $username = "root";
    $password = "";

    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare("SELECT ID FROM articles"); // Get IDs
    $stmt->execute();

    $table_items = array_reverse($stmt->fetchAll(PDO::FETCH_ASSOC), true);

    foreach($table_items as $key=>$value) {
      $stmt = $conn->prepare("SELECT * FROM articles WHERE ID=$key + 1");
      $stmt->execute();

      $articles = $stmt->fetchAll(PDO::FETCH_ASSOC);

      echo '<blockquote>
        <h4><a href="', $articles[0]["Filename"], '">', $articles[0]["Title"], '</a></h4>';

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
      </blockquote>';
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