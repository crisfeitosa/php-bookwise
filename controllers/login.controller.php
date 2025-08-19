<?php

  $message = $_REQUEST['message'] ?? '';

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $validation = Validation::validate([
      'email' => ['required', 'email'],
      'password' => ['required']
    ], $_POST);

    if ($validation->notValid()) {
      header('Location: /login');

      exit();
    }

    $user = $database->query(
      query: " select * from users where email = :email and password = :password",
      class: User::class,
      params: compact('email', 'password'),
    )->fetch();

    if($user) {
      $_SESSION['auth'] = $user;

      $_SESSION['message'] = "Seja bem-vindo" . $user->name . "!";
      
      header('Location: /');

      exit();
    }
  }

  view('login', compact('message'));