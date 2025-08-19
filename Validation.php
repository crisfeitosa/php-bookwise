<?php

  class Validation {
    public $validations;

    public static function validate($rules, $data) {
      $validation = new self;

      foreach($rules as $field => $fieldRules) {
        foreach($fieldRules as $rule) {
          $validation->$rule($field);
        }
      }
    }

    private function required($field) {
      if(strlen($field) == 0) {
        $this->validations[] = "O campo {$field} é obrigatório.";
      }
    }
  }