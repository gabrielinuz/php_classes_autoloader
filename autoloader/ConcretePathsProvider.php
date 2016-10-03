<?php
/**
* Copyright (c) Gabriel Ferreira <gabrielinuz@gmail.com>. All rights reserved. 
* This file is part of classset-php.
* Released under the GPL3 license
* https://opensource.org/licenses/GPL-3.0
**/
require_once "PathsProviderInterface.php";

class ConcretePathsProvider implements PathsProviderInterface
{
    public function getPaths()
    {
        return array
        (
            'TestClassesFolder01/',
            'TestClassesFolder02/'
        );
    }
}
?>