<?php
class partial_Media_Type_e7a88cfecc08d59b extends \TYPO3Fluid\Fluid\Core\Compiler\AbstractCompiledTemplate {
    public function getLayoutName(\TYPO3Fluid\Fluid\Core\Rendering\RenderingContextInterface $renderingContext) {
        return (string)'';
    }
    public function hasLayout() {
        return false;
    }
    public function addCompiledNamespaces(\TYPO3Fluid\Fluid\Core\Rendering\RenderingContextInterface $renderingContext) {
        $renderingContext->getViewHelperResolver()->addNamespaces(array (
  'core' => 
  array (
    0 => 'TYPO3\\CMS\\Core\\ViewHelpers',
  ),
  'f' => 
  array (
    0 => 'TYPO3Fluid\\Fluid\\ViewHelpers',
    1 => 'TYPO3\\CMS\\Fluid\\ViewHelpers',
  ),
  'formvh' => 
  array (
    0 => 'TYPO3\\CMS\\Form\\ViewHelpers',
  ),
  'ce' => 
  array (
    0 => 'TYPO3\\CMS\\FluidStyledContent\\ViewHelpers',
  ),
));
    }
    /**
 * Main Render function
 */
public function render(\TYPO3Fluid\Fluid\Core\Rendering\RenderingContextInterface $renderingContext) {
    $output0 = '';

$output0 .= '
';
// Rendering ViewHelper TYPO3Fluid\Fluid\ViewHelpers\SwitchViewHelper
$renderChildrenClosure2 = function() use ($renderingContext) {
$output15 = '';

$output15 .= '
    ';
// Rendering ViewHelper TYPO3Fluid\Fluid\ViewHelpers\CaseViewHelper
$renderChildrenClosure17 = function() use ($renderingContext) {
$output18 = '';

$output18 .= '
        ';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper
$renderChildrenClosure20 = function() use ($renderingContext) {
return NULL;
};

$array21 = [
'file' => $renderingContext->getVariableProvider()->getByPath('file'),
'dimensions' => $renderingContext->getVariableProvider()->getByPath('dimensions'),
'data' => $renderingContext->getVariableProvider()->getByPath('data'),
'settings' => $renderingContext->getVariableProvider()->getByPath('settings'),
];

$arguments19 = [
'section' => NULL,
'delegate' => NULL,
'optional' => false,
'default' => NULL,
'contentAs' => NULL,
'debug' => true,
'partial' => 'Media/Type/Audio',
'arguments' => $array21,
];

$output18 .= TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper::renderStatic($arguments19, $renderChildrenClosure20, $renderingContext);

$output18 .= '
    ';
return $output18;
};

$arguments16 = [
'value' => 3,
];

$output15 .= '';

$output15 .= '
    ';
// Rendering ViewHelper TYPO3Fluid\Fluid\ViewHelpers\CaseViewHelper
$renderChildrenClosure23 = function() use ($renderingContext) {
$output24 = '';

$output24 .= '
        ';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper
$renderChildrenClosure26 = function() use ($renderingContext) {
return NULL;
};

$array27 = [
'file' => $renderingContext->getVariableProvider()->getByPath('file'),
'dimensions' => $renderingContext->getVariableProvider()->getByPath('dimensions'),
'data' => $renderingContext->getVariableProvider()->getByPath('data'),
'settings' => $renderingContext->getVariableProvider()->getByPath('settings'),
];

$arguments25 = [
'section' => NULL,
'delegate' => NULL,
'optional' => false,
'default' => NULL,
'contentAs' => NULL,
'debug' => true,
'partial' => 'Media/Type/Video',
'arguments' => $array27,
];

$output24 .= TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper::renderStatic($arguments25, $renderChildrenClosure26, $renderingContext);

$output24 .= '
    ';
return $output24;
};

$arguments22 = [
'value' => 4,
];

$output15 .= '';

$output15 .= '
    ';
// Rendering ViewHelper TYPO3Fluid\Fluid\ViewHelpers\DefaultCaseViewHelper
$renderChildrenClosure29 = function() use ($renderingContext) {
$output30 = '';

$output30 .= '
        ';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper
$renderChildrenClosure32 = function() use ($renderingContext) {
return NULL;
};

$array33 = [
'file' => $renderingContext->getVariableProvider()->getByPath('file'),
'dimensions' => $renderingContext->getVariableProvider()->getByPath('dimensions'),
'data' => $renderingContext->getVariableProvider()->getByPath('data'),
'settings' => $renderingContext->getVariableProvider()->getByPath('settings'),
];

$arguments31 = [
'section' => NULL,
'delegate' => NULL,
'optional' => false,
'default' => NULL,
'contentAs' => NULL,
'debug' => true,
'partial' => 'Media/Type/Image',
'arguments' => $array33,
];

$output30 .= TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper::renderStatic($arguments31, $renderChildrenClosure32, $renderingContext);

$output30 .= '
    ';
return $output30;
};

$arguments28 = [
];

$output15 .= '';

$output15 .= '
';
return $output15;
};

$arguments1 = [
'expression' => $renderingContext->getVariableProvider()->getByPath('file.type'),
];

$output0 .= call_user_func_array(function($arguments) use ($renderingContext) {
switch ($arguments['expression']) {
case call_user_func(function() use ($renderingContext) {

return 3;
}): return call_user_func(function() use ($renderingContext) {
$output3 = '';

$output3 .= '
        ';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper
$renderChildrenClosure5 = function() use ($renderingContext) {
return NULL;
};

$array6 = [
'file' => $renderingContext->getVariableProvider()->getByPath('file'),
'dimensions' => $renderingContext->getVariableProvider()->getByPath('dimensions'),
'data' => $renderingContext->getVariableProvider()->getByPath('data'),
'settings' => $renderingContext->getVariableProvider()->getByPath('settings'),
];

$arguments4 = [
'section' => NULL,
'delegate' => NULL,
'optional' => false,
'default' => NULL,
'contentAs' => NULL,
'debug' => true,
'partial' => 'Media/Type/Audio',
'arguments' => $array6,
];

$output3 .= TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper::renderStatic($arguments4, $renderChildrenClosure5, $renderingContext);

$output3 .= '
    ';
return $output3;
});
case call_user_func(function() use ($renderingContext) {

return 4;
}): return call_user_func(function() use ($renderingContext) {
$output7 = '';

$output7 .= '
        ';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper
$renderChildrenClosure9 = function() use ($renderingContext) {
return NULL;
};

$array10 = [
'file' => $renderingContext->getVariableProvider()->getByPath('file'),
'dimensions' => $renderingContext->getVariableProvider()->getByPath('dimensions'),
'data' => $renderingContext->getVariableProvider()->getByPath('data'),
'settings' => $renderingContext->getVariableProvider()->getByPath('settings'),
];

$arguments8 = [
'section' => NULL,
'delegate' => NULL,
'optional' => false,
'default' => NULL,
'contentAs' => NULL,
'debug' => true,
'partial' => 'Media/Type/Video',
'arguments' => $array10,
];

$output7 .= TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper::renderStatic($arguments8, $renderChildrenClosure9, $renderingContext);

$output7 .= '
    ';
return $output7;
});
default: return call_user_func(function() use ($renderingContext) {
$output11 = '';

$output11 .= '
        ';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper
$renderChildrenClosure13 = function() use ($renderingContext) {
return NULL;
};

$array14 = [
'file' => $renderingContext->getVariableProvider()->getByPath('file'),
'dimensions' => $renderingContext->getVariableProvider()->getByPath('dimensions'),
'data' => $renderingContext->getVariableProvider()->getByPath('data'),
'settings' => $renderingContext->getVariableProvider()->getByPath('settings'),
];

$arguments12 = [
'section' => NULL,
'delegate' => NULL,
'optional' => false,
'default' => NULL,
'contentAs' => NULL,
'debug' => true,
'partial' => 'Media/Type/Image',
'arguments' => $array14,
];

$output11 .= TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper::renderStatic($arguments12, $renderChildrenClosure13, $renderingContext);

$output11 .= '
    ';
return $output11;
});
}
}, array($arguments1));

$output0 .= '

';

    return $output0;
}

}

#