<?php
  session_start();

  if(isset($_POST['generate'])) {
    $time_pre = microtime(true);

    // Set include path to working directory
    set_include_path(__DIR__);

    // Unset array with all the files
    unset($_SESSION["all"]);

    // Clean output folder
    $dir = "Output";
    $di = new RecursiveDirectoryIterator($dir, FilesystemIterator::SKIP_DOTS);
    $ri = new RecursiveIteratorIterator($di, RecursiveIteratorIterator::CHILD_FIRST);
    foreach ($ri as $file) {
      $file->isDir() ?  rmdir($file) : unlink($file);
    }

    // Create arrays with files
    $pattern = "Files/*.php";
    $main = glob($pattern);

    $pattern = "Files/cat-*";
    $_SESSION["categories"] = glob($pattern, GLOB_ONLYDIR);

    foreach($_SESSION["categories"] as $key=>$value) {
      if(isset($_SESSION["all"])) {
        $_SESSION["all"] = array_merge($_SESSION["all"],glob($value . "/*.php"));
      } else {
        $_SESSION["all"] = glob($value . "/*.php");
      }
    }

    // Order array by creation date
    usort($_SESSION["all"], function($file1, $file2) {
      $file1 = filectime($file1);
      $file2 = filectime($file2);
      if($file1 == $file2) {
        return 0;
      }
      return $file1 < $file2 ? 1 : -1;
    });

    // Loop that outputs every file in main array to html
    foreach($main as $key=>$value) {
      // Get filename
      $filename = substr($value, 0, -4);
      $filename = substr($filename, 6);

      //Create files
      fopen('Output/' . $filename . '.html', 'w');

      // Start output buffer
      ob_start();

      // Include the needed files
      include($value);

      // Output HTML file, clean buffer
      file_put_contents('Output/' . $filename . '.html', ob_get_clean());
    }

    // Loop that outputs every file in articles array to html
    foreach($_SESSION["all"] as $key=>$value) {
      // Get article author
      $_SESSION["author"] = substr($value, strpos($value, ";;") + 2, strpos($value, ";;"));
      $_SESSION["author"] = substr($_SESSION["author"], 0, -4);

      // Get article title from array
      $_SESSION["title"] = substr($value, 0, 0 - strlen($_SESSION["author"]) - 6);
      $_SESSION["title"] = substr($_SESSION["title"], strpos($_SESSION["title"], "/", 6) + 1, strpos($_SESSION["title"], "/", 6));

      // Get article category
      $_SESSION["category"] = substr($value, 0, 0 - strlen($_SESSION["title"]) - strlen($_SESSION["author"]) - 7);
      $_SESSION["category"] = substr($_SESSION["category"], 10);

      //Create files
      fopen('Output/' . $_SESSION["title"] . '.html', 'w');

      // Start output buffer
      ob_start();

      // Include the needed files
      include($value);

      // Output HTML file, clean buffer
      file_put_contents('Output/' . $_SESSION["title"] . '.html', ob_get_clean());
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

  <link rel="stylesheet" href="../Files/Stylesheets/General.css"/>
  <link rel="stylesheet" href="../Files/Stylesheets/MediaQueries.css"/>
  <link rel="stylesheet" href="../Files/Stylesheets/Style.css"/>

  <link rel="stylesheet" href="../Files/Stylesheets/Auto/Fluent.css"/>
  <link rel="stylesheet" href="../Files/Stylesheets/Auto/General.css"/>

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
        echo "<p>Time elapsed in last run: ", $_SESSION["exec_time"] / 1000 , "ms</p>";
      }
    ?>
  </article>
</body>