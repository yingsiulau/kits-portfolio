<?php

declare(strict_types=1);
defined('TYPO3') or die();

// Adds the content element to the "Type" dropdown
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem(
    'tt_content',
    'CType',
    [
        // title
        'label' => 'Custom Text Media',
        // plugin signature: extkey_identifier
        'value' => 'myextension_newcontentelement',
        // icon identifier
        'icon' => 'content-text',
        // group
        'group' => 'default',
        // description
        'description' => 'Custom Text Media Description',
    ],
    'textmedia',
    'after',
);

// Adds the content element icon to TCA typeicon_classes
$GLOBALS['TCA']['tt_content']['ctrl']['typeicon_classes']['myextension_newcontentelement'] = 'content-text';

// Define custom fields for the content element
$GLOBALS['TCA']['tt_content']['columns']['my_custom_hashtags'] = [
    'exclude' => 1,
    'label' => 'Custom Hashtags',
    'config' => [
        'type' => 'text',
        'cols' => 40,
        'rows' => 5,
    ],
];

$GLOBALS['TCA']['tt_content']['columns']['my_custom_header'] = [
    'exclude' => 1,
    'label' => 'Custom Header',
    'config' => [
        'type' => 'text',
        'cols' => 40,
        'rows' => 5,
    ],
];

$GLOBALS['TCA']['tt_content']['columns']['my_custom_text'] = [
    'exclude' => 1,
    'label' => 'Custom Text',
    'config' => [
        'type' => 'text',
        'cols' => 40,
        'rows' => 5,
    ],
];

$GLOBALS['TCA']['tt_content']['columns']['my_custom_media'] = [
    'exclude' => 1,
    'label' => 'YouTube URL',
    'config' => [
        'type' => 'input',
        'renderType' => 'inputLink',
        'eval' => 'trim',
        'placeholder' => 'Enter YouTube URL',
    ],
];

$GLOBALS['TCA']['tt_content']['columns']['aspect_ratio'] = [
    'exclude' => 1,
    'label' => 'Aspect Ratio',
    'config' => [
        'type' => 'select',
        'renderType' => 'selectSingle', // This is likely the missing line
        'items' => [
            ['4:3 (Default)', ''],
            ['16:9', '16-9'],
        ],
        'size' => 1,
        'maxitems' => 1,
        'default' => ''
    ]
];

$GLOBALS['TCA']['tt_content']['columns']['my_custom_link'] = [
    'exclude' => 1,
    'label' => 'Page URL',
    'config' => [
        'type' => 'input',
        'renderType' => 'inputLink',
        'eval' => 'trim',
        'placeholder' => 'Enter Page URL',
    ],
];

$GLOBALS['TCA']['tt_content']['columns']['my_custom_image'] = [
    'exclude' => 1,
    'label' => 'Custom Image',
    'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
        'my_custom_image',
        [
            'appearance' => [
                'createNewRelationLinkTitle' => 'Add Image',
            ],
            'minitems' => 0,
            'maxitems' => 1,
        ],
        $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
    ),
];


$GLOBALS['TCA']['tt_content']['columns']['my_custom_imagename'] = [
    'exclude' => 1,
    'label' => 'Custom Image Name',
    'config' => [
        'type' => 'input',
        'eval' => 'trim',
        'readOnly' => true,
    ],
];




$GLOBALS['TCA']['tt_content']['types']['myextension_newcontentelement'] = [
    'showitem' => '
        --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general,
        --palette--;;general,
        my_custom_link;LLL:EXT:myextension/Resources/Private/Language/locallang_db.xlf:my_custom_link,
        my_custom_image;LLL:EXT:myextension/Resources/Private/Language/locallang_db.xlf:my_custom_image,
        my_custom_media;LLL:EXT:myextension/Resources/Private/Language/locallang_db.xlf:my_custom_media,
        aspect_ratio;LLL:EXT:myextension/Resources/Private/Language/locallang_db.xlf:aspect_ratio,
        my_custom_header;LLL:EXT:myextension/Resources/Private/Language/locallang_db.xlf:my_custom_header,
        my_custom_text;LLL:EXT:myextension/Resources/Private/Language/locallang_db.xlf:my_custom_text,
        my_custom_hashtags;LLL:EXT:myextension/Resources/Private/Language/locallang_db.xlf:my_custom_hashtags,
        --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access,
        --palette--;;hidden,
        --palette--;;access,
    ',
    'previewRenderer' => \Playground\KitjanPortfolio\Data\PreviewRenderer::class,
    'columnsOverrides' => [
        'bodytext' => [
            'config' => [
                'enableRichtext' => true,
                'richtextConfiguration' => 'default',
            ],
        ],
    ],
];



// Configure the 2-column container with header
\TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\B13\Container\Tca\Registry::class)->configureContainer(
    new \B13\Container\Tca\ContainerConfiguration(
        'b13-2cols-with-header-container', // CType
        '2 Column Container With Header',  // label
        'Some Description of the Container', // description
        [
            // First row: header spanning across both columns
            [
                ['name' => 'header', 'colPos' => 200, 'colspan' => 3, 'allowed' => ['CType' => 'header, textmedia, my_custom_textmedia']]
            ],
            // Second row: two columns (left and right)
            [
                ['name' => 'left side', 'colPos' => 201, 'allowed' => ['CType' => 'header, textmedia, my_custom_textmedia']],
                ['name' => 'center side', 'colPos' => 203, 'allowed' => ['CType' => 'header, textmedia, my_custom_textmedia']],
                ['name' => 'right side', 'colPos' => 202, 'allowed' => ['CType' => 'header, textmedia, my_custom_textmedia']]
            ]
        ] // grid configuration
    )
);


// Detail
\TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\B13\Container\Tca\Registry::class)->configureContainer(
    new \B13\Container\Tca\ContainerConfiguration(
        'b13-detail', // CType
        'Detail',  // label
        'Some Description of the Container', // description
        [
            // First row: header spanning across both columns
            [
                ['name' => 'header', 'colPos' => 204, 'colspan' => 2, 'allowed' => ['CType' => 'header, textmedia, my_custom_textmedia']],
                ['name' => 'description', 'colPos' => 205, 'colspan' => 1, 'allowed' => ['CType' => 'header, textmedia, my_custom_textmedia']]
            ],
            [
                ['name' => 'images', 'colPos' => 206, 'allowed' => ['CType' => 'header, textmedia, my_custom_textmedia']],
            ]
        ]
    )
);
