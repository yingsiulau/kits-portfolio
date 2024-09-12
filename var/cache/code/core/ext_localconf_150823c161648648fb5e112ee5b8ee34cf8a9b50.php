<?php
/**
 * Compiled ext_localconf.php cache file
 */

/**
 * Extension: core
 * File: /var/www/html/vendor/typo3/cms-core/ext_localconf.php
 */

namespace {




use TYPO3\CMS\Core\Authentication\AuthenticationService;
use TYPO3\CMS\Core\Controller\FileDumpController;
use TYPO3\CMS\Core\Controller\RequireJsController;
use TYPO3\CMS\Core\Hooks\BackendUserGroupIntegrityCheck;
use TYPO3\CMS\Core\Hooks\BackendUserPasswordCheck;
use TYPO3\CMS\Core\Hooks\CreateSiteConfiguration;
use TYPO3\CMS\Core\Hooks\DestroySessionHook;
use TYPO3\CMS\Core\Hooks\PagesTsConfigGuard;
use TYPO3\CMS\Core\MetaTag\EdgeMetaTagManager;
use TYPO3\CMS\Core\MetaTag\Html5MetaTagManager;
use TYPO3\CMS\Core\MetaTag\MetaTagManagerRegistry;
use TYPO3\CMS\Core\Resource\Index\ExtractorRegistry;
use TYPO3\CMS\Core\Resource\OnlineMedia\Metadata\Extractor;
use TYPO3\CMS\Core\Resource\Rendering\AudioTagRenderer;
use TYPO3\CMS\Core\Resource\Rendering\RendererRegistry;
use TYPO3\CMS\Core\Resource\Rendering\VideoTagRenderer;
use TYPO3\CMS\Core\Resource\Rendering\VimeoRenderer;
use TYPO3\CMS\Core\Resource\Rendering\YouTubeRenderer;
use TYPO3\CMS\Core\Resource\Security\FileMetadataPermissionsAspect;
use TYPO3\CMS\Core\Resource\Security\FilePermissionAspect;
use TYPO3\CMS\Core\Resource\Security\SvgHookHandler;
use TYPO3\CMS\Core\Resource\TextExtraction\PlainTextExtractor;
use TYPO3\CMS\Core\Resource\TextExtraction\TextExtractorRegistry;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;

defined('TYPO3') or die();

$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS'][GeneralUtility::class]['moveUploadedFile'][] = SvgHookHandler::class . '->processMoveUploadedFile';
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_tcemain.php']['processDatamapClass'][] = FileMetadataPermissionsAspect::class;
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_tcemain.php']['processDatamapClass'][] = BackendUserGroupIntegrityCheck::class;
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_tcemain.php']['processDatamapClass'][] = BackendUserPasswordCheck::class;
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_tcemain.php']['checkModifyAccessList'][] = FileMetadataPermissionsAspect::class;
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_tcemain.php']['checkModifyAccessList'][] = FilePermissionAspect::class;
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_tcemain.php']['processDatamapClass'][] = FilePermissionAspect::class;
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_tcemain.php']['processDatamapClass'][] = DestroySessionHook::class;
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_tcemain.php']['processDatamapClass'][] = PagesTsConfigGuard::class;
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_tcemain.php']['processDatamapClass'][CreateSiteConfiguration::class] = CreateSiteConfiguration::class;
$GLOBALS['TYPO3_CONF_VARS']['FE']['eID_include']['dumpFile'] = FileDumpController::class . '::dumpAction';
$GLOBALS['TYPO3_CONF_VARS']['FE']['eID_include']['requirejs'] = RequireJsController::class . '::retrieveConfiguration';

$rendererRegistry = GeneralUtility::makeInstance(RendererRegistry::class);
$rendererRegistry->registerRendererClass(AudioTagRenderer::class);
$rendererRegistry->registerRendererClass(VideoTagRenderer::class);
$rendererRegistry->registerRendererClass(YouTubeRenderer::class);
$rendererRegistry->registerRendererClass(VimeoRenderer::class);
unset($rendererRegistry);

$textExtractorRegistry = GeneralUtility::makeInstance(TextExtractorRegistry::class);
$textExtractorRegistry->registerTextExtractor(PlainTextExtractor::class);
unset($textExtractorRegistry);

$extractorRegistry = GeneralUtility::makeInstance(ExtractorRegistry::class);
$extractorRegistry->registerExtractionService(Extractor::class);
unset($extractorRegistry);

// Register base authentication service
ExtensionManagementUtility::addService(
    'core',
    'auth',
    AuthenticationService::class,
    [
        'title' => 'User authentication',
        'description' => 'Authentication with username/password.',
        'subtype' => 'getUserBE,getUserFE,authUserBE,authUserFE,processLoginDataBE,processLoginDataFE',
        'available' => true,
        'priority' => 50,
        'quality' => 50,
        'os' => '',
        'exec' => '',
        'className' => TYPO3\CMS\Core\Authentication\AuthenticationService::class,
    ]
);

$metaTagManagerRegistry = GeneralUtility::makeInstance(MetaTagManagerRegistry::class);
$metaTagManagerRegistry->registerManager(
    'html5',
    Html5MetaTagManager::class
);
$metaTagManagerRegistry->registerManager(
    'edge',
    EdgeMetaTagManager::class
);
unset($metaTagManagerRegistry);

// Add module configuration
ExtensionManagementUtility::addTypoScriptSetup(
    'config.pageTitleProviders.record.provider = TYPO3\CMS\Core\PageTitle\RecordPageTitleProvider'
);

// Register preset for sys_news
if (empty($GLOBALS['TYPO3_CONF_VARS']['RTE']['Presets']['sys_news'])) {
    $GLOBALS['TYPO3_CONF_VARS']['RTE']['Presets']['sys_news'] = 'EXT:core/Configuration/RTE/SysNews.yaml';
}
}


