<?php
/* 'The name field is required.' => 'O campo nome é obrigatório.',
        'The contact field is required.' => 'O campo contato é obrigatório',
        'The email field is required.' => 'O campo e-mail é obrigatório.',
        'The email field must be a valid email address.' => 'O campo de e-mail deve ser um endereço de e-mail válido.',
        'The contact field must not be greater than 9 characters.' => 'O campo de contato não deve ter mais de 9 caracteres.',
        'The contact field must be at least 9 characters.' => 'O campo de contato deve ter pelo menos 9 caracteres.' */
return [
    'required' => 'O campo :attribute é obrigatório.',
    'email' => 'O campo :attribute deve ser um endereço de e-mail válido.',
    'unique' => 'O :attribute já está em uso.',
    'min' => [
        'string' => 'O campo :attribute deve ter pelo menos :min caracteres.',
    ],
    'max' => [
        'string' => 'O campo :attribute deve ter pelo menos :max caracteres.',
    ],
    'attributes' => [
        'name' => 'nome',
        'email' => 'e-mail',
        'contact' => 'contato'
    ],
];