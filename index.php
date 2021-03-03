<?php
  session_start();

  $cookie_comments = "CommentsCookie";
  $cookie_mode = "ModeCookie";
  $cookie_theme = "ThemeCookie";

  if(isset($_POST['genCookie'])) {
    setcookie($cookie_comments, $_SESSION["comments"], time() + (86400 * 30));
    setcookie($cookie_mode, $_SESSION["mode"], time() + (86400 * 30));
    setcookie($cookie_theme, $_SESSION["theme"], time() + (86400 * 30));

    header("Location: {$_SERVER['REQUEST_URI']}", true, 303);
    exit();
  }

  if(isset($_POST['delCookie'])) {
    setcookie($cookie_comments, " ", 1);
    setcookie($cookie_mode, " ", 1);
    setcookie($cookie_theme, " ", 1);

    header("Location: {$_SERVER['REQUEST_URI']}", true, 303);
    exit();
  }

  if(isset($_POST['changeComments'])) {
    $_SESSION["comments"] = $_POST['commentsMode'];

    header("Location: {$_SERVER['REQUEST_URI']}", true, 303);
    exit();
  }

  if(isset($_POST['changeMode'])) {
    $_SESSION["mode"] = $_POST['themeMode'];

    header("Location: {$_SERVER['REQUEST_URI']}", true, 303);
    exit();
  }

  if(isset($_POST['changeTheme'])) {
    $_SESSION["theme"] = $_POST['themeName'];

    header("Location: {$_SERVER['REQUEST_URI']}", true, 303);
    exit();
  }

  if(!isset($_COOKIE[$cookie_theme])) {
    $gen_cookie = "Make a cookie";
  } else {
    $gen_cookie = "Manage this cookie";
    $_SESSION["comments"] = $_COOKIE[$cookie_comments];
    $_SESSION["mode"] = $_COOKIE[$cookie_mode];
    $_SESSION["theme"] = $_COOKIE[$cookie_theme];
  }

  if(!isset($_SESSION["comments"])) {
    $_SESSION["comments"] = "off";
  }

  if(!isset($_SESSION["mode"])) {
    $_SESSION["mode"] = "auto";
  }

  if(!isset($_SESSION["theme"])) {
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

<?php include("articles/parts/part1.html"); ?>
<title><?php echo $title; ?></title>

<?php include("articles/parts/part2.html"); ?>
<link rel="stylesheet" href="../../stylesheets/<?php echo $_SESSION["mode"]; ?>/themes-general.css"/>
<link rel="stylesheet" href="../../stylesheets/<?php echo $_SESSION["mode"]; ?>/<?php echo $_SESSION["theme"]; ?>.css"/>

<?php include("articles/parts/part3.html"); ?>
      <!-- Sidebar items go here -->
      <ul>
        <li><div class="sidebar-link" onclick="location.href='#1';"><a href="#1">Articles</a></div></li>
      </ul>

      <details>
        <summary>
          <h3><a href="#2">Settings</a></h3>
          <hr class="divider"/>
        </summary>
        <ul>
          <li><div class="sidebar-link" onclick="location.href='#21';"><a href="#21">Cookies</a></div></li>
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

<?php include("articles/parts/part4.html"); ?>
      <!-- Title -->
      <h1 id="0"><?php echo $title; ?></h1>

      <!-- Pinned articles -->
      <?php
        foreach($p_article_files as $p_key=>$p_value) {
          ob_start();
          include $p_value;
          ob_end_clean();

          echo '<div class="elevated-section">
          <h4><a href="', $p_value, '">', $title, '</a></h4>
          <p>';

          $intro = substr($intro, 0, 100);

          echo $intro, '...</p>
          <figcaption>', $author, '</figcaption>
          </div>';
        }
      ?>

      <hr class="divider"/>

      <h2 id="1">Articles</h2>
      <?php
        foreach($article_files as $key=>$value) {
          ob_start();
          include $value;
          ob_end_clean();

          echo '<div class="elevated-section">
          <h4><a href="', $value, '">', $title, '</a></h4>
          <p>';

          $intro = substr($intro, 0, 100);

          echo $intro, '...</p>
          <figcaption>', $author, '</figcaption>
          </div>';

          if($key == 9) {
            echo '<button onClick="location.href=';
            echo "'#2';";
            echo '">Load all articles</button>' ;
            break;
          }
        }
      ?>

      <!-- Settings -->
      <h2 id="2">Settings</h2>

      <?php
        if(!isset($_COOKIE[$cookie_theme])) {
            echo '<form method="post">
            <select name="commentsMode" type="text">
              <option value="off">Disable</option>
              <option value="on">Enable</option>
            </select>
            <input name="changeComments" type="submit" value="Apply"/>
          </form>
          <figcaption>Toggle comments.</figcaption>
          
          <form method="post">
            <select name="themeName" type="text">
              <optgroup label="Material">
                <option value="material">Default Material</option>
                <option value="material_themed">Material Theming</option>
              </optgroup>
              <optgroup label="iOS">
                <option value="ios">iOS</option>
              </optgroup>
              <optgroup label="Windows">
                <option value="fluent">Fluent (Windows 10)</option>
              </optgroup>
            </select>
            <input name="changeTheme" type="submit" value="Apply"/>
          </form>
          <figcaption>Theme settings.</figcaption>

          <form method="post">
            <select name="themeMode" type="text">
              <option value="auto">Auto</option>
              <option value="dark">Dark</option>
              <option value="light">Light</option>
            </select>
            <input name="changeMode" type="submit" value="Apply"/>
          </form>
          <figcaption>Toggle dark/light mode.</figcaption>

          <h3 id="21">Cookies</h3>
          <p>You can make a cookie to save your settings! This cookie will last 30 days, so
            you have to renew it before that if you want it to stay alive. It only
            stores your settings, pinky promise!</p>
            <form method="post">
              <input name="genCookie" type="submit" value="Make it! Make it!"/>
          </form>';
          
        } else {
          echo '<h3 id="21">Cookies</h3>
            <p>Your cookie is enabled!</p>
            <form method="post">
              <input name="delCookie" type="submit" value="Delete this cookie"/>
            </form>';
        }
      ?>

      <h2 id="3">About</h2>
      <h3 id="31">Comments</h3>
      <p>These are thanks to Telegram. It'll store some cookies if they're enabled.
        This is a Telegram thing, so best you can do about it is disabling comments if
        you don't want them. Learn more about comments
        <a href="https://core.telegram.org/widgets/discussion">here</a>.
      </p>

      <h3 id="32">Source Code</h3>
      <p>This blog's source code can be found <a href="https://github.com/YourOrdinaryCat/webpage-test">
      here</a>. The author is <a href="https://github.com/YourOrdinaryCat">YourOrdinaryCat</a>.</p>

      <h2 id="4">Comments</h2>
      <?php
        if($_SESSION['comments'] == "off") {
          echo '<p>Comments are off</p>';
        }

        if($_SESSION['comments'] == "on") {
          if($_SESSION['mode'] == "auto") {
            echo "<p>Hi there! Sorry for this, but I can't change comments theme dynamically.
            I made it default to dark, so if you use light theme, please toggle themes manually!
            <a href='../index.php#2'>Change your settings...</a></p>";
            echo '<div class="comments"><script async src="https://comments.app/js/widget.js?3" data-comments-app-website="B8gkNf6d" data-limit="100" data-height="397" data-dislikes="1" data-outlined="1" data-dark="1"></script></div>';
          } elseif ($_SESSION['mode'] == "dark") {
            echo '<div class="comments"><script async src="https://comments.app/js/widget.js?3" data-comments-app-website="B8gkNf6d" data-limit="100" data-height="397" data-dislikes="1" data-outlined="1" data-dark="1"></script></div>';
          } elseif($_SESSION['mode'] == "light") {
            echo '<div class="comments"><script async src="https://comments.app/js/widget.js?3" data-comments-app-website="B8gkNf6d" data-limit="100" data-height="397" data-dislikes="1" data-outlined="1"></script></div>';
          }
        }
      ?>

<?php include("articles/parts/part5.html"); ?>