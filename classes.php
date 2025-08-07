<?php

require 'functions.php';

class Phone {
  public $size;
  public $color;

  public function call() {
    echo 'estou ligando';

    echo '<br><br>';
  }
}

$phone1 = new Phone();
$phone1->color = 'black';
$phone1->size = 'big';
$phone1->call();

$phone2 = new Phone();
$phone2->color = 'white';
$phone2->size = 'small';

dd($phone1, $phone2);