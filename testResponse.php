<?php
$_REQUEST['PM_token'] = 'anonymous';
$_REQUEST['PM_token_domain'] = 'mesbonstuyaux';
$_REQUEST['PM_token_lang'] = 'fr';
$_REQUEST['PM_token_versionConf'] = 'v0.0';

require_once 'lib/v0.0/require.php';

$response = new Response();
$response->run();

Trace::final();

ob_end_flush();

?>