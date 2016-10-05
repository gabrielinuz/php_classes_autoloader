<?php
/**
* Copyright Gabriel Nicolás González Ferreira <gabrielinuz@gmail.com>
* and Felipe Evans <fevans@gmail.com>  
* This file is part of classset-php framework.
* Released under the GPL3 license
* https://opensource.org/licenses/GPL-3.0
**/
require_once "PathsProviderInterface.php";
    
class Autoloader
{
    private static $instance;
    private $pathsProvider;
    
    public static function initWith(PathsProviderInterface $pathsProvider)
    {
        if (!(self::$instance instanceof self))
        {
            self::$instance = new self($pathsProvider);
        }
        return self::$instance;
    }

    private function __construct(PathsProviderInterface $pathsProvider)
    {
        /*** nullify any existing autoloads ***/
        spl_autoload_register(null, false);
 
        /*** specify extensions that may be loaded ***/
        spl_autoload_extensions('.php, .class.php');

        /*** register the loader functions ***/
        spl_autoload_register( array($this, 'loadClasses') );

        /*** Dependency inyection ***/
        $this->pathsProvider = $pathsProvider;
    }

    /*** to_prevent cloned: ***/
    private function __clone()
    {
        trigger_error
        (
            'Invalid Operation: You cannot clone an instance of '
            . get_class($this) ." class.", E_USER_ERROR 
        );
    }

    /*** to prevent deserialization: ***/
    private function __wakeup()
    {
        trigger_error
        (
            'Invalid Operation: You cannot deserialize an instance of '
            . get_class($this) ." class."
        );
    }
 
    /*** class loader ***/
    private function loadClasses($class)
    {
        $filename = $class . '.php';
        
        $paths = $this->pathsProvider->getPaths();
        foreach ($paths as $path) 
        {
            if (file_exists($path . $filename))
            {
                require_once $path . $filename;
            }
        }
    }
}
?>