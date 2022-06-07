<?php

namespace FwTest\Core;

use FwTest\classes\Product;

class Loader
{
    public static function register()
    {
        spl_autoload_register('FwTest\Core\Loader::autoload');
    }

    public static function autoload($name)
    {
        //$name = $name.".php";
if($name != "FwTest\Core\Router" && $name != "FwTest\Controller\AbstractController" && $name != "FwTest\Controller\AjaxController" && $name != "FwTest\Controller\IndexController")
{
    //echo $name;
    //include "../classes/Product.php";
}

        $arrayName = explode('\\', $name);
if($name != "FwTest\Core\Router" && $name != "FwTest\Controller\AbstractController" && $name != "FwTest\Controller\AjaxController" && $name != "FwTest\Controller\IndexController")
{
//var_dump($arrayName);
}

        if (
            $arrayName[0] != 'FwTest' ||
            !in_array($arrayName[1], ['Core', 'Classes', 'Controller', 'Model']) ||
            count($arrayName) != 3
        ) {
            throw new \Exception('Wrong namespace');
        }

        $type = $arrayName[1];
        $filename = ucfirst($arrayName[2]) . '.php';
//echo $filename;die;
        $path = '../';


if($name != "FwTest\Core\Router" && $name != "FwTest\Controller\AbstractController" && $name != "FwTest\Controller\AjaxController" && $name != "FwTest\Controller\IndexController")
{
    //echo $type;echo '<br>';
    //echo $filename;echo '<br>';
    //echo $path;echo '<br>';
}

        if ($type == 'Core') {
            $path .= 'app/';
        } elseif ($type == 'Classes') {
            $path .= 'classes/';
        } elseif ($type == 'Controller') {
            $path .= 'controllers/';
        } elseif ($type == 'Model') {
            $path .= 'models/';
        }

        $path .= $filename;

if($name != "FwTest\Core\Router" && $name != "FwTest\Controller\AbstractController" && $name != "FwTest\Controller\AjaxController" && $name != "FwTest\Controller\IndexController")
{
    //echo $path;echo '<br>';
}

        if (!file_exists($path)) {
            throw new \Exception('Path ' . $path . '" doesn\'t exist');
        }

        require_once($path);

if($name != "FwTest\Core\Router" && $name != "FwTest\Controller\AbstractController" && $name != "FwTest\Controller\AjaxController" && $name != "FwTest\Controller\IndexController")
{
    //$name = "../classes/ProductAction";
    //$name = "Product.php";
    //echo $name;
    //include "../classes/Product.php";
}

        if (!class_exists($name, false)) {
            throw new \Exception('Class ' . $name . ' doesn\'t exist');
        }
    }
}