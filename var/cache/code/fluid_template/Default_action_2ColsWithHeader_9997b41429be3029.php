<?php
class Default_action_2ColsWithHeader_9997b41429be3029 extends \TYPO3Fluid\Fluid\Core\Compiler\AbstractCompiledTemplate {
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
));
    }
    /**
 * Main Render function
 */
public function render(\TYPO3Fluid\Fluid\Core\Rendering\RenderingContextInterface $renderingContext) {
    $output0 = '';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\DebugViewHelper
$renderChildrenClosure2 = function() use ($renderingContext) {
return $renderingContext->getVariableProvider()->getAll();
};

$arguments1 = [
'title' => NULL,
'maxDepth' => 8,
'plainText' => false,
'ansiColors' => false,
'inline' => false,
'blacklistedClassNames' => NULL,
'blacklistedPropertyNames' => NULL,
];

$output0 .= TYPO3\CMS\Fluid\ViewHelpers\DebugViewHelper::renderStatic($arguments1, $renderChildrenClosure2, $renderingContext);

$output0 .= '


<div class="container text-center">
  <div class="row">
    <div class="col">
      ';
// Rendering ViewHelper TYPO3Fluid\Fluid\ViewHelpers\ForViewHelper
$renderChildrenClosure4 = function() use ($renderingContext) {
$output5 = '';

$output5 .= '
        ';
// Rendering ViewHelper TYPO3Fluid\Fluid\ViewHelpers\Format\RawViewHelper
$renderChildrenClosure7 = function() use ($renderingContext) {
$output8 = '';

$output8 .= ' ';

$output8 .= $renderingContext->getVariableProvider()->getByPath('record.renderedContent');

$output8 .= ' ';
return $output8;
};

$arguments6 = [
'value' => NULL,
];

$output5 .= isset($arguments6['value']) ? $arguments6['value'] : $renderChildrenClosure7();

$output5 .= '
      ';
return $output5;
};

$arguments3 = [
'key' => NULL,
'reverse' => false,
'iteration' => NULL,
'each' => $renderingContext->getVariableProvider()->getByPath('children_200'),
'as' => 'record',
];

$output0 .= TYPO3Fluid\Fluid\ViewHelpers\ForViewHelper::renderStatic($arguments3, $renderChildrenClosure4, $renderingContext);

$output0 .= '
      <div class="col"></div>
    </div>
    <div class="container text-center">
      <div class="row">
        <div class="col">
          ';
// Rendering ViewHelper TYPO3Fluid\Fluid\ViewHelpers\ForViewHelper
$renderChildrenClosure10 = function() use ($renderingContext) {
$output11 = '';

$output11 .= '
            ';
// Rendering ViewHelper TYPO3Fluid\Fluid\ViewHelpers\Format\RawViewHelper
$renderChildrenClosure13 = function() use ($renderingContext) {
$output14 = '';

$output14 .= ' ';

$output14 .= $renderingContext->getVariableProvider()->getByPath('record.renderedContent');

$output14 .= ' ';
return $output14;
};

$arguments12 = [
'value' => NULL,
];

$output11 .= isset($arguments12['value']) ? $arguments12['value'] : $renderChildrenClosure13();

$output11 .= '
          ';
return $output11;
};

$arguments9 = [
'key' => NULL,
'reverse' => false,
'iteration' => NULL,
'each' => $renderingContext->getVariableProvider()->getByPath('children_201'),
'as' => 'record',
];

$output0 .= TYPO3Fluid\Fluid\ViewHelpers\ForViewHelper::renderStatic($arguments9, $renderChildrenClosure10, $renderingContext);

$output0 .= '
        </div>
        <div class="col">
          ';
// Rendering ViewHelper TYPO3Fluid\Fluid\ViewHelpers\ForViewHelper
$renderChildrenClosure16 = function() use ($renderingContext) {
$output17 = '';

$output17 .= '
            ';
// Rendering ViewHelper TYPO3Fluid\Fluid\ViewHelpers\Format\RawViewHelper
$renderChildrenClosure19 = function() use ($renderingContext) {
$output20 = '';

$output20 .= ' ';

$output20 .= $renderingContext->getVariableProvider()->getByPath('record.renderedContent');

$output20 .= ' ';
return $output20;
};

$arguments18 = [
'value' => NULL,
];

$output17 .= isset($arguments18['value']) ? $arguments18['value'] : $renderChildrenClosure19();

$output17 .= '
          ';
return $output17;
};

$arguments15 = [
'key' => NULL,
'reverse' => false,
'iteration' => NULL,
'each' => $renderingContext->getVariableProvider()->getByPath('children_202'),
'as' => 'record',
];

$output0 .= TYPO3Fluid\Fluid\ViewHelpers\ForViewHelper::renderStatic($arguments15, $renderChildrenClosure16, $renderingContext);

$output0 .= '
        </div>
      </div>
    </div>
  </div>
</div>
';

    return $output0;
}

}

#