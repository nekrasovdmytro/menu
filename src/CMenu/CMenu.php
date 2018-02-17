<?php
/**
 * Created by PhpStorm.
 * User: dmytronekrasov
 * Date: 17.02.18
 * Time: 12:53
 */

namespace CMenu;

class CMenu
{
    protected $menu;
    /**
     * @var CMenuTemplate
     */
    protected $template;

    public function __construct(CMenuTemplate $template)
    {
        $this->setTemplate($template);
    }

    /**
     * @throws \Exception
     */
    public function renderMenu()
    {
        if (null === $this->getMenu()) {
            throw new \Exception('Menu is not set');
        }

        return $this->generateMenu($this->getMenu());
    }

    /**
     * @param CMenuElement[] $elements
     * @return string
     */
    protected function generateMenu($elements)
    {
        $menuHtml = $this->getTemplate()->getStart();

        /**
         * @var CMenuElement $element
         */
        foreach ($elements as $element) {
            $menuHtml .= $this->getTemplate()->renderElement($element);

            if (is_array($element->getChildren())) {
                $menuHtml .=
                    $this->getTemplate()->renderChildLevel(
                        'next-level',
                        $this->generateMenu($element->getChildren())
                    );
                //$menuHtml .= $this->generateMenu($element->getChildren());
            }
        }

        $menuHtml .= $this->getTemplate()->getEnd();

        return $menuHtml;
    }

    /**
     * @return mixed
     */
    public function getMenu()
    {
        return $this->menu;
    }

    /**
     * @return CMenuTemplate
     */
    public function getTemplate()
    {
        return $this->template;
    }

    /**
     * @param CMenuTemplate $template
     */
    public function setTemplate($template)
    {
        $this->template = $template;
    }

    public function addElement(CMenuElement $element)
    {
        $this->menu[] = $element;
    }
}

