<?php
/**
 * Created by PhpStorm.
 * User: dmytronekrasov
 * Date: 17.02.18
 * Time: 13:01
 */

namespace CMenu;

class CMenuElement
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $link;

    /**
     * @var CMenuElement[]
     */
    protected $children;

    public function __construct($name, $link)
    {
        $this->setName($name);
        $this->setLink($link);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * @param string $link
     */
    public function setLink($link)
    {
        $this->link = $link;
    }

    /**
     * @return CMenuElement[]
     */
    public function getChildren()
    {
        return $this->children;
    }

    /**
     * @param CMenuElement[] $children
     */
    public function setChildren(array $children)
    {
        $this->children = $children;
    }

    public function addChild(CMenuElement $element)
    {
        $this->children[] = $element;
    }
}