<?php
	header("content-type: application/json");
	header("Access-Control-Allow-Origin:*");
	header("Access-Control-Allow-Credentials: true");
	header("Access-Control-Max-Age: 120000");
	header("Access-Control-Allow-Methods: GET,POST,DELETE,OPTIONS");
	header("Access-Control-Allow-Headers:Content-Type,Accept");
	$res = array(
		'status' => "FAILED",
		"desc"=>$heading." : ".$message
	);
	http_response_code(500);
	echo(json_encode($res));
?>