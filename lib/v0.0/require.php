<?php

function req($class, $staticInit = false, $libVersion = 'v0.0', $libDir = 'lib/', $libExt = '.php') {

    $libRequireDir = $libDir . $libVersion . '/';
    
    require_once $libRequireDir . $class . $libExt;
    
    if ($staticInit === true) {
        
        new $class(true);
    }
}

req('Trace', true);
req('Request');
req('Token', true);
req('Conf');
req('Node');
req('Attribut');
req('Relationship');
req('Filter', true);
req('Response');

?>