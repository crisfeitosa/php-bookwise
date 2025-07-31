<?php
  require 'data.php';

  $id = $_REQUEST['id'];

  $filteredBooks = array_filter($books, fn($l) => $l['id'] == $id);

  $book = array_pop($filteredBooks);

  $view = 'book';

  require 'views/template/app.php';
?>