/**
 * Extension: backend
 * File: /var/www/html/vendor/typo3/cms-backend/ext_localconf.php
 */

namespace {




use TYPO3\CMS\Backend\Backend\Avatar\DefaultAvatarProvider;
use TYPO3\CMS\Backend\LoginProvider\UsernamePasswordLoginProvider;
use TYPO3\CMS\Backend\View\BackendLayout\PageTsBackendLayoutDataProvider;

defined('TYPO3') or die();

$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['backend']['loginProviders'][1433416747] = [
    'provider' => UsernamePasswordLoginProvider::class,
    'sorting' => 50,
    'iconIdentifier' => 'actions-key',
    'label' => 'LLL:EXT:backend/Resources/Private/Language/locallang.xlf:login.link',
];

$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['backend']['avatarProviders']['defaultAvatarProvider'] = [
    'provider' => DefaultAvatarProvider::class,
];

// Register search key shortcuts
$GLOBALS['TYPO3_CONF_VARS']['SYS']['livesearch']['page'] = 'pages';

// Register BackendLayoutDataProvider for PageTs
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['BackendLayoutDataProvider']['pagets'] = PageTsBackendLayoutDataProvider::class;
}


/**
 * Extension: frontend
 * File: /var/www/html/vendor/typo3/cms-frontend/ext_localconf.php
 */

