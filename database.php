<?php 

  class DB {
    public function books() {
      $db = new PDO('sqlite:database.sqlite');

      $query = $db->query("select * from books");

      $items = $query->fetchAll();
      $result = [];

      foreach ($items as $item) {
        $book = new Book();
        $book->id = $item['id'];
        $book->title = $item['title'];
        $book->author = $item['author'];
        $book->description = $item['description'];
        $book->year_of_release = $item['year_of_release'];

        $result[] = $book;
      }

      return $result;
    }
  }