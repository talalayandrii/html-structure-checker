<?php

namespace TestApp;

use Symfony\Component\DomCrawler\Crawler;


class NodeElement implements NodeInterface
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

    public function name()
    {
        var_dump($this->crawler->nodeName().'.'.$this->crawler->attr('class'));
        return $this;
    }

    /**
     * @return NodeList
     */
    public function children()
    {
        return new NodeList($this->crawler->children(), $this);
    }

    /**
     * @param $attribute
     * @param null $value
     * @return $this
     * @throws \Exception
     */
    public function hasAttribute($attribute, $value = null)
    {
        $attr = $this->crawler->attr($attribute);

        if (is_null($attr)) {
            throw new \Exception('The attribute not found');
        }

        if (is_string($value) && $attr !== $value) {
            throw new \Exception('The attribute\'s value does not match');
        }

        return $this;
    }

    /**
     * @param $cls
     * @throws \Exception
     */
    public function hasClass($cls)
    {
        $attr = $this->crawler->attr('class');

        if (is_null($attr)) {
            throw new \Exception('`class` attribute not found');
        }

        $classes = explode(' ', $attr);

        if (!in_array($cls, $classes)) {
            throw new \Exception('Given class name not found');
        }

        return $this;
    }

    /**
     * @return NodeElement
     */
    public function end()
    {
        return $this->parent;
    }
}