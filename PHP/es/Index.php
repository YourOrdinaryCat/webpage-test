<?php $title_a = "Blog de Omar"; include("Parts/Part1.php"); ?>
      <h2 id="1">Artículos</h2>

      <!-- Articles -->
      <?php
        foreach($all as $key=>$value) {
          if($key > 9) {
            echo '<button onclick=\'location.href="All.html"\'>Todos los artículos</button>';
            break;
          }

          echo '<blockquote>
            <img alt="' . $title[$key] . '" class="thumbnail" src="../Assets/Thumbnails/', $title[$key], '.png" onerror="this.src=\'../Assets/Thumbnails/Default.png\'"/>
            <h4><a href="', $title[$key], '.html">', $title[$key], '</a></h4>

            <figcaption>', $author[$key], ', ', $category[$key], '</figcaption>
          </blockquote>';
        }
      ?>

      <!-- Categories picker -->
      <form>
        <label for="categories">Ir a categoría</label>
        <br>
        <select id="categories" onchange="javascript:location.href = 'Categories.html#' + document.getElementById('categories').value;" type="text">
          <option>---</option>
          <?php
            // Add categories in array
            foreach($categories as $key=>$value) {
              echo '<option value="' . $key + 1, '">' . substr($value, strlen($lang) + 5) . '</option>';
            }
          ?>
        </select>
      </form>

      <!-- Settings -->
      <h2 id="2">Configuración</h2>
      <h3 id="21">Comentarios</h3>
      <form>
        <label for="comments">Comentarios</label>
        <br>
        <select id="comments" type="text">
          <option value="off">Deshabilitar</option>
          <option value="on">Habilitar</option>
        </select>

        <input type="submit" onclick="changeComments()" value="Apply" />
      </form>

      <h3 id="22">Idioma</h3>
      <form>
        <label for="lang">Idioma</label>
        <br>
        <select id="lang" type="text">
          <option value="en">Inglés</option>
          <option value="es">Español</option>
        </select>

        <input type="submit" onclick="changeLang()" value="Apply" />
      </form>

      <h3 id="23">Temas</h3>
      <form>
        <label for="mode">Modo</label>
        <br>
        <select id="mode" type="text">
          <option value="Auto">Automático</option>
          <option value="Dark">Oscuro</option>
          <option value="Light">Claro</option>
        </select>

        <input type="submit" onclick="changeMode()" value="Apply"/>
      </form>

      <form>
        <label for="theme">Tema</label>
        <br>
        <select id="theme" type="text">
          <?php
            // Create arrays with theme files
            $pattern = __DIR__ . "/../../Files/Stylesheets/Auto/*.css";
            $themes = glob($pattern);

            // For every item in the array, add an entry
            foreach($themes as $key=>$value) {
              $theme_name = trim(substr($value, strrpos($value, '/') + 1));
              $theme_name = substr($theme_name, 0, -4);

              echo "<option value=\"", $theme_name, "\">", $theme_name, "</option>";
            }
          ?>
        </select>

        <input type="submit" onclick="changeTheme()" value="Apply"/>
      </form>

      <h3 id="24">Cookies</h3>
      <p>Para que los ajustes se guarden correctamente, necesitas cookies. Aquí
        puedes ver lo que contienen. Si el sitio da problemas, elimina las cookies
        y debe funcionar bien de nuevo.
      </p>
      <button onclick="alert(document.cookie)">Revisar mis cookies</button>

      <h2 id="3">Acerca de</h2>
      <h3 id="31">Comentarios</h3>
      <p>Estos son gracias a Telegram. Guardarán algunas cookies si los habilitas.
        Esto es de parte de Telegram, así que si no las quieres, deshabilita los comentarios.
        <a href="https://core.telegram.org/widgets/discussion">Acerca de los comentarios...</a>
      </p>

      <h3 id="32">Código fuente</h3>
      <p>El código fuente de este blog se puede ver <a href="https://github.com/YourOrdinaryCat/webpage-test">
      aquí</a>. El autor es <a href="https://github.com/YourOrdinaryCat">YourOrdinaryCat</a>.</p>

<?php include("Parts/Part2.html"); ?>
        <ul>
          <li><a class="nav-link" href="All.html">Todo</a></li>
          <li><a class="nav-link" href="Categories.html">Categorías</a></li>
        </ul>

        <hr class="divider">

        <ul>
          <li><a class="nav-link" href="#1">Artículos</a></li>
        </ul>

        <details>
          <summary>
            <h3><a href="#2">Configuración</a></h3>
            <hr class="divider"/>
          </summary>
          <ul>
            <li><a class="nav-link" href="#21">Comentarios</a></li>
            <li><a class="nav-link" href="#22">Idioma</a></li>
            <li><a class="nav-link" href="#23">Temas</a></li>
            <li><a class="nav-link" href="#24">Cookies</a></li>
          </ul>
        </details>

        <details>
          <summary>
            <h3><a href="#3">Acerca de</a></h3>
            <hr class="divider"/>
          </summary>
          <ul>
            <li><a class="nav-link" href="#31">Comentarios</a></li>
            <li><a class="nav-link" href="#32">Código fuente</a></li>
          </ul>
        </details>

<?php include("Parts/Part3.html"); ?>