<?php
  
  $book = $database->query(
    query: "
      select 
        l.id,
        l.title,
        l.author,
        l.description,
        l.year_of_release,
        round(sum(a.note) / 5.0) as note_review,
        count(a.id) as count_reviews
      from 
        books l
      left join reviews a on a.book_id = l.id
      where 
        l.id = :id
      group by
        l.id,
        l.title,
        l.author,
        l.description,
        l.year_of_release;
    ",
    class: Book::class,
    params: ['id' => $_GET['id']]
  )->fetch();

  $reviews = $database
    ->query("select * from reviews where book_id = :id", Review::class, ['id' => $_GET['id']])
    ->fetchAll();

  view('book', compact('book', 'reviews'));