<?php
  
  $book = (new DB)->book($_REQUEST['id']);

  view('book', compact('book'));
