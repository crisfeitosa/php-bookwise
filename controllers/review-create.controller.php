<?php 

  if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    header('Location: /');

    exit();
  }

  $user_id = auth()->id;

  $book_id = $_POST['book_id'];

  $review = $_POST['review'];

  $note = $_POST['note'];

  $validation = Validation::validate([
    'review' => $review,
    'note' => $note
  ], $_POST);

  if ($validation->notValid()) {
    header("Location: /book?id=" . $book_id);

    exit();
  }

  $database->query(
    query: "insert into reviews (user_id, book_id, review, note)
    values ( :user_id, :book_id, :review, :note )",
    params: compact('user_id', 'book_id', 'review', 'note')
  );

  flash()->push('message', 'Avaliação criada com sucesso!');

  header("Location: /book?id=" . $book_id);

  exit();