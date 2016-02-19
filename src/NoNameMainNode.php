<?php

namespace TestApp;

use Symfony\Component\DomCrawler\Crawler;


class NoNameMainNode
{
    /**
     * @var Crawler
     */
    protected $crawler;

    /**
     * NoNameMainNode constructor.
     */
    public function __construct($html)
    {
        $this->setContent($html);
    }

    /**
     * @param $html
     */
    public function setContent($html)
    {
        assert(!empty($html), '$html should not be empty');

        $this->crawler = new Crawler();
        $this->crawler->addHtmlContent($html);
    }

    /**
     * @return NodeElement
     */
    public function root()
    {
        return new NodeElement($this->crawler);
    }
}