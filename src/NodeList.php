<?php

namespace TestApp;

use Symfony\Component\DomCrawler\Crawler;


class NodeList implements NodeInterface
{
    /**
     * @var Crawler
     */
    protected $crawler;

    /**
     * @var NodeElement
     */
    protected $parent;

    /**
     * NodeElement constructor.
     * @param Crawler $crawler
     * @param NodeInterface|null $parent
     */
    public function __construct(Crawler $crawler, NodeInterface $parent = null)
    {
        $this->crawler = $crawler;
        $this->parent = $parent;
    }

    /**
     * @param $selector
     * @return NodeElement
     */
    public function node($selector)
    {
        return new NodeElement($this->crawler->filter($selector), $this);
    }

    /**
     * @return NodeElement
     */
    public function end()
    {
        return $this->parent;
    }
}