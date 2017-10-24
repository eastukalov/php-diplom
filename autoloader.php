<?php

function loadFromClasses($aClassName)
{
    $aClassFilePath = __DIR__ . DIRECTORY_SEPARATOR
        . str_replace( '\\', DIRECTORY_SEPARATOR, $aClassName) . '.class.php';

    if (file_exists($aClassFilePath)) {
        include $aClassFilePath;
        return;
    }

    $aClassFilePath = __DIR__ . DIRECTORY_SEPARATOR
        . str_replace( '\\', DIRECTORY_SEPARATOR, $aClassName) . '.interface.php';

    if (file_exists($aClassFilePath)) {
        include $aClassFilePath;
        return;
    }

}

spl_autoload_register('loadFromClasses');