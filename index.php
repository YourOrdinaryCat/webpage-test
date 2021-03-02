<?php
  session_start();

  $cookie_mode = "ModeCookie";
  $cookie_theme = "ThemeCookie";

  if(isset($_POST['genCookie'])) {
    setcookie($cookie_mode, $_SESSION["mode"], time() + (86400 * 30));
    setcookie($cookie_theme, $_SESSION["theme"], time() + (86400 * 30));
  }

  if(isset($_POST['delCookie'])) {
    setcookie($cookie_mode, " ", 1);
    setcookie($cookie_theme, " ", 1);
  }

  if(isset($_POST['changeMode'])) {
    $_SESSION["mode"] = $_POST['themeMode'];
  }

  if(isset($_POST['changeTheme'])) {
    $_SESSION["theme"] = $_POST['themeName'];
  }

  if(!isset($_COOKIE[$cookie_theme])) {
    $gen_cookie = "Make a cookie";
  } else {
    $gen_cookie = "Manage this cookie";
    $_SESSION["mode"] = $_COOKIE[$cookie_mode];
    $_SESSION["theme"] = $_COOKIE[$cookie_theme];
  }

  if(!isset($_SESSION["theme"])) {
    $_SESSION["mode"] = "auto";
    $_SESSION["theme"] = "material";
  }
?>

<!-- Title goes here -->
<?php $title = "Omar's Blog" ?>

<!-- Count amount of articles in articles folder -->
<?php $pattern = "articles/*.php";
  $article_files = glob($pattern);
  $number_files = count(glob($pattern));

  // Order array by creation date
  usort($article_files, function($file_1, $file_2)
  {
    $file_1 = filectime($file_1);
    $file_2 = filectime($file_2);
    if($file_1 == $file_2)
    {
      return 0;
    }
    return $file_1 < $file_2 ? 1 : -1;
  });
?>

<!-- Count amount of articles in pinned articles folder -->
<?php $p_pattern = "pinned/*.php";
  $p_article_files = glob($p_pattern);
  $p_number_files = count(glob($p_pattern));

  // Order array by creation date
  usort($p_article_files, function($p_file_1, $p_file_2)
  {
    $p_file_1 = filectime($p_file_1);
    $p_file_2 = filectime($p_file_2);
    if($p_file_1 == $p_file_2)
    {
      return 0;
    }
    return $p_file_1 < $p_file_2 ? 1 : -1;
  });
?>

<?php echo file_get_contents("articles/parts/part1.html"); ?>
<title><?php echo $title; ?></title>

<?php echo file_get_contents("articles/parts/part2.html"); ?>
<link rel="stylesheet" href="../../stylesheets/<?php echo $_SESSION["mode"]; ?>/<?php echo $_SESSION["theme"]; ?>.css"/>

<?php echo file_get_contents("articles/parts/part3.html"); ?>
      <!-- Sidebar items go here -->
      <ul>
        <li><div class="sidebar-link" onclick="location.href='#1';"><a href="#1">Articles</a></div></li>
      </ul>

      <br>

      <details>
        <summary>
          <h3><a href="#2">Settings</a></h3>
          <hr class="divider"/>
        </summary>
        <ul>
          <li><div class="sidebar-link" onclick="location.href='#21';"><a href="#21">Cookies</a></div></li>
        </ul>
      </details>

<?php echo file_get_contents("articles/parts/part4.html"); ?>
      <!-- Title -->
      <h1 id="0"><?php echo $title; ?></h1>

      <!-- Pinned articles -->
      <?php
        foreach($p_article_files as $p_key=>$p_value) {
          ob_start();
          include $p_value;
          ob_end_clean();

          echo('<div class="elevated-section">
            <h4><a href="');

          echo $p_value;

          echo('">');

          echo $title;

          echo('</a></h4>
          <p>');

          $intro = substr($intro, 0, 100);

          echo($intro);
          
          echo('...</p>
          <figcaption>');

          echo($author);

          echo('</figcaption>
          </div>');
        }
      ?>

      <hr class="divider"/>

      <h2 id="1">Articles</h2>
      <?php
        foreach($article_files as $key=>$value) {
          ob_start();
          include $value;
          ob_end_clean();

          echo('<div class="elevated-section">
          <h4><a href="');

          echo $value;

          echo('">');

          echo $title;

          echo('</a></h4>
          <p>');

          $intro = substr($intro, 0, 100);

          echo($intro);
          
          echo('...</p>
          <figcaption>');

          echo($author);

          echo('</figcaption>
          </div>');

          if($key == 9) {
            echo('<button onClick="location.href=');
            echo("'#2';");
            echo('">Load all articles</button>');
            break;
          }
        }
      ?>

      <!-- Settings -->
      <h2 id="2">Settings</h2>

      <?php
        if(!isset($_COOKIE[$cookie_theme])) {
          echo('<form method="post">
            <select name="themeName" type="text">
              <optgroup label="Material">
                <option value="material">Default Material</option>
                <option value="material_themed">Material Theming (BETA)</option>
              </optgroup>
              <optgroup label="iOS">
                <option value="ios">iOS</option>
              </optgroup>
              <optgroup label="Windows">
                <option value="fluent">Fluent (Windows 10)</option>
              </optgroup>
            </select>
            <input name="changeTheme" type="submit" value="Apply theme"/>
          </form>

          <form method="post">
            <select name="themeMode" type="text">
              <option value="auto">Auto</option>
              <option value="dark">Dark</option>
              <option value="light">Light</option>
            </select>
            <input name="changeMode" type="submit" value="Apply mode"/>
          </form>
          
          <h3 id="21">Cookies</h3>
          <p>You can make a cookie to save your settings! This cookie will last 30 days, so
            you have to renew it before that if you want it to stay alive. It only
            stores your settings, pinky promise!</p>
            <form method="post">
              <input name="genCookie" type="submit" value="Make it! Make it!"/>
          </form>');
          
        } else {
          echo('<h3 id="21">Cookies</h3>
            <p>Your cookie is enabled!</p>
            <form method="post">
              <input name="delCookie" type="submit" value="Delete this cookie"/>
            </form>');
        }
      ?>

<?php echo file_get_contents("articles/parts/part5.html"); ?>