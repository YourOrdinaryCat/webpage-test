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
      <!-- Sidebar items go here -->
      <ul>
        <li><div class="sidebar-link" onclick="location.href='#1';"><a href="#1">About</a></div></li>
        <li><div class="sidebar-link" onclick="location.href='#1';"><a href="#2">Special Thanks</a></div></li>
      </ul>

<?php echo file_get_contents("articles/parts/part3.html"); ?>
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

      <h2>Articles</h2>
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
        }
      ?>

      <h2 id="2">Special Thanks</h2>
      <div class="hstack-wrap">
        <div class="elevated-section">
          <h4>Detectizr</h4>
          <p>"A Modernizr extension to detect device, device model, screen size, operating
            system, and browser details."</p>
          <figcaption><a href="https://mit-license.org/">License</a> and
            <a href="https://github.com/barisaydinoglu/Detectizr">source code</a>, thanks
            to <a href="https://github.com/barisaydinoglu">Baris Aydinoglu</a>.</figcaption>
        </div>

        <div class="elevated-section">
          <h4>Modernizr</h4>
          <p>"Modernizr is a JavaScript library that detects HTML5 and CSS3 features in the
            user’s browser."</p>
          <figcaption><a href="https://mit-license.org/">License</a>
            and <a href="https://github.com/Modernizr/Modernizr">source code</a>,
            thanks to all its contributors.</figcaption>
        </div>
      </div>

<?php echo file_get_contents("articles/parts/part4.html"); ?>