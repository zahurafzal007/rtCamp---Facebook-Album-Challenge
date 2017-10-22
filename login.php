<?php 

	require_once 'Facebook/autoload.php';
	session_start();
	$fb = new Facebook\Facebook([
  'app_id' => '1963413130541591', // Replace {app-id} with your app id
  'app_secret' => 'd5c0c1ce4c42c3476fb038f66a88e7ef',
  'default_graph_version' => 'v2.2',
  ]);

$helper = $fb->getRedirectLoginHelper();

$permissions = ['email','user_photos']; // Optional permissions
$loginUrl = $helper->getLoginUrl('https://fbrtcamp.herokuapp.com/fbcallback.php', $permissions);

?>