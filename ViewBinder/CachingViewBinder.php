<?php

namespace Hospect\PhpVarsToJsBundle\ViewBinder;

use Laracasts\Utilities\JavaScript\ViewBinder;

class CachingViewBinder implements ViewBinder
{
    /** @var array */
    private $vars = [];

    /**
     * {@inheritdoc}
     */
    public function bind($js)
    {
        $this->vars[] = $js;
    }

    /**
     * @return array
     */
    public function getVars()
    {
        return $this->vars;
    }
}
