<?php

return [
    'admin' => [
        'type' => 1,
        'children' => [
            'view-post',
            'create-post',
            'edit-post',
            'delete-post',
        ],
    ],
    'moderator' => [
        'type' => 1,
        'children' => [
            'create-post',
            'edit-post',
            'view-post',
        ],
    ],
    'operador' => [
        'type' => 1,
        'children' => [
            'view-post',
        ],
    ],
    'view-post' => [
        'type' => 2,
    ],
    'create-post' => [
        'type' => 2,
    ],
    'edit-post' => [
        'type' => 2,
    ],
    'delete-post' => [
        'type' => 2,
    ],
];