namespace {




use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Frontend\Controller\ShowImageController;
use TYPO3\CMS\Frontend\Hooks\TreelistCacheUpdateHooks;

defined('TYPO3') or die();

// Register eID provider for showpic
$GLOBALS['TYPO3_CONF_VARS']['FE']['eID_include']['tx_cms_showpic'] = ShowImageController::class . '::processRequest';

ExtensionManagementUtility::addUserTSConfig('
  options.saveDocView = 1
  options.saveDocNew = 1
  options.saveDocNew.pages = 0
  options.saveDocNew.sys_file = 0
  options.saveDocNew.sys_file_metadata = 0
  options.disableDelete.sys_file = 1
');

ExtensionManagementUtility::addTypoScriptSetup(
    '
# Content selection
styles.content.get = CONTENT
styles.content.get {
    table = tt_content
    select {
        orderBy = sorting
        where = {#colPos}=0
    }
}


# Content element rendering
tt_content = CASE
tt_content {
    key {
        field = CType
    }
    default = TEXT
    default {
        field = CType
        htmlSpecialChars = 1
        wrap = <p style="background-color: yellow; padding: 0.5em 1em;"><strong>ERROR:</strong> Content Element with uid "{field:uid}" and type "|" has no rendering definition!</p>
        wrap.insertData = 1
    }
}
    '
);

// Registering hooks for the tree list cache
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_tcemain.php']['processDatamapClass'][] = TreelistCacheUpdateHooks::class;
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_tcemain.php']['processCmdmapClass'][] = TreelistCacheUpdateHooks::class;
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_tcemain.php']['moveRecordClass'][] = TreelistCacheUpdateHooks::class;

// Register search key shortcuts
$GLOBALS['TYPO3_CONF_VARS']['SYS']['livesearch']['content'] = 'tt_content';
}


/**
 * Extension: dashboard
 * File: /var/www/html/vendor/typo3/cms-dashboard/ext_localconf.php
 */

namespace {




use TYPO3\CMS\Core\Cache\Backend\FileBackend;
use TYPO3\CMS\Core\Cache\Frontend\VariableFrontend;
use TYPO3\CMS\Dashboard\Persistence\DashboardCreationEnricher;

defined('TYPO3') or die();

if (!is_array($GLOBALS['TYPO3_CONF_VARS']['SYS']['caching']['cacheConfigurations']['dashboard_rss'] ?? null)) {
    $GLOBALS['TYPO3_CONF_VARS']['SYS']['caching']['cacheConfigurations']['dashboard_rss'] = [
        'frontend' => VariableFrontend::class,
        'backend' => FileBackend::class,
        'options' => [
            'defaultLifetime' => 900,
        ],
    ];
}

// Fill the "owner" field of a dashboard with the user who created it
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_tcemain.php']['processDatamapClass'][] = DashboardCreationEnricher::class;
}


/**
 * Extension: fluid_styled_content
 * File: /var/www/html/vendor/typo3/cms-fluid-styled-content/ext_localconf.php
 */

namespace {




defined('TYPO3') or die();

// Define TypoScript as content rendering template
$GLOBALS['TYPO3_CONF_VARS']['FE']['contentRenderingTemplates'][] = 'fluidstyledcontent/Configuration/TypoScript/';
}


/**
 * Extension: form
 * File: /var/www/html/vendor/typo3/cms-form/ext_localconf.php
 */

namespace {




use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Extbase\Utility\ExtensionUtility;
use TYPO3\CMS\Form\Controller\FormFrontendController;
use TYPO3\CMS\Form\Hooks\FormElementHooks;
use TYPO3\CMS\Form\Hooks\ImportExportHook;
use TYPO3\CMS\Form\Mvc\Property\PropertyMappingConfiguration;

defined('TYPO3') or die();

call_user_func(static function () {
    if (ExtensionManagementUtility::isLoaded('impexp')) {
        $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['ext/impexp/class.tx_impexp.php']['before_addSysFileRecord'][1530637161]
            = ImportExportHook::class . '->beforeAddSysFileRecordOnImport';
    }

    // Add module configuration
    ExtensionManagementUtility::addTypoScriptSetup(
        'module.tx_form {
    settings {
        yamlConfigurations {
            10 = EXT:form/Configuration/Yaml/FormSetup.yaml
        }
    }
}'
    );

    $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['ext/form']['afterSubmit'][1489772699]
        = FormElementHooks::class;

    $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['ext/form']['beforeRendering'][1489772699]
        = FormElementHooks::class;

    // FE file upload processing
    $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['ext/form']['afterBuildingFinished'][1489772699]
        = PropertyMappingConfiguration::class;
    $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['ext/form']['afterFormStateInitialized'][1613296803]
        = PropertyMappingConfiguration::class;

    // Register "formvh:" namespace
    $GLOBALS['TYPO3_CONF_VARS']['SYS']['fluid']['namespaces']['formvh'][] = 'TYPO3\\CMS\\Form\\ViewHelpers';

    // Register FE plugin
    ExtensionUtility::configurePlugin(
        'Form',
        'Formframework',
        [FormFrontendController::class => 'render, perform'],
        [FormFrontendController::class => 'perform'],
        ExtensionUtility::PLUGIN_TYPE_CONTENT_ELEMENT
    );
});
}


/**
 * Extension: seo
 * File: /var/www/html/vendor/typo3/cms-seo/ext_localconf.php
 */

namespace {




use TYPO3\CMS\Core\MetaTag\MetaTagManagerRegistry;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Seo\Canonical\CanonicalGenerator;
use TYPO3\CMS\Seo\MetaTag\MetaTagGenerator;
use TYPO3\CMS\Seo\MetaTag\OpenGraphMetaTagManager;
use TYPO3\CMS\Seo\MetaTag\TwitterCardMetaTagManager;

defined('TYPO3') or die();

$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['TYPO3\CMS\Frontend\Page\PageGenerator']['generateMetaTags']['metatag'] =
    MetaTagGenerator::class . '->generate';
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['TYPO3\CMS\Frontend\Page\PageGenerator']['generateMetaTags']['canonical'] =
    CanonicalGenerator::class . '->generate';

$metaTagManagerRegistry = GeneralUtility::makeInstance(MetaTagManagerRegistry::class);
$metaTagManagerRegistry->registerManager(
    'opengraph',
    OpenGraphMetaTagManager::class
);
$metaTagManagerRegistry->registerManager(
    'twitter',
    TwitterCardMetaTagManager::class
);
unset($metaTagManagerRegistry);

// Add module configuration
ExtensionManagementUtility::addTypoScriptSetup(trim('
    config.pageTitleProviders {
        seo {
            provider = TYPO3\CMS\Seo\PageTitle\SeoTitlePageTitleProvider
            before = record
        }
    }
'));
}


/**
 * Extension: rte_ckeditor
 * File: /var/www/html/vendor/typo3/cms-rte-ckeditor/ext_localconf.php
 */

namespace {




use TYPO3\CMS\RteCKEditor\Form\Resolver\RichTextNodeResolver;

defined('TYPO3') or die();

// Register FormEngine node type resolver hook to render RTE in FormEngine if enabled
$GLOBALS['TYPO3_CONF_VARS']['SYS']['formEngine']['nodeResolver'][1480314091] = [
    'nodeName' => 'text',
    'priority' => 50,
    'class' => RichTextNodeResolver::class,
];

// Register the presets
if (empty($GLOBALS['TYPO3_CONF_VARS']['RTE']['Presets']['default'])) {
    $GLOBALS['TYPO3_CONF_VARS']['RTE']['Presets']['default'] = 'EXT:rte_ckeditor/Configuration/RTE/Default.yaml';
}
if (empty($GLOBALS['TYPO3_CONF_VARS']['RTE']['Presets']['minimal'])) {
    $GLOBALS['TYPO3_CONF_VARS']['RTE']['Presets']['minimal'] = 'EXT:rte_ckeditor/Configuration/RTE/Minimal.yaml';
}
if (empty($GLOBALS['TYPO3_CONF_VARS']['RTE']['Presets']['full'])) {
    $GLOBALS['TYPO3_CONF_VARS']['RTE']['Presets']['full'] = 'EXT:rte_ckeditor/Configuration/RTE/Full.yaml';
}
}


/**
 * Extension: extensionmanager
 * File: /var/www/html/vendor/typo3/cms-extensionmanager/ext_localconf.php
 */

namespace {




use TYPO3\CMS\Core\Configuration\ExtensionConfiguration;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extensionmanager\Task\UpdateExtensionListTask;

defined('TYPO3') or die();

// Register extension list update task
if (!(bool)GeneralUtility::makeInstance(
    ExtensionConfiguration::class
)->get('extensionmanager', 'offlineMode')) {
    $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['scheduler']['tasks'][UpdateExtensionListTask::class] = [
        'extension' => 'extensionmanager',
        'title' => 'LLL:EXT:extensionmanager/Resources/Private/Language/locallang.xlf:task.updateExtensionListTask.name',
        'description' => 'LLL:EXT:extensionmanager/Resources/Private/Language/locallang.xlf:task.updateExtensionListTask.description',
        'additionalFields' => '',
    ];
}
}


/**
 * Extension: felogin
 * File: /var/www/html/vendor/typo3/cms-felogin/ext_localconf.php
 */

namespace {




use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Extbase\Utility\ExtensionUtility;
use TYPO3\CMS\FrontendLogin\Controller\LoginController;
use TYPO3\CMS\FrontendLogin\Controller\PasswordRecoveryController;

defined('TYPO3') or die();

// Add default TypoScript
ExtensionManagementUtility::addTypoScriptConstants(
    "@import 'EXT:felogin/Configuration/TypoScript/constants.typoscript'"
);
ExtensionManagementUtility::addTypoScriptSetup(
    "@import 'EXT:felogin/Configuration/TypoScript/setup.typoscript'"
);

ExtensionUtility::configurePlugin(
    'Felogin',
    'Login',
    [
        LoginController::class => 'login, overview',
        PasswordRecoveryController::class => 'recovery,showChangePassword,changePassword',
    ],
    [
        LoginController::class => 'login, overview',
        PasswordRecoveryController::class => 'recovery,showChangePassword,changePassword',
    ],
    ExtensionUtility::PLUGIN_TYPE_CONTENT_ELEMENT
);
}


/**
 * Extension: reactions
 * File: /var/www/html/vendor/typo3/cms-reactions/ext_localconf.php
 */

namespace {




use TYPO3\CMS\Reactions\Form\Element\FieldMapElement;

defined('TYPO3') or die();

$GLOBALS['TYPO3_CONF_VARS']['SYS']['formEngine']['nodeRegistry'][1660911089] = [
    'nodeName' => 'fieldMap',
    'priority' => 40,
    'class' => FieldMapElement::class,
];
}


/**
 * Extension: sys_note
 * File: /var/www/html/vendor/typo3/cms-sys-note/ext_localconf.php
 */

namespace {




use TYPO3\CMS\SysNote\Persistence\NoteCreationEnricher;

defined('TYPO3') or die();

// Fill the "owner" field of a dashboard with the user who created it
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_tcemain.php']['processDatamapClass'][] = NoteCreationEnricher::class;
}


/**
 * Extension: t3editor
 * File: /var/www/html/vendor/typo3/cms-t3editor/ext_localconf.php
 */

namespace {




use TYPO3\CMS\T3editor\Form\Element\T3editorElement;

defined('TYPO3') or die();

// Register backend FormEngine node
$GLOBALS['TYPO3_CONF_VARS']['SYS']['formEngine']['nodeRegistry'][1433089350] = [
    'nodeName' => 't3editor',
    'priority' => 40,
    'class' => T3editorElement::class,
];
}


/**
 * Extension: tstemplate
 * File: /var/www/html/vendor/typo3/cms-tstemplate/ext_localconf.php
 */

namespace {




use TYPO3\CMS\Tstemplate\Hooks\DataHandlerClearCachePostProcHook;

defined('TYPO3') or die();

$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_tcemain.php']['clearCachePostProc']['tstemplate'] = DataHandlerClearCachePostProcHook::class . '->clearPageCacheIfNecessary';
}


/**
 * Extension: webhooks
 * File: /var/www/html/vendor/typo3/cms-webhooks/ext_localconf.php
 */

namespace {




defined('TYPO3') or die();

$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_tcemain.php']['processDatamapClass'][] = \TYPO3\CMS\Webhooks\Listener\PageModificationListener::class;
}


/**
 * Extension: container
 * File: /var/www/html/vendor/b13/container/ext_localconf.php
 */

namespace {


defined('TYPO3') || die('Access denied.');

call_user_func(static function () {
    $typo3Version = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Information\Typo3Version::class);

    if ($typo3Version->getMajorVersion() === 10) {
        // register default icons
        $iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(
            \TYPO3\CMS\Core\Imaging\IconRegistry::class
        );
        $iconsToRegister = [
            'container-1col',
            'container-2col',
            'container-2col-left',
            'container-2col-right',
            'container-3col',
            'container-4col',
        ];
        foreach ($iconsToRegister as $icon) {
            $iconRegistry->registerIcon(
                $icon,
                \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
                [
                    'source' => 'EXT:container/Resources/Public/Icons/' . $icon . '.svg',
                ]
            );
        }
        $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['GLOBAL']['extTablesInclusion-PostProcessing']['tx_container'] =
            \B13\Container\Hooks\TableConfigurationPostProcessing::class;
    }

    if ($typo3Version->getMajorVersion() < 12) {
        // remove container colPos from "unused" page-elements (v12: IsContentUsedOnPageLayoutEvent)
        $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['cms/layout/class.tx_cms_layout.php']['record_is_used']['tx_container'] =
            \B13\Container\Hooks\UsedRecords::class . '->addContainerChildren';
        // add tx_container_parent parameter to wizard items (v12: ModifyNewContentElementWizardItemsEvent)
        $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['cms']['db_new_content_el']['wizardItemsHook']['tx_container'] =
            \B13\Container\Hooks\WizardItems::class;
        // LocalizationController Xclass (v12: AfterRecordSummaryForLocalizationEvent)
        $GLOBALS['TYPO3_CONF_VARS']['SYS']['Objects'][\TYPO3\CMS\Backend\Controller\Page\LocalizationController::class] = [
            'className' => \B13\Container\Xclasses\LocalizationController::class,
        ];
        if (\TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Configuration\Features::class)->isFeatureEnabled('fluidBasedPageModule') === false) {
            // draw container grid
            $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['cms/layout/class.tx_cms_layout.php']['tt_content_drawItem'][] =
                \B13\Container\Hooks\DrawItem::class;
            // else, if enabled we register container previewRenderer in registry foreach container CType
        }
    }

    $commandMapHooks = [
        'tx_container-post-process' => \B13\Container\Hooks\Datahandler\CommandMapPostProcessingHook::class,
        'tx_container-before-start' => \B13\Container\Hooks\Datahandler\CommandMapBeforeStartHook::class,
        'tx_container-delete' => \B13\Container\Hooks\Datahandler\DeleteHook::class,
        'tx_container-after-finish' => \B13\Container\Hooks\Datahandler\CommandMapAfterFinishHook::class,
    ];

    $datamapHooks = [
        'tx_container-before-start' => \B13\Container\Hooks\Datahandler\DatamapBeforeStartHook::class,
        'tx_container-pre-process-field-array' => \B13\Container\Hooks\Datahandler\DatamapPreProcessFieldArrayHook::class,
    ];

    // EXT:content_defender
    $packageManager = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Package\PackageManager::class);
    if ($packageManager->isPackageActive('content_defender')) {
        $contentDefenderVersion = $packageManager->getPackage('content_defender')->getPackageMetaData()->getVersion();
        if (version_compare($contentDefenderVersion, '3.1.0', '>=') || $contentDefenderVersion === 'dev-main') {
            $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['content_defender']['ColumnConfigurationManipulationHook']['tx_container'] =
                \B13\Container\ContentDefender\Hooks\ColumnConfigurationManipulationHook::class;
            $GLOBALS['TYPO3_CONF_VARS']['SYS']['Objects'][\IchHabRecht\ContentDefender\Hooks\DatamapDataHandlerHook::class] = [
                'className' => \B13\Container\ContentDefender\Xclasses\DatamapHook::class,
            ];
            $GLOBALS['TYPO3_CONF_VARS']['SYS']['Objects'][\IchHabRecht\ContentDefender\Hooks\CmdmapDataHandlerHook::class] = [
                'className' => \B13\Container\ContentDefender\Xclasses\CommandMapHook::class,
            ];
        }
    }

    // set our hooks at the beginning of Datamap Hooks
    $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_tcemain.php']['processCmdmapClass'] = array_merge(
        $commandMapHooks,
        $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_tcemain.php']['processCmdmapClass'] ?? []
    );
    $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_tcemain.php']['processDatamapClass'] = array_merge(
        $datamapHooks,
        $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_tcemain.php']['processDatamapClass']
    );

    $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['ext/install']['update'][B13\Container\Updates\ContainerMigrateSorting::IDENTIFIER]
        = B13\Container\Updates\ContainerMigrateSorting::class;
    $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['ext/install']['update'][B13\Container\Updates\ContainerDeleteChildrenWithWrongPid::IDENTIFIER]
        = B13\Container\Updates\ContainerDeleteChildrenWithWrongPid::class;
});
}


/**
 * Extension: kitjan_portfolio
 * File: /var/www/html/vendor/playground/kitjan-portfolio/ext_localconf.php
 */

namespace {

defined('TYPO3') or die('Access denied.');
/***************
 * Add default RTE configuration
 */
$GLOBALS['TYPO3_CONF_VARS']['RTE']['Presets']['kitjan_portfolio'] = 'EXT:kitjan_portfolio/Configuration/RTE/Default.yaml';

/***************
 * PageTS
 */
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('<INCLUDE_TYPOSCRIPT: source="FILE:EXT:kitjan_portfolio/Configuration/TsConfig/Page/All.tsconfig">');
}


#