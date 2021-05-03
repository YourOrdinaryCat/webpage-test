<?php
  session_start();

  if(isset($_POST['generate'])) {
    $time_pre = microtime(true);

    // Set include path to working directory
    set_include_path(__DIR__);

    // Clean output folder
    $dir = "Output";
    $di = new RecursiveDirectoryIterator($dir, FilesystemIterator::SKIP_DOTS);
    $ri = new RecursiveIteratorIterator($di, RecursiveIteratorIterator::CHILD_FIRST);

    foreach ($ri as $file) {
      $file->isDir() ?  rmdir($file) : unlink($file);
    }

    rmdir("Output");

    // Get languages
    $langs = glob("*", GLOB_ONLYDIR);

    foreach($langs as $key=>$lang) {
      // Unset array with all the files
      unset($all);

      // Create language directories
      mkdir("Output/" . $lang, 0777, true);

      // Create arrays with files
      $pattern = $lang . "/*.php";
      $main = glob($pattern);

      // Create array with categories
      $pattern = $lang . "/cat-*";
      $categories = glob($pattern, GLOB_ONLYDIR);

      foreach($categories as $key=>$value) {
        if(isset($all)) {
          $all = array_merge($all,glob($value . "/*.php"));
        } else {
          $all = glob($value . "/*.php");
        }
      }

      // Order array by creation date
      usort($all, function($file1, $file2) {
        $file1 = filectime($file1);
        $file2 = filectime($file2);
        if($file1 == $file2) {
          return 0;
        }
        return $file1 < $file2 ? 1 : -1;
      });

      // Get article data
      foreach($all as $key=>$value) {
        // Get article authors
        $author[$key] = substr($value, strpos($value, ";;") + 2);
        $author[$key] = substr($author[$key], 0, -4);

        // Get article titles
        $title[$key] = substr($value, strpos($value, "/", 4) + 1);
        $title[$key] = substr($title[$key], 0, 0 - strlen($author[$key]) - 6);

        // Get article categories
        $category[$key] = substr($value, strpos($value, "cat-") + 4);
        $category[$key] = substr($category[$key], 0, strpos($category[$key], "/"));
      }

      // Loop that outputs every file in main array to html
      foreach($main as $key=>$value) {
        // Get filename
        $filename = substr($value, 0, -4);
        $filename = substr($filename, strlen($lang) + 1);

        //Create files
        fopen('Output/' . $lang . "/" . $filename . '.html', 'w');

        // Start output buffer
        ob_start();

        // Include the needed files
        include($value);

        // Output HTML file, clean buffer
        file_put_contents('Output/' . $lang . "/" . $filename . '.html', ob_get_clean());
      }

      // Loop that outputs every file in articles array to html
      foreach($all as $key=>$value) {
        //Create files
        fopen('Output/' . $lang . "/" . $title[$key] . '.html', 'w');

        // Start output buffer
        ob_start();

        // Include the needed files
        include($value);

        // Output HTML file, clean buffer
        file_put_contents('Output/' . $lang . "/" . $title[$key] . '.html', ob_get_clean());
      }
    }

    $time_post = microtime(true);
    $_SESSION["exec_time"] = $time_post - $time_pre;

    header("Location: {$_SERVER['REQUEST_URI']}", true, 303);
    exit();
  }
?>

<head>
  <meta charset="UTF-8">

  <title>Static Files Generator</title>

  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="../Files/Stylesheets/General.css"/>
  <link rel="stylesheet" href="../Files/Stylesheets/MediaQueries.css"/>
  <link rel="stylesheet" href="../Files/Stylesheets/Style.css"/>

  <link id="theme-name" rel="stylesheet"/>

  <script src="../Files/Scripts.js"></script>

  <link rel="icon" type="image/png" href="../Files/icon.png"/>
</head>

<body>
  <article class="content">
    <h1>Static Files Generator</h1>
    <p>Welcome. Here, you can generate the static files from your PHP files. Click the button below to proceed.</p>
    <form method="post">
      <input type="submit" name="generate" value="Generate Files"/>
    </form>

    <?php
      if(isset($_SESSION["exec_time"])) {
        echo "<p>Time elapsed in last run: ", $_SESSION["exec_time"] * 1000 , "ms</p>";
      }
    ?>
  </article>

  <aside>
    <nav>
      <h1>Testing</h1>
      <ul>
        <li><a class="nav-link" href="/webpage-test/">Home</a></li>
      </ul>
    </nav>
  </aside>
</body>