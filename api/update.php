<?php
//header
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,X-Requested-With');
//initializing our api
include_once('../core/initialize.php');

//post
$post = new post($db);

$data = json_decode(file_get_contents("php://input"));

$post->id = $data->id;
$post->name = $data->name;
$post->marks = $data->marks;

//create post
if ($post->update()) {
	echo json_encode(
		array('messages' => 'Post Updated.')
	);
}else{
	echo json_encode(
		array('messages' => 'Post Not Updated.')
	);
}
?>
