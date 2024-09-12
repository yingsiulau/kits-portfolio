<?php

defined('TYPO3') || die('Access denied.');

call_user_func(static function () {
    // Define additional columns for tt_content
    $additionalColumns = [
        'tx_container_parent' => [
            'label' => 'LLL:EXT:container/Resources/Private/Language/locallang.xlf:container',
            'config' => [
                'type' => 'select',
                'foreign_table' => 'tt_content',
                'foreign_table_where' => ' AND 1=2',
                'itemsProcFunc' => \B13\Container\Tca\ItemProcFunc::class . '->txContainerParent',
                'renderType' => 'selectSingle',
            ],
        ],
    ];

    // Add the custom columns to tt_content
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('tt_content', $additionalColumns);

    // Add the field to the general palette
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addFieldsToPalette('tt_content', 'general', 'tx_container_parent');

    // Update CType configuration
    $GLOBALS['TCA']['tt_content']['columns']['CType']['config']['itemGroups']['container'] = 'LLL:EXT:container/Resources/Private/Language/locallang.xlf:container';

    // Update colPos configuration
    $GLOBALS['TCA']['tt_content']['columns']['colPos']['config']['itemsProcFunc'] = \B13\Container\Tca\ItemProcFunc::class . '->colPos';

    // Update ctrl settings
    $GLOBALS['TCA']['tt_content']['ctrl']['useColumnsForDefaultValues'] .= ',tx_container_parent';

    // Extend shadowColumnsForNewPlaceholders if present (for TYPO3 < v11)
    if (isset($GLOBALS['TCA']['tt_content']['ctrl']['shadowColumnsForNewPlaceholders'])) {
        $GLOBALS['TCA']['tt_content']['ctrl']['shadowColumnsForNewPlaceholders'] .= ',tx_container_parent';
    }
});
