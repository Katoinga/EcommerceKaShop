<?php

require_once 'vendor/autoload.php';

if (!session_id())
{
    session_start();
}

// Call Facebook API

$facebook = new \Facebook\Facebook([
  'app_id'      => '475234573112574',
  'app_secret'     => '0fb7aa34318c47239b37ab069968ac79',
  'default_graph_version'  => 'v2.10'
]);

?>