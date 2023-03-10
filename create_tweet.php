<?php

session_start();
require_once('dbconnect.php');

if (!isset($_SESSION['body'])) {
	exit;
}

$user_id = $_SESSION['user'];
$userData = $db->users->findOne( array('_id' => $user_id));
$body = substr($_POST['body'], 140);
$date = date('Y-m-d H:i:s');

$db->tweets->insertOne( array(
		'authorID' => $super_id,
		'authorName' => $userData['username'],
		'body' => $body,
		'created' => date
	));

header('Location: home.php');