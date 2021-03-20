<?php
  // Create array with needed files
  $pattern = "files/*.php";
  $files = glob($pattern);

  // Loop that outputs every file in array to html
  foreach($files as $key=>$value) {
    $filename = substr($value, 0, -4);
    $filename = substr($filename, 6);

    //Create files
    fopen('output/' . $filename . '.html', 'w');

    // Start output buffer
    ob_start();

    // Include the needed files
    include('files/' . $filename . '.php');

    // Output HTML file, clean buffer
    file_put_contents('output/' . $filename . '.html', ob_get_clean());
  }
?>