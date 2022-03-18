<?php

namespace Hospect\PhpVarsToJsBundle\Twig;

use Hospect\PhpVarsToJsBundle\ViewBinder\CachingViewBinder;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class JavaScriptExtension extends AbstractExtension
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
            new TwigFunction('initPhpVars', [$this, 'initPhpVars'], ['is_safe' => ['html']]),
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
