<?php include("Parts/Part1.html"); ?>
    <title>Omar's Blog</title>

<?php include("Parts/Part2.html"); ?>
        <ul>
          <li><div class="outline-link" onclick="location.href='#1';"><a href="#1">Articles</a></div></li>
        </ul>

        <details>
        <summary>
          <h3><a href="#2">Settings</a></h3>
          <hr class="divider"/>
        </summary>
        <ul>
          <li><div class="outline-link" onclick="location.href='#22';"><a href="#21">Comments</a></div></li>
          <li><div class="outline-link" onclick="location.href='#23';"><a href="#22">Theming</a></div></li>
          <li><div class="outline-link" onclick="location.href='#24';"><a href="#23">Cookies</a></div></li>
        </ul>
        </details>

        <details>
          <summary>
            <h3><a href="#3">About</a></h3>
            <hr class="divider"/>
          </summary>
          <ul>
            <li><div class="outline-link" onclick="location.href='#31';"><a href="#31">Comments</a></div></li>
            <li><div class="outline-link" onclick="location.href='#32';"><a href="#32">Source Code</a></div></li>
          </ul>
        </details>

<?php include("Parts/Part3.html"); ?>
<h1>Omar's Blog</h1>
<h2 id="1">Articles</h2>
<!-- Articles -->
<?php
  foreach($_SESSION["all"] as $key=>$value) {
    if($key > 9) {
      echo '<button onclick=\'location.href="all.html"\'>Load all articles</button>';
      break;
    }

    // Get article author
    $author = substr($value, strpos($value, ";;") + 2, strpos($value, ";;"));
    $author = substr($author, 0, -4);

    // Get article title from array
    $title = substr($value, 0, 0 - strlen($author) - 6);
    $title = substr($title, strpos($title, "/", 6) + 1, strpos($title, "/", 6));

    // Get article category
    $category = substr($value, 0, 0 - strlen($title) - strlen($author) - 7);
    $category = substr($category, 10);

    echo '<blockquote>
      <img alt="' . $title . '" class="thumbnail" src="Assets/Thumbnails/', $title, '.png" onerror="this.src=\'Assets/Thumbnails/Default.png\'"/>
      <h4><a href="', $title, '.html">', $title, '</a></h4>

      <figcaption>', $author, ', ', $category, '</figcaption>
    </blockquote>';
  }

  // Make a picker for categories
  echo '<form>
    <label for="categories">Navigate to category</label>
    <br>
    <select id="categories" onchange="javascript:location.href = \'categories.html#\' + document.getElementById(\'categories\').value;" type="text">
        <option>---</option>';

    foreach($_SESSION["categories"] as $key=>$value) {
      echo '<option value="' . $key + 1, '">' . substr($value, 10) . '</option>';
    }

    echo '</select>
    </form>';
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
          <?php
            // Create arrays with theme files
            $pattern = "../Files/Stylesheets/Auto/*.css";
            $themes = glob($pattern);

            // For every item in the array, add an entry
            foreach($themes as $key=>$value) {
              $theme_name = substr($value, 26);
              $theme_name = substr($theme_name, 0, -4);

              echo "<option value=\"", $theme_name, "\">", $theme_name, "</option>";
            }
          ?>
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

<?php include("Parts/Part4.html"); ?>
      <!-- Sticky content -->

<?php include("Parts/Part5.html"); ?>