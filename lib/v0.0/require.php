<?php
$libVersion = 'v0.0';
$libDir = 'lib/';
$libRequireDir = $libDir . $libVersion . '/';
$libExt = '.php';

require_once $libRequireDir . 'Trace' . $libExt;
require_once $libRequireDir . 'Token' . $libExt;
require_once $libRequireDir . 'Conf' . $libExt;
require_once $libRequireDir . 'Node' . $libExt;
require_once $libRequireDir . 'Attribut' . $libExt;
require_once $libRequireDir . 'Relationship' . $libExt;
require_once $libRequireDir . 'Filter' . $libExt;
require_once $libRequireDir . 'Response' . $libExt;

new Trace(true);
new Token(true);
new Filter(true);

?>