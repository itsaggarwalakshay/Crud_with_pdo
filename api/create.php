<?php
//header
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,X-Requested-With');
//initializing our api
include_once('../core/initialize.php');

//post
$post = new post($db);

$data = json_decode(file_get_contents("php://input"));

$post->name = $data->name;
$post->marks = $data->marks;

//create post
if ($post->create()) {
	echo json_encode(
		array('messages' => 'Post Created.')
	);
}else{
	echo json_encode(
		array('messages' => 'Post Not Created.')
	);
}
?>