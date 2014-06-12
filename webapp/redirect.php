<?php
	require_once 'db.php';
	require_once 'fn.php';
	$hash = substr($_SERVER['REQUEST_URI'],1);
	if (!hash_exists($hash)){
                header ("Location: http://{$_SERVER['SERVER_NAME']}/404.php");
        }

	$this_url = "http://{$_SERVER['SERVER_NAME']}/{$hash}";	
	$target_url = get_target_url($hash);
	$og = get_og($hash);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
    <html>
    <head>
    <title><?php echo $og->title; ?> </title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="description" content="<?php echo $og->description; ?>" />
     
    <!-- Schema.org markup for Google+
    <meta itemprop="name" content="">
    <meta itemprop="description" content="">
    <meta itemprop="image" content="">
    -->
     
    <!-- Twitter Card data
    <meta name="twitter:card" content="">
    <meta name="twitter:site" content="">
    <meta name="twitter:title" content="">
    <meta name="twitter:description" content="">
    <meta name="twitter:image:src" content="">
    -->
     
    <!-- Open Graph data  -->

	<?php


		//Required
    		echo "<meta property=\"og:title\" content=\"".$og->title."\" />";
		echo "<meta property=\"og:type\" content=\"".$og->type."\"  />";
    		echo "<meta property=\"og:url\" content=\"{$this_url}\" />";
    		echo "<meta property=\"og:image\" content=\"".$og->image."\" />";
		//Optional
		if (!empty($og->site_name)){
			echo "<meta property=\"og:site_name\" content=\"".$og->site_name."\" />";
		}
		if (!empty($og->description)){
    			echo "<meta property=\"og:description\" content=\"".$og->description."\" />";
		}	
    		//echo "<meta http-equiv=\"refresh\" content=\"0; url=".$target_url."\"/>";
	?>
    </head>
     
    <body>
	<?php include_once("analyticstracking.php") ?>
	</body></html>


