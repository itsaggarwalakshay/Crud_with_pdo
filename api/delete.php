<?php
//header
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: DELETE');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,X-Requested-With');
//initializing our api
include_once('../core/initialize.php');

//post
$post = new post($db);

$data = json_decode(file_get_contents("php://input"));

$post->id = $data->id;

//delete post
if ($post->delete()) {
	echo json_encode(
		array('messages' => 'Post Deleted.')
	);
}else{
	echo json_encode(
		array('messages' => 'Post Not Deleted.')
	);
}
?>