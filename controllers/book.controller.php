<?php
  
  $book = Book::get($_GET['id']);

  $reviews = $database
    ->query("select * from reviews where book_id = :id", Review::class, ['id' => $_GET['id']])
    ->fetchAll();

  view('book', compact('book', 'reviews'));