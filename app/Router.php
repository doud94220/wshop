<?php

namespace FwTest\Core;

class Router
{
    public static function init()
    {
        $arrayGlob = glob('../controllers/*.php');
//var_dump($arrayGlob);die;
        if (empty($arrayGlob)) {
            throw new \Exception('No route to load');
        }

        $found = false;

        foreach ($arrayGlob as $filepath) {
            if (self::saveRoutesFromFile($filepath)) {
                $found = true;
                break;
            }
        }

        if (!$found) {
            throw new \Exception('No matching route for current URI');
        }
    }

    private static function saveRoutesFromFile($path)
    {
        $content = file_get_contents($path);
        //echo $content;
        if (!preg_match('/class [a-z]+/i', $content, $arrayMatches)) {
            return ;
        }
//var_dump($arrayMatches);
        $objectName = str_ireplace('class ', '', $arrayMatches[0]);
//var_dump($objectName);
        $reflectionClass = new \ReflectionClass('\\FwTest\\Controller\\' . $objectName);
//var_dump($reflectionClass);
        if (!$reflectionClass) {
            return ;
        }

        $arrayReflectionMethods = $reflectionClass->getMethods();
//var_dump($arrayReflectionMethods);
        if (!$arrayReflectionMethods) {
            return ;
        }
//var_dump($_SERVER['SCRIPT_NAME']);
        $scriptName = str_replace('/index.php', '', $_SERVER['SCRIPT_NAME']);
//var_dump($scriptName);die;
//var_dump($_SERVER['REQUEST_URI']);
//var_dump(str_replace($scriptName, '', $_SERVER['REQUEST_URI']));

//var_dump(strpos($_SERVER['REQUEST_URI'], '?'));die;

if(strpos($_SERVER['REQUEST_URI'], '?') !== false)
{
    list($currentUri, $getParameters) = explode('?', str_replace($scriptName, '', $_SERVER['REQUEST_URI']));
}
else
{
    $currentUri = str_replace($scriptName, '', $_SERVER['REQUEST_URI']);
    //var_dump($currentUri);die;
}

// if($currentUri == "/product_list")
// {
//     $currentUri = $currentUri.".php";
// }

//echo $currentUri;echo '<br>';
//echo $getParameters;echo '<br>';

        foreach ($arrayReflectionMethods as $reflectionMethod) {
            $docComment = $reflectionMethod->getDocComment();
//var_dump($reflectionMethod);            
//var_dump($docComment);
            if (!$docComment || !preg_match('/@Route\\(\'(.*)\'\\)/', $docComment, $arrayMatches)) {
                continue;
            }
//var_dump($arrayMatches);
            $routeUri = $arrayMatches[1];
//var_dump($routeUri);
//var_dump($currentUri);
            if ($routeUri == $currentUri) {
                $objectName = '\FwTest\Controller\\' . $objectName;
                $methodName = $reflectionMethod->getName();
                $object = new $objectName();
                $object->$methodName();
                return true;
            }
        }
    }
}