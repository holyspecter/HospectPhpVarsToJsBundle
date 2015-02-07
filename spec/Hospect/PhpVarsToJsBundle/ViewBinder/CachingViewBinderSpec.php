<?php

namespace spec\Hospect\PhpVarsToJsBundle\ViewBinder;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CachingViewBinderSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Hospect\PhpVarsToJsBundle\ViewBinder\CachingViewBinder');
    }

    function it_binds_js_var()
    {
        $this->bind("var testVar = 'simple text'");

        $this->getVars()->shouldReturn(["var testVar = 'simple text'"]);
    }
}
