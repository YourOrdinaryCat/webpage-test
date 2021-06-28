<?php
  session_start();

  if(isset($_POST['generate'])) {
    $time_pre = microtime(true);

    // Clear file status cache
    clearstatcache();

    // Set include path to working directory
    set_include_path(__DIR__);

    if(is_dir("Output")) {
      // Clean output folder
      $dir = "Output";
      $di = new RecursiveDirectoryIterator($dir, FilesystemIterator::SKIP_DOTS);
      $ri = new RecursiveIteratorIterator($di, RecursiveIteratorIterator::CHILD_FIRST);

      foreach ($ri as $file) {
        $file->isDir() ?  rmdir($file) : unlink($file);
      }

      rmdir("Output");
    }

    // Get languages
    $langs = glob("*", GLOB_ONLYDIR);

    foreach($langs as $k=>$lang) {
      // Create language directories
      mkdir("Output/" . $lang, 0777, true);

      // Create arrays with files
      $main = glob($lang . "/*.php");

      // Create array with articles
      $all = glob($lang . "/Articles/*.php");

      // Order array by creation date
      usort($all, function($file1, $file2) {
        $file1 = filemtime($file1);
        $file2 = filemtime($file2);
        if($file1 == $file2) {
          return 0;
        }
        return $file1 < $file2 ? 1 : -1;
      });

      // Theme files
      $themes = glob("../Files/Stylesheets/Auto/*.css");

      // Adjust theme names
      foreach($themes as $key=>$value) {
        $theme_name[$key] = trim(substr($value, strrpos($value, '/') + 1));
        $theme_name[$key] = substr($theme_name[$key], 0, -4);
      }

      // Loop that outputs every file in articles array to html
      foreach($all as $key=>$value) {
        // Start output buffer
        ob_start();

        // Include the needed files
        include($value);

        // Get article data
        $titles[$key] = $title;
        $authors[$key] = $author;
        $categories[$key] = $category;
        $descriptions[$key] = $description;

        $filenames[$key] = pathinfo($value, PATHINFO_FILENAME);

        // Output HTML file, clean buffer
        file_put_contents('Output/' . $lang . "/" . pathinfo($value, PATHINFO_FILENAME) . '.html', ob_get_clean());
      }

      // Loop that outputs every file in main array to html
      foreach($main as $key=>$value) {
        // Start output buffer
        ob_start();

        // Include the needed files
        include($value);

        // Output HTML file, clean buffer
        file_put_contents('Output/' . $lang . "/" . pathinfo($value, PATHINFO_FILENAME) . '.html', ob_get_clean());
      }
    }

    $time_post = microtime(true);
    $_SESSION["exec_time"] = $time_post - $time_pre;

    header("Location: {$_SERVER['REQUEST_URI']}", true, 303);
    exit();
  }
?>

<html lang="en">
  <head>
    <meta charset="utf-8">

    <title>Static Files Generator</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="../Files/Stylesheets/Normalize.css"/>

    <link rel="stylesheet" href="../Files/Stylesheets/General.css"/>
    <link rel="stylesheet" href="../Files/Stylesheets/MediaQueries.css"/>
    <link rel="stylesheet" href="../Files/Stylesheets/Style.css"/>

    <link id="theme-name" rel="stylesheet"/>

    <script src="../Files/Scripts.js"></script>
    <noscript><link rel="stylesheet" href="../Files/Stylesheets/Auto/Material.css"/></noscript>

    <link rel="icon" type="image/png" href="../Files/icon.png"/>
  </head>

  <body>
    <article class="content">
      <h1>Static Files Generator</h1>
      <nav>
        <h1>Testing</h1>
        <ul>
          <li><a class="list-link" href="/webpage-test/">Homepage</a></li>
        </ul>
      </nav>

      <p>Welcome. Here, you can generate the static files from your PHP files. Click the button below to proceed.</p>
      <form method="post">
        <input type="submit" name="generate" value="Generate Files"/>
      </form>

      <?php
        if(isset($_SESSION["exec_time"])) {
          echo "<hr class='divider'>";
          echo "<p>Time elapsed in last run: ", $_SESSION["exec_time"] * 1000 , "ms</p>";
        }
      ?>
    </article>
  </body>
</html>
