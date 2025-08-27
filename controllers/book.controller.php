<?php
  
  $book = $database->query(
    query: "select * from books where id = :id",
    class: Book::class,
    params: ['id' => $_GET['id']]
  )->fetch();

  $reviews = $database
    ->query("select * from reviews where book_id = :id", Review::class, ['id' => $_GET['id']])
    ->fetchAll();

  view('book', compact('book', 'reviews'));