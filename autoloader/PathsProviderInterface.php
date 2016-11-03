<?php
/**
* Copyright (c) Gabriel Ferreira <gabrielinuz@gmail.com>. All rights reserved. 
* Released under the GPL3 license
* https://opensource.org/licenses/GPL-3.0
**/

interface PathsProviderInterface
{   
	public function setFile( $filePath );
    public function appendPath( $path );
    public function setPaths( $paths );
    public function getPaths();
}
?>
