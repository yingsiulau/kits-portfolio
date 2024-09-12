<?php

/**
 * Extension Manager/Repository config file for ext "kitjan_portfolio".
 */
$EM_CONF[$_EXTKEY] = [
    'title' => 'Kitjan Portfolio',
    'description' => '',
    'category' => 'templates',
    'constraints' => [
        'depends' => [
            'typo3' => '12.4.0-12.4.99',
            'fluid_styled_content' => '12.4.0-12.4.99',
            'rte_ckeditor' => '12.4.0-12.4.99',
        ],
        'conflicts' => [
        ],
    ],
    'autoload' => [
        'psr-4' => [
            'Playground\\KitjanPortfolio\\' => 'Classes',
        ],
    ],
    'state' => 'stable',
    'uploadfolder' => 0,
    'createDirs' => '',
    'clearCacheOnLoad' => 1,
    'author' => 'Yingsiu Lau',
    'author_email' => 'yingsiulau@gmail.com',
    'author_company' => 'Playground',
    'version' => '1.0.0',
];
