<?php

  require "models/Book.php";

  require "models/User.php";

  require "models/Review.php";

  session_start();

  require "Flash.php";

  require "functions.php";

  $config = require 'config.php';
  
  require "Database.php";
  
  require 'Validation.php';

  require "routes.php";
