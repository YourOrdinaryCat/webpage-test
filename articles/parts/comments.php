<?php
  if($_SESSION['comments'] = "light") {
    echo('<h2>Comments</h2>
    <div class="comments">
      <script async src="https://comments.app/js/widget.js?3" data-comments-app-website="B8gkNf6d" data-limit="100" data-height="397" data-dislikes="1" data-outlined="1"></script>
    </div>');
  }

  if($_SESSION['comments'] = "dark") {
    echo('<h2>Comments</h2>
    <div class="comments">
      <script async src="https://comments.app/js/widget.js?3" data-comments-app-website="B8gkNf6d" data-limit="100" data-height="397" data-dislikes="1" data-outlined="1" data-dark="1"></script>
    </div>');
  }
?>