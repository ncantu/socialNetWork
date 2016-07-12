<?php
require_once 'lib/v0.0/require.php';

$_REQUEST['PM_token'] = 'test';

$response = new Response();
$response->run();

ob_end_flush();

?>