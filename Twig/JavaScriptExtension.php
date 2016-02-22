<?php

namespace Hospect\PhpVarsToJsBundle\Twig;

use Hospect\PhpVarsToJsBundle\ViewBinder\CachingViewBinder;

class JavaScriptExtension extends \Twig_Extension
{
    /** @var  CachingViewBinder */
    private $viewBinder;

    /**
     * @param CachingViewBinder $viewBinder
     */
    public function __construct(CachingViewBinder $viewBinder)
    {
        $this->viewBinder = $viewBinder;
    }

    /**
     * {@inheritdoc}
     */
    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction('initPhpVars', [$this, 'initPhpVars'], ['is_safe' => ['html']]),
        ];
    }

    /**
     * @return string
     */
    public function initPhpVars()
    {
        $vars = $this->viewBinder->getVars();

        return implode("\n", $vars);
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'javascript_extension';
    }
}
