<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'Organization list',
    'description' => 'W4 list of organizations.',
    'category' => 'plugin',
    'author' => '',
    'author_email' => '',
    'state' => 'stable',
    'clearCacheOnLoad' => 0,
    'version' => '1.0.2',
    'constraints' => [
        'depends' => [
            'typo3' => '11.5.0-11.5.99',
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
    'autoload' => [
        'psr-4' => [
            'W4Services\\W4OrganizationList\\' => 'Classes'
        ]
    ]
];
