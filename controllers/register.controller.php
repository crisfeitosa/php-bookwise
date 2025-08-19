<?php

  require 'Validation.php';

  if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $validation = Validation::validate([
      'name' => ['required'],
      'email' => ['required', 'email', 'confirmed'],
      //'password' => ['required', 'min:8', 'max:30', 'strong']
    ], $_POST);

    if($validation->notValid()) {
      $_SESSION['validations'] = $validation->validations;
      header('location: /register');

      exit();
    }

    $validations = [];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $email_confirmation = $_POST['email_confirmation'];
    $password = $_POST['password'];

    if(strlen($name) == 0) {
      $validations[] = 'O nome é obrigatório.';
    }

    if(strlen($email) == 0) {
      $validations[] = 'O email é obrigatório.';
    } 

    if(! filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $validations[] = 'O email é inválido.';
    }

    if($email != $email_confirmation) {
      $validations[] = 'O email de confirmação está diferente.';
    }

    if(strlen($password) == 0) {
      $validations[] = 'A senha é obrigatória.';
    }

    if(strlen($password) < 8 || strlen($password) > 30) {
      $validations[] = 'A senha deve ter entre 8 e 30 caracteres.';
    }

    if(! str_contains($password, '*')) {
      $validations[] = 'A senha precisa ter pelo menos um * nela.';
    }

    if(sizeof($validations) > 0) {
      $_SESSION['validations'] = $validations;
      header('location: /login');

      exit();
    }

    $database->query(
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