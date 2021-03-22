<?php include("project-files/parts/part1.html"); ?>
    <title>Omar's Blog</title>

<?php include("project-files/parts/part2.html"); ?>
<?php include("project-files/parts/part3.html"); ?>

        <ul>
          <li><div class="sidebar-link" onclick="location.href='#1';"><a href="#1">Articles</a></div></li>
        </ul>

        <details>
        <summary>
          <h3><a href="#2">Settings</a></h3>
          <hr class="divider"/>
        </summary>
        <ul>
          <li><div class="sidebar-link" onclick="location.href='#22';"><a href="#21">Comments</a></div></li>
          <li><div class="sidebar-link" onclick="location.href='#23';"><a href="#22">Theming</a></div></li>
          <li><div class="sidebar-link" onclick="location.href='#24';"><a href="#23">Cookies</a></div></li>
        </ul>
        </details>

        <details>
          <summary>
            <h3><a href="#3">About</a></h3>
            <hr class="divider"/>
          </summary>
          <ul>
            <li><div class="sidebar-link" onclick="location.href='#31';"><a href="#31">Comments</a></div></li>
            <li><div class="sidebar-link" onclick="location.href='#32';"><a href="#32">Source Code</a></div></li>
          </ul>
        </details>

        <ul>
          <li><div class="sidebar-link" onclick="location.href='#4';"><a href="#4">Comments</a></div></li>
        </ul>

<?php include("project-files/parts/part4.html"); ?>
<h1 id="0">Omar's Blog</h1>
<h2 id="1">Articles</h2>
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
        echo '<button onclick=\'location.href="all"\'>Load all articles</button>';
        break;
      }

      echo '<blockquote>
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
      </blockquote>';
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
      <label for="categories">Navigate to category</label>
      <br>
      <select id="categories" onchange="javascript:location.href = \'categories.html#\' + document.getElementById(\'categories\').value;" type="text">
        <option>---</option>';

    foreach($categories as $key=>$value) {
      echo '<option value="' . $key + 1, '">' . $categories[$key]["Category"] . '</option>';
    }

    echo '</select>
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

      <!-- Settings -->
      <h2 id="2">Settings</h2>
      <h3 id="21">Comments</h3>
      <form>
        <label for="comments">Comments</label>
        <br>
        <select id="comments" type="text">
          <option value="off">Disable</option>
          <option value="on">Enable</option>
        </select>

        <input type="submit" onclick="changeComments()" value="Apply" />
      </form>
            
      <h3 id="22">Theming</h3>
      <form>
        <label for="mode">Select theme mode</label>
        <br>
        <select id="mode" type="text">
          <option value="auto">Auto</option>
          <option value="dark">Dark</option>
          <option value="light">Light</option>
        </select>

        <input type="submit" onclick="changeMode()" value="Apply"/>
      </form>

      <form>
        <label for="theme">Select theme</label>
        <br>
        <select id="theme" type="text">
          <optgroup label="Material">
            <option value="material">Default Material</option>
            <option value="material_themed">Material Theming</option>
          </optgroup>
          <optgroup label="iOS">
            <option value="ios">iOS</option>
          </optgroup>
          <optgroup label="Windows">
            <option value="fluent">Fluent</option>
          </optgroup>
        </select>

        <input type="submit" onclick="changeTheme()" value="Apply"/>
      </form>

      <h3 id="23">Cookies</h3>
      <p>For settings to save correctly, cookies are needed. Here you're able to see what
        values are stored in currently active cookies. If the website breaks, delete your
        cookies and it should work fine again.
      </p>
      <button onclick="alert(document.cookie)">Check my cookies</button>

      <h2 id="3">About</h2>
      <h3 id="31">Comments</h3>
      <p>These are thanks to Telegram. It'll store some cookies if they're enabled.
        This is a Telegram thing, so best you can do about it is disabling comments if
        you don't want them. <a href="https://core.telegram.org/widgets/discussion">About comments...</a>
      </p>

      <h3 id="32">Source Code</h3>
      <p>This blog's source code can be found <a href="https://github.com/YourOrdinaryCat/webpage-test">
      here</a>. The author is <a href="https://github.com/YourOrdinaryCat">YourOrdinaryCat</a>.</p>

      <h2 id="4">Comments</h2>
      <p id="comments_alert"></p>
      <div id="comments_window" class="comments">
        <script async src="https://comments.app/js/widget.js?3" data-comments-app-website="2CVB_3-2" data-limit="100" data-height="397" data-dislikes="1" data-outlined="1" data-dark="1"></script>
      </div>

<?php include("project-files/parts/part5.html"); ?>