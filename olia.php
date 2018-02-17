<?php
//
// http://php.net/manual/ru/function.array.php

class cMenu {

var $menuItems = array ();
var $menuCount = 0; //
public $color = '#FFF';


//
function addMenuItem ($name, $url, $parent = 0, $level=1) {

$this->menuCount++; //

//
$this->menuItems[$this->menuCount]['name'] = $name;
$this->menuItems[$this->menuCount]['url'] = $url;
$this->menuItems[$this->menuCount]['parent'] = $parent;
$this->menuItems[$this->menuCount]['level'] = $parent;

//
if ($parent != 0) {
$this->menuItems [$parent]['children'][$level] = true;
}

//
$this->menuItems [$this->menuCount]['children'][$level] = false;

return $this->menuCount;

}

// Out menu
function getMenu ($curParent, $counter=0, $level=1){

$res = '<ul style="background: ' . $this->color . ';">';
    for ($i = 1; $i <= sizeof ($this->menuItems); $i++ ){
    if ($this->menuItems [$i]['parent'][$level] == $curParent){
    $type= ' <style> li {list-style-type: none; /* Заглавные буквы */}</style>';
    $res.= $type. '<li><a href="' . $this->menuItems[$i]['url'] . '">' .$level.' '.$i.' ' . $this->menuItems[$i]['name'] . '</a>';
        echo 'i='.$i.PHP_EOL;

        if ($this->menuItems[$i]['children']) { //
        echo 'N='.$i.$counter++.PHP_EOL;
        $res.= '  ' . $i;
        $res.= $this->getMenu ($i,$counter );
        }

        $res.= '</li>' .PHP_EOL;
    }//

    }
    $res.= '</ul>' .PHP_EOL;

return $res;
}


} // End Class

// Create simple menuCount
$mySimpleMenu = new cMenu ();
$mySimpleMenu->color = '#f00';

$numberMenuItem = $mySimpleMenu->addMenuItem ('Home', '#', 0);
$numberMenuItem = $mySimpleMenu->addMenuItem ('About', '#', 0);
$numberMenuItem = $mySimpleMenu->addMenuItem ('Certificate', '#', $numberMenuItem); // Create SubMenu
$numberMenuItem = $mySimpleMenu->addMenuItem ('ISO', '#', $numberMenuItem); // Create SubMenu
$numberMenuItem = $mySimpleMenu->addMenuItem ('ISO:9001', '#', $numberMenuItem); // Create SubMenu

$numberMenuItem = $mySimpleMenu->addMenuItem ('Article', '#', 0);
$numberMenuItem = $mySimpleMenu->addMenuItem ('Gallery', '#', 0);
$numberMenuItem = $mySimpleMenu->addMenuItem ('Contact', '#', 0);

$numberMenuItem = $mySimpleMenu->addMenuItem ('Google Map', '#', '2');



echo $mySimpleMenu->getMenu (0);

echo '<hr /><h1> User menu </h1>' .PHP_EOL;

$myUserMenu = new cMenu ();
$myUserMenu->color = '#0f0';


$myUserMenu->addMenuItem ('Login', '#', 0);
$myUserMenu->addMenuItem ('Pswd', '#', 0);
$myUserMenu->addMenuItem ('Bye', '#', 0);

echo $myUserMenu->getMenu (0);




//var_dump ($menuItems);
