<?php
$_REQUEST['PM_token'] = 'test';
$_REQUEST['PM_token_domain'] = 'mesbonstuyaux';
$_REQUEST['PM_token_lang'] = 'fr';

require_once 'lib/v0.0/require.php';

$response = new Response();
$response->run();

ob_end_flush();

?>