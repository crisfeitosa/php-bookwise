<?php 

  class Book {
    public $id;
    public $title;
    public $author;
    public $description;
    public $year_of_release;

    public static function make($item) {
      $book = new self();

      $book->id = $item['id'];
      $book->title = $item['title'];
      $book->author = $item['author'];
      $book->description = $item['description'];
      $book->year_of_release = $item['year_of_release'];

      return $book;
    }
  }