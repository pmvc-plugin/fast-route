<?php
PMVC\Load::plug();

# plugin
PMVC\setPlugInFolders(['../']);


class FastRouteTest extends PHPUnit_Framework_TestCase
{
    function testRoute()
    {
        $expectedAction = 'aaa';

        # add route
        PMVC\plug('fast_route')->addRoute('GET','/',$expectedAction);

        # parse route by url
        $dispatch = PMVC\plug('fast_route')->getDispatch('GET','/');
        $this->assertEquals($expectedAction,$dispatch->action);
    }
}
