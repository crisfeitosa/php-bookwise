<?php
 
  if ($_SERVER['REQUEST_METHOD'] != "POST") {
    header("Location: /my-books");

    exit();
  }

  if (! auth()) {
    abort(403);
  }

  $user_id = auth()->id;

  $title = $_POST['title'];

  $author = $_POST['author'];

  $description = $_POST['description'];

  $year_of_release = $_POST['year_of_release'];

  $validation = Validation::validate([
    'title' => ['required', 'min:3'],
    'author' => ['required'],
    'description' => ['required'],
    'year_of_release' => ['required']
  ], $_POST);

  if ($validation->notValid()) {
    header("Location: /my-books");

    exit();
  }

  $newName = md5(rand());

  $extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);

  $image = "images/$newName.$extension";

  move_uploaded_file($_FILES['image']['tmp_name'], $image);

  $database->query(
    "insert into books (title, author, description, year_of_release, user_id, image)
    values (:title, :author, :description, :year_of_release, :user_id, :image)",
    params: compact('title', 'author', 'description', 'year_of_release', 'user_id', 'image')
  );

  flash()->push('message', 'Livro cadastrado com sucesso!');

  header("Location: /my-books");

  exit();
