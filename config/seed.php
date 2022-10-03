<?php

return [
    'users' => [
        'count_random_users' => 99,
        'super_admin' => [
            'email' => 'super@email.example',
            'password' => 'superpassword'
        ],
        'test_user' => [
            'email' => 'test@email.example',
            'password' => 'testpassword',
        ],
    ],
    'languages' => [
        'count' => 100,
        'chance_to_learn_language' => 1,
    ],
    'sources' => [
        'count_for_user' => [
            'min' => 0,
            'max' => 100,
        ],
    ],
    'dictionaries' => [
        'count_for_user' => [
            'min' => 0,
            'max' => 10,
        ],
    ],
    'rules' => [
        'count_for_user' => [
            'min' => 0,
            'max' => 250,
        ],
    ]
];