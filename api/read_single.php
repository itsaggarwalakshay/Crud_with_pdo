<?php
//header
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
//initializing our api
include_once('../core/initialize.php');

//post
$post = new post($db);
$post->id = isset($_GET['id']) ? $_GET['id'] : die();
$post->read_single();

$post_arr = array(
	'id' => $post->id,
	'name' => $post->name,
	'marks' => $post->marks
);

print_r(json_encode($post_arr));

?>