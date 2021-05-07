<?php
  $title = "Lorem Ipsum";
  $author = "Plantilla";
  $category = "Plantillas";
  $description = "Todo sobre Lorem Ipsum.";

  include __DIR__ . "/../Parts/Part1.php";
?>
      <h2 id="1">¿Qué es Lorem Ipsum?</h2>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam auctor laoreet placerat. Nam cursus, nibh et luctus finibus, tellus massa maximus lacus, et ornare metus odio placerat tellus. Mauris congue aliquam lorem sed luctus. Proin ut risus et felis consectetur luctus at non nibh. Sed a tempus diam. Maecenas ex sem, scelerisque sed neque vel, semper tincidunt metus. Maecenas ut porttitor leo, pellentesque tempor nisl. Donec tristique placerat cursus. Maecenas vitae congue nisi.</p>

      <?php include __DIR__ . "/../Authors/" . $author . ".html"; ?>
      <?php include __DIR__ . "/../Parts/Comments.html"; ?>

<?php include __DIR__ . "/../Parts/Part2.html"; ?>
        <!-- Outline -->
        <ul>
          <li><a class="nav-link" href="#1">¿Qué es Lorem Ipsum?</a></li>
        </ul>

<?php include __DIR__ . "/../Parts/Part3.html"; ?>