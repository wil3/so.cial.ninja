<?php


/**
 * 62 ^ len possibilities
 */
function generate_hash_rand() {
	$len = 5;
	$short = "";
	$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
	$charslen = strlen($chars);
	for ($i=0; $i<$len; $i++)
	{
	        $rnd = rand(0, $charslen);
	        $short .= substr($chars, $rnd, 1);
	}
	return $short;
}

function generate_unique_hash(){
	do {
		$hash = generate_hash_rand();
		if (hash_exists($hash)){
			continue;
		}
		break;
	} while(1);
	return $hash;
}


function hash_exists($hash){
	global $conn;
	$sql = "SELECT * FROM links WHERE hash='$hash'";
	if($result = mysqli_query($conn, $sql)){
		$rows = mysqli_num_rows($result);
		mysqli_free_result($result);
		return  $rows == 1;
	} else {
		return false;
	}
}

function get_hash($data_hash){
	global $conn;
	$sql = "SELECT hash FROM links WHERE data_hash='$data_hash'";
	if ($result = mysqli_query($conn, $sql)){
		$rows = mysqli_num_rows($result);
		if ($rows == 0){
			mysqli_free_result($result);
			return "";
		} else {
			$row = mysqli_fetch_array($result);	
			$hash = $row['hash'];
			mysqli_free_result($result);
			return $hash;
		}
	} else {
		return "";
	}
}



function get_target_url($hash){
	global $conn;
	$sql = "SELECT target_url FROM links WHERE hash='$hash'";
	if ($result = mysqli_query($conn, $sql)){
		$rows = mysqli_num_rows($result);
		if ($rows == 0){
			mysqli_free_result($result);
			return "";
		} else {
			$row = mysqli_fetch_array($result);	
			$url = $row['target_url'];
			mysqli_free_result($result);
			return $url;
		}
	} else {
		return "";
	}
}

function insert_og($og){

}


require_once 'class.open_graph.php';

/**
 * Return an OpenGraph object
 */
function get_og($hash){

	global $conn;
	$sql = "SELECT * FROM open_graph WHERE hash='$hash'";
	if ($result = mysqli_query($conn, $sql)){
		$rows = mysqli_num_rows($result);
		if ($rows == 0){
			mysqli_free_result($result);
			return FALSE;
		} else {
			$og = new OpenGraph();
			$row = mysqli_fetch_array($result);	
			$og->title = $row['title'];
			$og->type = $row['type'];
			$og->image = $row['image'];
			$og->description = $row['description'];
			mysqli_free_result($result);
			return $og;
		}
	} else {
		return FALSE;
	}

}

?>
