<?php
class Response {
	public $success = false;
	public $link = "";
	public $reason = "";
}

    //'$', '-', '_', '.', '+', '!', '*', '(', ')', ','
    //@see http://www.faqs.org/rfcs/rfc1738.html
 


require_once 'db.php';
require_once 'fn.php';

$valid = true;
$success = true;
$reason = "";

//Required
$title = mysqli_real_escape_string($conn, $_POST['title']);
if (strlen($title) == 0){
	$valid = false;
	$reason = $reason . " Title required";
}
function validateObjectType($type){
if (
	$type === 'website' or 
	$type === 'profile' or 
	$type === 'book' or 
	$type === 'article' or 
	$type === 'video.movie' or 
	$type === 'video.episode' or 
	$type === 'video.tv_show' or
	$type === 'video.other' or
	$type === 'music.song' or
	$type === 'music.album' or
	$type === 'music.playlist' or
	$type === 'music.radio_station'
){
	return TRUE;
} else {
	return FALSE;
}

}
$obj_type = mysqli_real_escape_string($conn, $_POST['obj_type']);
if (!validateObjectType($obj_type)){
	$valid = FALSE;
	$reason = $reason . " Object type required";
}
$tar_link =mysqli_real_escape_string($conn, $_POST['url']);
if (filter_var($tar_link, FILTER_VALIDATE_URL) === FALSE){
	$valid = false;
	$reason = $reason . " Target Link must be a link";
}

$img_url =mysqli_real_escape_string($conn, $_POST['image']);
if (filter_var($img_url, FILTER_VALIDATE_URL) === FALSE){
	$valid = false;
}

//Optional
$description =mysqli_real_escape_string($conn, $_POST['description']);

if ($valid){

	$record = $title . $obj_type . $tar_link . $img_url . $description;
	$data_hash = sha1($record);


	//Check and see if the record is already there, if so then just return the link

	//It doesnt exist so create and return a new one
	$hash = get_hash($data_hash);
	if (strlen($hash) === 0){
		$hash = generate_unique_hash(); 
		$sql_links = "INSERT INTO links (hash, target_url, data_hash)"
			. " VALUES ('$hash', '$tar_link', '$data_hash')";
		if (!mysqli_query($conn, $sql_links)){
			$success = false;
		}
		$sql_og = "INSERT INTO open_graph (hash, title, type, image, description) " .
		" VALUES " . "('$hash', '$title', '$obj_type', '$img_url', '$description')";
		if (!mysqli_query($conn, $sql_og)){
			$success = false;
		}

	} 
	
} else {
	$success = false;
	$reason = $reason . " Input not valid";
}

	mysqli_close($conn);
$res = new Response();
$res->success = $success;
$res->link = $hash;
$res->reason = $reason;

echo json_encode($res);



?>
