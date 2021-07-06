<?php
  $title = "Blog de Omar";
  $author = "Omar";
  $description = "Este es mi blog.";

  include("Parts/Part1.php");
?>

      <nav>
        <details open>
          <summary>
            <h1>Contenido</h1>
          </summary>

          <ul>
            <li><a class="list-link" href="All.html">Todo</a></li>
          </ul>

          <hr class="divider">

          <ul>
            <li><a class="list-link" href="#1">Artículos</a></li>
          </ul>

          <details>
            <summary>
              <h3><a href="#2">Configuración</a></h3>
            </summary>
            <ul>
              <li><a class="list-link" href="#22">Comentarios</a></li>
              <li><a class="list-link" href="#23">Idioma</a></li>
              <li><a class="list-link" href="#24">Temas</a></li>
              <li><a class="list-link" href="#25">Cookies</a></li>
            </ul>
          </details>

          <details>
            <summary>
              <h3><a href="#3">Acerca de</a></h3>
            </summary>
            <ul>
              <li><a class="list-link" href="#31">Comentarios</a></li>
              <li><a class="list-link" href="#32">Código fuente</a></li>
              <li><a class="list-link" href="#33">Normalize.css</a></li>
            </ul>
          </details>
        </details>
      </nav>

      <h2 id="1">Artículos</h2>

      <!-- Articles -->
      <ul class="nobullet">
        <?php
          foreach($all as $key_a=>$value_a) {
            if($key_a > 9) {
              echo '<a href="All.html">Todos los artículos</a>';
              break;
            }

            echo '<li>
              <a class="list-link" href="', $filenames[$key_a], '.html" title="', $titles[$key_a], '">',
                '<img alt="', $titles[$key_a], '" src="../Assets/Thumbnails/', $filenames[$key_a], '.png"/>
                <div>
                  <p>', $titles[$key_a], '</p>
                  <figcaption>', $authors[$key_a], ', ', $categories[$key_a], '</figcaption>
                </div>
              </a>
            </li>';
          }
        ?>
      </ul>

      <!-- Settings -->
      <h2 id="2">Configuración</h2>
      <noscript><p>Habilita JavaScript para usar ajustes geniales como temas, seleccionar un idioma y habilitar comentarios.</p></noscript>

      <div id="settings">
      </div>

      <script>
        document.getElementById('settings').insertAdjacentHTML('afterbegin', `<h3 id="22">Comentarios</h3>
        <form onsubmit="return changeComments();">
          <label for="comments">Comentarios</label>
          <select id="comments" type="text">
            <option value="off">Deshabilitar</option>
            <option value="on">Habilitar</option>
          </select>

          <input type="submit" value="Apply" />
        </form>

        <h3 id="23">Idioma</h3>
        <form onsubmit="return changeLang();">
          <label for="lang">Idioma</label>
          <select id="lang" type="text">
            <option value="en">Inglés</option>
            <option value="es">Español</option>
          </select>

          <input type="submit" value="Apply" />
        </form>

        <h3 id="24">Temas</h3>
        <form onsubmit="return changeMode();">
          <label for="mode">Modo</label>
          <select id="mode" type="text">
            <option value="Auto">Automático</option>
            <option value="Dark">Oscuro</option>
            <option value="Light">Claro</option>
          </select>

          <input type="submit" value="Apply"/>
        </form>

        <form onsubmit="return changeTheme();">
          <label for="theme">Tema</label>
          <select id="theme" type="text">
            <?php
              // For every item in the array, add an entry
              foreach($themes as $key_t=>$value_t) {
                echo "<option value=\"", $theme_name[$key_t], "\">", $theme_name[$key_t], "</option>";
              }
            ?>
          </select>

          <input type="submit" value="Apply"/>
        </form>

        <h3 id="25">Cookies</h3>
        <p>Para que los ajustes se guarden correctamente, necesitas cookies. Aquí
          puedes ver lo que contienen. Si el sitio da problemas, elimina las cookies
          y debe funcionar bien de nuevo.
        </p>
        <button onclick="alert(document.cookie)">Revisar mis cookies</button>`)
      </script>

      <h2 id="3">Acerca de</h2>
      <h3 id="31">Comentarios</h3>
      <p>Estos son gracias a Telegram. Guardarán algunas cookies si los habilitas.
        Esto es de parte de Telegram, así que si no las quieres, deshabilita los comentarios.
        <a href="https://core.telegram.org/widgets/discussion">Acerca de los comentarios...</a>
      </p>

      <h3 id="32">Código fuente</h3>
      <p>El código fuente de este blog se puede ver <a href="https://github.com/YourOrdinaryCat/webpage-test">
      aquí</a>. El autor es <a href="https://github.com/YourOrdinaryCat">YourOrdinaryCat</a>.</p>

      <h3 id="33">Normalize.css</h3>
      <p>Una alternativa moderna a resetos de CSS. <a href="https://github.com/necolas/normalize.css">Aprende más...</a></p>

<?php include("Parts/Part2.html"); ?>