<?php include __DIR__ . "/../Parts/Part1.html"; ?>
<title><?php echo $_SESSION["title"]; ?></title>

<?php include __DIR__ . "/../Parts/Part2.html"; ?>
      <!-- Outline -->

<?php include __DIR__ . "/../Parts/Part3.html"; ?>
      <!-- Title, author and category -->
      <h1><?php echo $_SESSION["title"]; ?></h1>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam auctor laoreet placerat. Nam cursus, nibh et luctus finibus, tellus massa maximus lacus, et ornare metus odio placerat tellus. Mauris congue aliquam lorem sed luctus. Proin ut risus et felis consectetur luctus at non nibh. Sed a tempus diam. Maecenas ex sem, scelerisque sed neque vel, semper tincidunt metus. Maecenas ut porttitor leo, pellentesque tempor nisl. Donec tristique placerat cursus. Maecenas vitae congue nisi.</p>

<?php include __DIR__ . "/../Parts/Part4.html"; ?>
      <!-- Sticky content -->
      <?php include __DIR__ . "/../Authors/" . $_SESSION["author"] . ".html"; ?>
      <?php include __DIR__ . "/../Parts/Comments.html"; ?>

<?php include __DIR__ . "/../Parts/Part5.html"; ?>