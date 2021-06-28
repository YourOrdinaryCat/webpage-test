<?php
  $title = "Omar's Blog";
  $author = "Omar";
  $description = "This is my blog. Have fun!";

  include("Parts/Part1.php");
?>

      <nav>
        <details open>
          <summary>
            <h1>Contents</h1>
          </summary>

          <ul>
            <li><a class="list-link" href="All.html">All</a></li>
          </ul>

          <hr class="divider">

          <ul>
            <li><a class="list-link" href="#1">Articles</a></li>
          </ul>

          <details>
            <summary>
              <h3><a href="#2">Settings</a></h3>
              <hr class="divider"/>
            </summary>
            <ul>
              <li><a class="list-link" href="#22">Comments</a></li>
              <li><a class="list-link" href="#23">Language</a></li>
              <li><a class="list-link" href="#24">Theming</a></li>
              <li><a class="list-link" href="#25">Cookies</a></li>
            </ul>
          </details>

          <details>
            <summary>
              <h3><a href="#3">About</a></h3>
              <hr class="divider"/>
            </summary>
            <ul>
              <li><a class="list-link" href="#31">Comments</a></li>
              <li><a class="list-link" href="#32">Source Code</a></li>
              <li><a class="list-link" href="#33">Normalize.css</a></li>
            </ul>
          </details>
        </details>
      </nav>

      <h2 id="1">Articles</h2>

      <!-- Articles -->
      <ul class="nobullet">
        <?php
          foreach($all as $key_a=>$value_a) {
            if($key_a > 9) {
              echo '<a href="All.html">Load all articles</a>';
              break;
            }

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

      <!-- Settings -->
      <h2 id="2">Settings</h2>
      <noscript><p>Enable JavaScript to use amazing settings like changing themes, selecting a language and enabling comments!</p></noscript>

      <div id="settings">
      </div>

      <script>
        document.getElementById('settings').insertAdjacentHTML('afterbegin', `<h3 id="22">Comments</h3>
        <form onsubmit="return changeComments();">
          <label for="comments">Comments</label>
          <select id="comments" type="text">
            <option value="off">Disable</option>
            <option value="on">Enable</option>
          </select>

          <input type="submit" value="Apply" />
        </form>

        <h3 id="23">Language</h3>
        <form onsubmit="return changeLang();">
          <label for="lang">Language</label>
          <select id="lang" type="text">
            <option value="en">English</option>
            <option value="es">Spanish</option>
          </select>

          <input type="submit" value="Apply" />
        </form>

        <h3 id="24">Theming</h3>
        <form onsubmit="return changeMode();">
          <label for="mode">Select theme mode</label>
          <select id="mode" type="text">
            <option value="Auto">Auto</option>
            <option value="Dark">Dark</option>
            <option value="Light">Light</option>
          </select>

          <input type="submit" value="Apply"/>
        </form>

        <form onsubmit="return changeTheme();">
          <label for="theme">Select theme</label>
          <select id="theme" type="text">
            <?php
              // For every item in the array, add an entry
              foreach($themes as $key_t=>$value_t) {
                echo "<option value=\"", $theme_name[$key_t], "\">", $theme_name[$key_t], "</option>";
              }
            ?>
          </select>

          <input type="submit" value="Apply"/>
        </form>

        <h3 id="25">Cookies</h3>
        <p>For settings to save correctly, cookies are needed. Here you're able to see what
          values are stored in currently active cookies. If the website breaks, delete your
          cookies and it should work fine again.
        </p>
        <button onclick="alert(document.cookie)">Check my cookies</button>`)
      </script>

      <h2 id="3">About</h2>
      <h3 id="31">Comments</h3>
      <p>These are thanks to Telegram. It'll store some cookies if they're enabled.
        This is a Telegram thing, so best you can do about it is disabling comments if
        you don't want them. <a href="https://core.telegram.org/widgets/discussion">About comments...</a>
      </p>

      <h3 id="32">Source Code</h3>
      <p>This blog's source code can be found <a href="https://github.com/YourOrdinaryCat/webpage-test">
      here</a>. The author is <a href="https://github.com/YourOrdinaryCat">YourOrdinaryCat</a>.</p>

      <h3 id="33">Normalize.css</h3>
      <p>A modern alternative to CSS resets. <a href="https://github.com/necolas/normalize.css">Learn more...</a></p>

<?php include("Parts/Part2.html"); ?>