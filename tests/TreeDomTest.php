<?php

namespace TestApp\Tests;

use TestApp\NoNameMainNode;


class TreeDomTest extends \PHPUnit_Framework_TestCase
{
    private function getHtml()
    {
        return <<<HTML
<div id="comp-289351c9085" class="component">
    <div class="faaake">j</div>
    <div class="component-wrapper" ui-data>
        <ul>
            <li class="active">Node 1</li>
            <li>Node 2</li>
            <li>Node 3</li>
        </ul>
    </div>
    <div class="component-wrapper">
        <ul>
            <li class="active">Node 1</li>
            <li>Node 2</li>
            <li>Node 3</li>
        </ul>
    </div>

    <script type="application/javascript">var i = 435;</script>
</div>
HTML;
    }

    public function testCssToXPath()
    {
        $mainNode = new NoNameMainNode($this->getHtml());
        $mainNode->root()
            ->children()
                ->node('div.component')
                    ->hasAttribute('id', 'comp-289351c9085')
//                    ->hasClass('component')
                    ->children()
                        ->node('div.component-wrapper')
                            ->children()
                                ->node('ul')
//                                    ->hasChildren(3)
//                                    ->children()
//                                        ->node('li:first')
//                                            ->value('Node 1')
//                                            ->value("|[a-z]|i", true)
//                                        ->end()
//                                    ->end()
                                ->end()
                            ->end()
                        ->end()
                    ->end()
                ->end()
            ->end()
        ;

    }
}
