<?php
$_REQUEST['PM_token'] = 'test';

require_once 'lib/v0.0/require.php';

$response = new Response();
$response->run();

ob_end_flush();

?>