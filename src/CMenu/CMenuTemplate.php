<?php
/**
 * Created by PhpStorm.
 * User: dmytronekrasov
 * Date: 17.02.18
 * Time: 13:13
 */

namespace CMenu;


class CMenuTemplate
{
    /**
     * @var string
     */
    protected $template;

    /**
     * @var string
     */
    protected $childLevelTemplate;

    /**
     * @var string
     */
    protected $start;

    /**
     * @var string
     */
    protected $end;

    /**
     * @return string
     */
    public function getTemplate()
    {
        return $this->template;
    }

    /**
     * @param string $template
     */
    public function setTemplate($template)
    {
        $this->template = $template;
    }

    public function renderElement(CMenuElement $element)
    {
        return sprintf($this->getTemplate(), $element->getLink(), $element->getName())  . PHP_EOL;
    }

    public function renderChildLevel($class, $html)
    {
        return sprintf($this->getChildLevelTemplate(), $class, $html);
    }

    /**
     * @return string
     */
    public function getStart()
    {
        return $this->start  . PHP_EOL;
    }

    /**
     * @param string $start
     */
    public function setStart($start)
    {
        $this->start = $start;
    }

    /**
     * @return string
     */
    public function getEnd()
    {
        return $this->end  . PHP_EOL;
    }

    /**
     * @param string $end
     */
    public function setEnd($end)
    {
        $this->end = $end;
    }

    /**
     * @return string
     */
    public function getChildLevelTemplate()
    {
        return $this->childLevelTemplate;
    }

    /**
     * @param string $childLevelTemplate
     */
    public function setChildLevelTemplate($childLevelTemplate)
    {
        $this->childLevelTemplate = $childLevelTemplate;
    }
}