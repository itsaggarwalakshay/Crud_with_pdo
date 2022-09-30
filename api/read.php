<?php
//header
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
//initializing our api
include_once('../core/initialize.php');
//post
$post = new post($db);

//blog post 
$result = $post->read();														

$num = $result->rowCount();

if ($num > 0) {
	$post_arr = array();
	$post_arr['data'] = array();

	while($row = $result->fetch(PDO::FETCH_ASSOC)){
		extract($row);
		$post_item = array(
			'id' => $id,
			'name' => $name,
			'marks' => $marks
		);
		
		array_push($post_arr['data'], $post_item);
	}

	//trying to convert to json and output\
	echo json_encode($post_arr);
}else{
	echo json_encode(array('message'=>'no post founded'));
}
?>