<?php
class Default_action_BasicContent_fa6a679afe890e52 extends \TYPO3Fluid\Fluid\Core\Compiler\AbstractCompiledTemplate {
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
 * section Main
 */
public function section_b0000ec1c8d5f383(\TYPO3Fluid\Fluid\Core\Rendering\RenderingContextInterface $renderingContext) {
    $output0 = '';

$output0 .= '
  <article class="custom-textmedia">
    <!-- Custom Header -->
    <h2>';

$output0 .= call_user_func_array( function ($var) { return (is_string($var) || (is_object($var) && method_exists($var, '__toString')) ? htmlspecialchars((string) $var, ENT_QUOTES) : $var); }, [$renderingContext->getVariableProvider()->getByPath('data.header')]);

$output0 .= '</h2>

    <!-- Custom Text -->
    <div class="custom-text">
      ';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlViewHelper
$renderChildrenClosure2 = function() use ($renderingContext) {
return $renderingContext->getVariableProvider()->getByPath('data.my_custom_text');
};

$arguments1 = [
'parseFuncTSPath' => 'lib.parseFunc_RTE',
'data' => NULL,
'current' => NULL,
'currentValueKey' => NULL,
'table' => '',
];

$output0 .= TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlViewHelper::renderStatic($arguments1, $renderChildrenClosure2, $renderingContext);

$output0 .= '
    </div>

  </article>
';

    return $output0;
}
/**
 * Main Render function
 */
public function render(\TYPO3Fluid\Fluid\Core\Rendering\RenderingContextInterface $renderingContext) {
    $output3 = '';

$output3 .= '
';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\DebugViewHelper
$renderChildrenClosure5 = function() use ($renderingContext) {
return $renderingContext->getVariableProvider()->getByPath('data');
};

$arguments4 = [
'title' => NULL,
'maxDepth' => 8,
'plainText' => false,
'ansiColors' => false,
'inline' => false,
'blacklistedClassNames' => NULL,
'blacklistedPropertyNames' => NULL,
];

$output3 .= TYPO3\CMS\Fluid\ViewHelpers\DebugViewHelper::renderStatic($arguments4, $renderChildrenClosure5, $renderingContext);

$output3 .= '
';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\DebugViewHelper
$renderChildrenClosure7 = function() use ($renderingContext) {
return $renderingContext->getVariableProvider()->getByPath('files');
};

$arguments6 = [
'title' => NULL,
'maxDepth' => 8,
'plainText' => false,
'ansiColors' => false,
'inline' => false,
'blacklistedClassNames' => NULL,
'blacklistedPropertyNames' => NULL,
];

$output3 .= TYPO3\CMS\Fluid\ViewHelpers\DebugViewHelper::renderStatic($arguments6, $renderChildrenClosure7, $renderingContext);

$output3 .= '



';
// Rendering ViewHelper TYPO3Fluid\Fluid\ViewHelpers\IfViewHelper

$array9 = [
'0' => $renderingContext->getVariableProvider()->getByPath('youtubeVideoId'),
];

$expression10 = function($context) {return TYPO3Fluid\Fluid\Core\Parser\BooleanParser::convertNodeToBoolean($context["node0"]);};

$arguments8 = [
'then' => NULL,
'else' => NULL,
'condition' => TYPO3Fluid\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(
    $expression10(TYPO3Fluid\Fluid\Core\Parser\SyntaxTree\BooleanNode::gatherContext($renderingContext, $array9)),
    $renderingContext
),
'__then' => function() use ($renderingContext) {
$output11 = '';

$output11 .= '
  <iframe
    src="https://www.youtube-nocookie.com/embed/';

$output11 .= call_user_func_array( function ($var) { return (is_string($var) || (is_object($var) && method_exists($var, '__toString')) ? htmlspecialchars((string) $var, ENT_QUOTES) : $var); }, [$renderingContext->getVariableProvider()->getByPath('youtubeVideoId')]);

$output11 .= '?autohide=1&amp;controls=1&amp;enablejsapi=1&amp;
  allowfullscreen"
    width="600"
    height="337"
    class="video- embed-item"
    allow="fullscreen"
  ></iframe>
';
return $output11;
},
];

$output3 .= TYPO3Fluid\Fluid\ViewHelpers\IfViewHelper::renderStatic($arguments8, static fn() => '', $renderingContext)
;

$output3 .= '



';
// Rendering ViewHelper TYPO3Fluid\Fluid\ViewHelpers\IfViewHelper

$array13 = [
'0' => $renderingContext->getVariableProvider()->getByPath('files'),
];

$expression14 = function($context) {return TYPO3Fluid\Fluid\Core\Parser\BooleanParser::convertNodeToBoolean($context["node0"]);};

$arguments12 = [
'then' => NULL,
'else' => NULL,
'condition' => TYPO3Fluid\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(
    $expression14(TYPO3Fluid\Fluid\Core\Parser\SyntaxTree\BooleanNode::gatherContext($renderingContext, $array13)),
    $renderingContext
),
'__then' => function() use ($renderingContext) {
$output15 = '';

$output15 .= '
    <div class="custom-image">
        ';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ImageViewHelper
$renderChildrenClosure17 = function() use ($renderingContext) {
return NULL;
};

$arguments16 = [
'additionalAttributes' => NULL,
'data' => NULL,
'aria' => NULL,
'class' => NULL,
'dir' => NULL,
'id' => NULL,
'lang' => NULL,
'style' => NULL,
'accesskey' => NULL,
'tabindex' => NULL,
'onclick' => NULL,
'ismap' => NULL,
'longdesc' => NULL,
'usemap' => NULL,
'loading' => NULL,
'decoding' => NULL,
'src' => '',
'treatIdAsReference' => false,
'crop' => NULL,
'cropVariant' => 'default',
'fileExtension' => NULL,
'width' => NULL,
'height' => NULL,
'minWidth' => NULL,
'minHeight' => NULL,
'maxWidth' => NULL,
'maxHeight' => NULL,
'absolute' => false,
'image' => $renderingContext->getVariableProvider()->getByPath('files.0.originalResource'),
'alt' => $renderingContext->getVariableProvider()->getByPath('data.header'),
'title' => $renderingContext->getVariableProvider()->getByPath('data.header'),
];

$output15 .= TYPO3\CMS\Fluid\ViewHelpers\ImageViewHelper::renderStatic($arguments16, $renderChildrenClosure17, $renderingContext);

$output15 .= '
    </div>
';
return $output15;
},
];

$output3 .= TYPO3Fluid\Fluid\ViewHelpers\IfViewHelper::renderStatic($arguments12, static fn() => '', $renderingContext)
;

$output3 .= '

<p>Image Name: ';

$output3 .= call_user_func_array( function ($var) { return (is_string($var) || (is_object($var) && method_exists($var, '__toString')) ? htmlspecialchars((string) $var, ENT_QUOTES) : $var); }, [$renderingContext->getVariableProvider()->getByPath('imageName')]);

$output3 .= '</p>

';

$output3 .= '';

$output3 .= '
';

    return $output3;
}

}

#