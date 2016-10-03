<?php
/**
* Copyright Gabriel Nicolás González Ferreira <gabrielinuz@gmail.com>
* Released under the GPL3 license
* https://opensource.org/licenses/GPL-3.0
**/
include_once('Autoloader.php');
include_once('ConcretePathsProvider.php');

$pathsProvider = new ConcretePathsProvider;
$pathsProvider->appendPath('TestClassesFolder01/');
$pathsProvider->appendPath('TestClassesFolder02/');

$loader = Autoloader::initWith( $pathsProvider );

new TestClass01;

new TestClass01b;

new TestClass02;

new TestClass03; //Fatal error: Uncaught Error: Class 'TestClass03' not found... 