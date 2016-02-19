<?php

include_once 'vendor/autoload.php';

use TestApp\NoNameMainNode;


$xml = <<<HTML
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

$mainNode = new NoNameMainNode($xml);
$mainNode->root()
    ->children()
        ->node('div.component')
            ->hasAttribute('id', 'comp-289351c9085')
            ->hasClass('component')
            ->children()
                ->node('div.component-wrapper')
                    ->children()
                        ->node('ul')
                            ->hasChildren(3)
                            ->children()
                                ->node('li:first')
                                    ->value('Node 1')
                                    ->value("|[a-z]|i", true)
                                ->end()
                            ->end()
                        ->end()
                    ->end()
                ->end()
            ->end()


//            ->node('div.component-wrapper')
//                ->hasAttribute('ui-data')
//            ->end()
//            ->node('script')
//                ->hasAttribute('type', 'application/javascript')
//            ->end()
        ->end()
    ->end()
;

//$crawler = new Crawler();
//$crawler->addContent($xml);
//
//$rs = $crawler->filter('ul li')->each(function ($node) { return $node->text(); });



print("\n");


//$domParser = new DOMParser($xml);
//
//$domParser->root()
//    ->hasAttribute('id', 'comp-289351c9085')
//    ->hasClass('component')
//    ->children()
//        ->node('div.component-wrapper')
//            ->hasAttribute('ui-data')
//            ->children()
//                ->node('ul')
//                    ->children()
//                        ->count(3)
//                        ->node('li')
//                            ->valueContains('Node')
//                        ->end()
//                        ->node('li', 0)
//                            ->hasClass('active')
//                        ->end()
//                        ->node('li.active')
//                            ->count(1)
//                        ->end()
//                    ->end()
//                ->end()
//            ->end()
//        ->end()
//    ->end();
