<?php
include('configFacebook.php');

$facebook_output = '';

$facebook_helper = $facebook->getRedirectLoginHelper();
$facebook_permissions = ['email']; // Optional permissions
$loginFacebook = '"'.$facebook_helper->getLoginUrl('http://localhost/ecommerce/', $facebook_permissions).'"';
?>