<?php

  if (! auth()) {
    header('Location: /');

    exit();
  }

  $books = Book::my(auth()->id);

  view('my-books', compact('books'));