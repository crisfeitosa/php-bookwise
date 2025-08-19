<?php

  class Validation {
    public $validations;

    public static function validate($rules, $data) {
      $validation = new self;

      foreach($rules as $field => $fieldRules) {
        foreach($fieldRules as $rule) {
          $valueField = $data[$field];

          if($rule == 'confirmed') {
            $validation->$rule($field, $valueField, $data["{$field}_confirmation"]);
          } else {
            $validation->$rule($field, $valueField);
          }
        }
      }

      return $validation;
    }

    private function required($field, $value) {
      if(strlen($value) == 0) {
        $this->validations[] = "O $field é obrigatório.";
      }
    }

    private function email($field, $value) {
      if(! filter_var($value, FILTER_VALIDATE_EMAIL)) {
        $this->validations[] = "O $field é inválido.";
      }
    }

    private function confirmed($field, $value, $valueConfirmed) {
      if ($value != $valueConfirmed) {
        $this->validations[] = "O $field de confirmação está diferente.";
      }
    }

    public function notValid() {
      return sizeof($this->validations) > 0;
    }
  }