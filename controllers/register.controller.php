<?php

  if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $result = $database->query(
      query: "insert into users (name, email, password) values (:name, :email, :password)",
      params: [
        'name' => $_POST['name'],
        'email' => $_POST['email'],
        'password' => $_POST['password']
      ]
    );
    
    header('location: /login?message=Usuário cadastrado com sucesso!');

    exit();
  };