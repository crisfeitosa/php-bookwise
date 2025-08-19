<?php

  $message = $_REQUEST['message'] ?? '';

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $user = $database->query(
      query: " select * from users where email = :email and password = :password",
      params: compact('email', 'password'),
    )->fetch();

    if($user) {
      $_SESSION['auth'] = $user;

      $_SESSION['message'] = "Seja bem-vindo" . $user['name'] . "!";
      
      header('Location: /');

      exit();
    }
  }

  view('login', compact('message'));