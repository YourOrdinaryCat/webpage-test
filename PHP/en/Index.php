<?php $title_a = "Omar's Blog"; include("Parts/Part1.php"); ?>
      <h2 id="1">Articles</h2>

      <!-- Articles -->
      <?php
        foreach($all as $key=>$value) {
          if($key > 9) {
            echo '<button onclick=\'location.href="All.html"\'>Load all articles</button>';
            break;
          }

          echo '<blockquote>
            <img alt="' . $title[$key] . '" class="thumbnail" src="../Assets/Thumbnails/', $title[$key], '.png" onerror="this.src=\'../Assets/Thumbnails/Default.png\'"/>
            <h4><a href="', $title[$key], '.html">', $title[$key], '</a></h4>

            <figcaption>', $author[$key], ', ', $category[$key], '</figcaption>
          </blockquote>';
        }
      ?>

      <!-- Categories picker -->
      <form>
        <label for="categories">Navigate to category</label>
        <br>
        <select id="categories" onchange="javascript:location.href = 'Categories.html#' + document.getElementById('categories').value;" type="text">
          <option>---</option>
          <?php
            // Add categories in array
            foreach($categories as $key=>$value) {
              echo '<option value="' . $key + 1, '">' . substr($value, strlen($lang) + 5) . '</option>';
            }
          ?>
        </select>
      </form>

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

      <h3 id="22">Language</h3>
      <form>
        <label for="lang">Language</label>
        <br>
        <select id="lang" type="text">
          <option value="en">English</option>
          <option value="es">Spanish</option>
        </select>

        <input type="submit" onclick="changeLang()" value="Apply" />
      </form>

      <h3 id="23">Theming</h3>
      <form>
        <label for="mode">Select theme mode</label>
        <br>
        <select id="mode" type="text">
          <option value="Auto">Auto</option>
          <option value="Dark">Dark</option>
          <option value="Light">Light</option>
        </select>

        <input type="submit" onclick="changeMode()" value="Apply"/>
      </form>

      <form>
        <label for="theme">Select theme</label>
        <br>
        <select id="theme" type="text">
          <?php
            // Create arrays with theme files
            $pattern = __DIR__ . "/../../Files/Stylesheets/Auto/*.css";
            $themes = glob($pattern);

            // For every item in the array, add an entry
            foreach($themes as $key=>$value) {
              $theme_name = trim(substr($value, strrpos($value, '/') + 1));
              $theme_name = substr($theme_name, 0, -4);

              echo "<option value=\"", $theme_name, "\">", $theme_name, "</option>";
            }
          ?>
        </select>

        <input type="submit" onclick="changeTheme()" value="Apply"/>
      </form>

      <h3 id="24">Cookies</h3>
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

<?php include("Parts/Part2.html"); ?>
        <ul>
          <li><a class="nav-link" href="All.html">All</a></li>
          <li><a class="nav-link" href="Categories.html">Categories</a></li>
        </ul>

        <hr class="divider">

        <ul>
          <li><a class="nav-link" href="#1">Articles</a></li>
        </ul>

        <details>
          <summary>
            <h3><a href="#2">Settings</a></h3>
            <hr class="divider"/>
          </summary>
          <ul>
            <li><a class="nav-link" href="#21">Comments</a></li>
            <li><a class="nav-link" href="#22">Language</a></li>
            <li><a class="nav-link" href="#23">Theming</a></li>
            <li><a class="nav-link" href="#24">Cookies</a></li>
          </ul>
        </details>

        <details>
          <summary>
            <h3><a href="#3">About</a></h3>
            <hr class="divider"/>
          </summary>
          <ul>
            <li><a class="nav-link" href="#31">Comments</a></li>
            <li><a class="nav-link" href="#32">Source Code</a></li>
          </ul>
        </details>

<?php include("Parts/Part3.html"); ?>