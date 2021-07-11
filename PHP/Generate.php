<?php
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
        $data[$key][0] = strtotime($date);
        $data[$key][1] = $title;
        $data[$key][2] = $author;
        $data[$key][3] = $category;
        $data[$key][4] = $description;

        $data[$key][5] = pathinfo($value, PATHINFO_FILENAME);

        // Output HTML file, clean buffer
        file_put_contents('Output/' . $lang . "/" . pathinfo($value, PATHINFO_FILENAME) . '.html', ob_get_clean());
      }

      rsort($data);

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
    $exec_time = $time_post - $time_pre;

    header("Location: {$_SERVER['REQUEST_URI']}", true, 303);
    exit();
  }
?>

<!DOCTYPE html>
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
        <details open>
          <summary>
            <h1>Testing</h1>
          </summary>

          <ul>
            <li><a class="list-link" href="/webpage-test/">Homepage</a></li>
          </ul>

        </details>
        
        
      </nav>

      <p>Welcome. Here, you can generate the static files from your PHP files. Click the button below to proceed.</p>
      <form method="post">
        <input type="submit" name="generate" value="Generate Files"/>
      </form>
    </article>
  </body>
</html>
