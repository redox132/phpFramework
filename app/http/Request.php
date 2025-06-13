<?php

namespace App\Http;

class Request
{
    public array $data = [];

    public function __construct()
    {
        $this->data = array_merge($_GET, $_POST);
    }

    public function validate(array $rules = []): array
    {
        $errors = [];

        foreach ($rules as $field => $rule) {
            if ($rule === 'required' && empty($this->data[$field])) {
                $errors[$field] = ucfirst($field) . ' is required.';
            }

            if ($rule === 'max') {
                $errors['field'] = ucfirst($field) . 'must not exceed the max length';
            }

            if ($rule === 'min') {
                $errors[$field] = ucfirst($field) . ' must not be less than the min length';
            }
        }

        return $errors;
    }

   
    public function input(string $key)
    {
        return $this->data[$key] ?? null;
    }

    public function all(): array
    {
        return $_POST; // Or parse JSON input if API
    }
}
