<?php

  $message = $_REQUEST['message'] ?? '';

  view('login', compact('message'));