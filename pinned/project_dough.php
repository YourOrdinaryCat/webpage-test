<!-- Title goes here -->
<?php $title = "Project Dough" ?>

<!-- Intro paragraph -->
<?php $intro = "Hey fellow bread lover. I think we can agree on the fact that bread deserves
  more recognition. It's truly a versatile food, and it stood the test of time
  really well. You may not like some variants, and that's okay! But bread is
  undeniably great. That's why I made Project Dough! With your help, we'll be
  able to establish a fully functional bread kingdom." ?>

<!-- Author of the article, date -->
<?php $author = "Omar, 2021" ?>

<?php echo file_get_contents("parts/part1.html"); ?>
<title><?php echo $title; ?></title>

<?php echo file_get_contents("parts/part2.html"); ?>
      <!-- Sidebar items go here -->
      <details>
        <summary>
          <h3><a href="#1">Bread</a></h3>
          <hr class="divider"/>
        </summary>
        <ul>
          <li><div class="sidebar-link" onclick="location.href='#11';"><a href="#11">Quotes</a></div></li>
          <li><div class="sidebar-link" onclick="location.href='#12';"><a href="#12">Fun Facts</a></div></li>
        </ul>
      </details>

      <details>
        <summary>
          <h3><a href="#2">Our Plans</a></h3>
          <hr class="divider"/>
        </summary>
        <ul>
          <li><div class="sidebar-link" onclick="location.href='#21';"><a href="#21">Video Plans</a></div></li>
        </ul>
      </details>

<?php echo file_get_contents("parts/part3.html"); ?>
      <!-- Title -->
      <h1 id="0"><?php echo $title; ?></h1>

      <!-- Intro paragraph -->
      <p><?php echo($intro) ?></p>

      <hr class="divider"/>

      <!-- Pictures -->
      <div class="hstack-nw">
        <div>
          <picture>
            <img src="assets/photos/arepa.jpeg" alt="Arepa, a south american dish."/>
            <figcaption>Arepa, a south american dish.</figcaption>
          </picture>
        </div>

        <div>
          <picture>
            <img src="assets/photos/bagel.jpeg" alt="A very trustworthy bagel."/>
            <figcaption>A very trustworthy bagel.</figcaption>
          </picture>
        </div>

        <div>
          <picture>
            <img src="assets/photos/crepes.jpeg" alt="Crepes deserve more recognition."/>
            <figcaption>Crepes deserve more recognition.</figcaption>
          </picture>
        </div>

        <div>
          <picture>
            <img src="assets/photos/pretzel.jpeg" alt="Just a pretzel."/>
            <figcaption>Just a pretzel.</figcaption>
          </picture>
        </div>

        <div>
          <picture>
            <img src="assets/photos/white.jpeg" alt="Good ol' white bread. It doesn't bite."/>
            <figcaption>Good ol' white bread. It doesn't bite.</figcaption>
          </picture>
        </div>
      </div>

      <!-- Divider -->
      <hr class="divider">

      <!-- Bread related -->
      <h2 id="1">Bread</h2>

      <!-- Small paragraph about bread -->
      <div class="hstack-wrap">
        <div>
          <p>Bread is a staple food prepared from a dough of flour and water,
            usually by baking. Throughout recorded history, it has been a prominent
            food in large parts of the world. It is one of the oldest man-made foods,
            having been of significant importance since the dawn of agriculture, and
            plays an essential role in both religious rituals and secular culture.</p>
          
          <p>Bread may be leavened by naturally occurring microbes, chemicals,
            industrially produced yeast, or high-pressure aeration. In many countries,
            commercial bread often contains additives to improve flavor, texture, color,
            shelf life, nutrition, and ease of production.</p>

          <p>In other words, bread is the best food to ever exist. It's very important
            in our daily life and has served humanity for generations. Bread was and still
            is truly the beginning of a new tomorrow. And this is only one small step
            towards the ultimate bread form, where it trascends and asserts dominance. I
            love bread, it's truly the best food ever, period. If you argue there's
            anything better than my trustworthy bread (unless it's cats ofc), your last
            words will be exactly those you had the "courage" to spit out of your mouth.</p>
        </div>

  		  <!-- Bread best -->
    	  <div>
          <picture>
            <img src="assets/photos/white.jpeg" alt="Bread is best food."/>
            <figcaption>Bread is best food.</figcaption>
          </picture>
        </div>
      </div>

      <!-- Stuff people say about bread -->
      <h3 id="11">Quotes</h3>

      <div class="hstack-wrap">
        <div class="elevated-section-fixed">
          <h4>bread sus</h4>
          <p>WHERE IS THE SUS FILTER😭😭😭💔💔💔💔 dead body reported, oop its the
            bodies of LC OT admins! I saw someone vented but who was it? 🤔🤌🏻</p>
          <figcaption>Az, 2021</figcaption>
        </div>

        <div class="elevated-section-fixed">
          <h4>Dead body reported</h4>
          <p>Me (M13) screamed "dead body reported" at my aunt's funeral. My mom said
            that my aunt died and that we are going to her funeral the next morning. As
            soon as she left the room crying, I busted out laughing because it reminded
            me of among us, a popular video game. So as we were riding in the car I was
            thinking about saying "dead body reported" at the funeral. When we finally
            arrived I screamed "dead body reported", everyone was looking at me like
            some sort of a weirdo. Then I remembered that my grandfather's sister fell
            in the vents and died when she was 2 years old. So I said "grandpa's sister
            sus she vented". My grandfather started crying and everyone was screaming at
            me instead of laughing. My mom took my x box and said that I am going to
            therapist tomorrow. I dunno bro, my mom is acting kinda sus</p>
          <figcaption>Among Us, 2021</figcaption>
        </div>

        <div class="elevated-section-fixed">
          <h4>Such a great food</h4>
          <p>Bread is the best food ever. It helped me search myself and find out who I
            really am.</p>
          <figcaption>Someone, 2021</figcaption>
        </div>
      </div>

      <!-- Fun facts about bread -->
      <h3 id="12">Fun Facts</h3>
      <ul>
        <li>Bread mold fungus draws nutrients from the bread for its survival, and destroys
          the bread in the process.</li>
        <li>The most common bread in Lima, Peru’s capital, is called Pan Francés, which
          means French bread. However, the bread has nothing to do with France and Pan
          Francés doesn’t even exist in France.</li>
        <li>Bread is one of the only foods that eaten by people of every race, region and
          culture.</li>
        <li>In Russia, bread and salt are symbols of “welcome.”</li>
        <li>Breaking bread is a universal sign of peace.</li>
      </ul>

      <!-- Roadmap -->
      <h2 id="2">Our plans</h2>
      <p>If we want to dominate the world, we gotta do it right! That's why you can find
        our roadmap here.</p>

      <h3 id="21">Video Plans</h3>
      <div class="hstack-wrap">
        <div>
          <video controls>
            <source src="assets/videos/ivy.mp4"/>
          </video>
          <figcaption>ivy, by ivy</figcaption>
        </div>

        <div>
          <video controls>
        	  <source src="assets/videos/boxing.mp4"/>
          </video>
          <figcaption>red me not 8 in boxing, by omar</figcaption>
        </div>
      </div>

<?php echo file_get_contents("parts/part4.html"); ?>