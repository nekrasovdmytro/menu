<?php
/**
 * Created by PhpStorm.
 * User: dmytronekrasov
 * Date: 17.02.18
 * Time: 13:11
 */

include __DIR__ . '/src/CMenu/CMenu.php';
include __DIR__ . '/src/CMenu/CMenuTemplate.php';
include __DIR__ . '/src/CMenu/CMenuElement.php';

use CMenu\CMenu;
use CMenu\CMenuTemplate;
use CMenu\CMenuElement;


$template = new CMenuTemplate();
$template->setStart('<ol>');
$template->setEnd('</ol>');
$template->setTemplate('<li><a href="%s">%s</a></li>');
$template->setChildLevelTemplate('<li class="%s">%s</li>');

$menu = new CMenu($template);

$firstParent = new CMenuElement('Category', 'category.html');

$firstParent->addChild(new CMenuElement('Food', 'food.html'));
$firstParent->addChild(new CMenuElement('Bikes', 'bikes.html'));
$firstParent->addChild(new CMenuElement('Outdoor', 'outdoor.html'));

$another = new CMenuElement('Other', 'other.html');
$another->addChild(new CMenuElement('For home', 'for-home.html'));

$firstParent->addChild($another);

$firstParent->addChild(new CMenuElement('Phone', 'phones.html'));

$electrics = new CMenuElement('Electrics', 'electrics.html');

$toaster = new CMenuElement('toaster', 'toaster.html');
$toaster->addChild(new CMenuElement('Mulinex', 'mulinex.html'));

$electrics->addChild($toaster);

$firstParent->addChild($electrics);

$menu->addElement($firstParent);

$render = $menu->renderMenu();

echo $render;

file_put_contents('t.html', $render);
