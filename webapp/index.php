 <!DOCTYPE html> 
<html>

        <head>

		<title>So.cial.ninja</title>
		<meta name="description" content="Take control of how you share. Customize link previews or create one if it does not exists." />
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

		<!-- Schema.org markup for Google+ -->
		<meta itemprop="name" content="So.cial.ninja">
		<meta itemprop="description" content="Take control of how you share. Customize link previews or create one if it does not exists.">
		<meta itemprop="image" content="http://so.cial.ninja/images/so.cial.ninja-logo.png">

		<!-- Twitter Card data 
		<meta name="twitter:card" content="summary_large_image">
		<meta name="twitter:site" content="">
		<meta name="twitter:title" content="">
		<meta name="twitter:description" content="">
		<meta name="twitter:image:src" content="">-->

		<!-- Open Graph data  -->
		<meta property="og:title" content="So.cial.ninja - a social media link generator" />
		<meta property="og:site_name" content="So.cial.ninja" />
		<meta property="og:url" content="http://so.cial.ninja" />
		<meta property="og:description" content="Take control of how you share. Customize link previews or create one if it does not exists." />
<meta property="og:image" content="http://so.cial.ninja/images/so.cial.ninja-logo.png" />

		<link rel="stylesheet" href="css/styles.css"/>
		<script src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
		<script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>

		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/3.50/jquery.form.min.js"></script>

<script>

$(document).ready(function(){

	$("#new_link").validate({
	errorPlacement: function(error, element){
		var status = element.parent().parent().find(".status").first();
		status.removeClass().addClass("error");	
		status.append(error);
		

	},
	rules : {
		url: {
			required:true,
			url: true
			},
		title: {

			required:true

		},
		image: {

			required:true,
			url: true

		}
		
	},

	messages: {
		url: {
			required:"Required",
			url:"Not a URL"
			},
		title: {

			required:"Required"
		},

		image: {

			required:"Required",
			url:"Not a URL"
		}

	},
	submitHandler: function(form){
		$(form).ajaxSubmit({
			url:"new_link.php",
			type:"post",
			dataType:"json",
			success: function(data){
				if (data.success){
					$("#gen_url").val(data.link);
				} else {


				}
			}

		});

	}

});


});

</script>
</head>

        <body>
	<?php include_once("analyticstracking.php") ?>

	<div id="page">

	<div class="hd">
		<div class="title">
			<div>
				<img id="logo" src="images/so.cial.ninja-logo.png" />
				<div id="logo_text">
					<h1>So.cial.ninja</h1>
					<div class="version">alpha</div>
				</div>
			</div>
			<div class="summary">
				<em>a social media link generator</em>
			</div>
		</div>
	</div>	
	<div id="generated" >
		<input id="gen_url" placeholder="Generated link will display here" type="text" readonly />
	</div>


        <form id="new_link">

	<table>
	
	<tr><td><input name="url" type="text" placeholder="Target URL"/></td><td><span class="status"><span></span></span></td></tr>

	</table>
	
<!--	<h3>Facebook</h3>-->

	<table>
	
	<tr><td><input  name="title" type="text" placeholder="Title" /></td><td><span class="status"><span></span></span></td></tr>
	
	<tr><td><select name="obj_type">
			<option value="website">Website</option>
			<option value="profile">Profile</option>
			<option value="book">Book</option>
			<option value="article">Article</option>
			<option value="video.movie">Movie</option>
			<option value="video.episode">Episode</option>
			<option value="video.tv_show">TV Show</option>
			<option value="video.other">Other video</option>
			<option value="music.song">Song</option>
			<option value="music.album">Album</option>
			<option value="music.playlist">Playlist</option>
			<option value="music.radio_station">Radio Station</option>
		</select></td></tr>
	
	<tr><td><input name="image" type="text" placeholder="Image URL" /></td><td><span class="status"><span></span></span></td></tr>
	

	<tr><td><textarea name="description" placeholder="Description (Optional)"></textarea></td></tr>

	</table>
	</br>
	<input type="submit" value="Create"/>

        </form>





	</div>

	<div id="footer">
		<div class="message">Get involved, help keep the servers running!</div>
<table><tr>

<td>
<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="RQXYSMH52WHUG">
<input id="paypal_logo" type="image" src="images/paypal-logo.png" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>
</td>



<td>

<div >
<img src="images/bitcoin.png" id="bitcoin_logo" />

<div id="addr">
<a href="bitcoin:1A8yxEWen14KbMxvnzDVvDy9DeXFjWxq1Y">1A8yxEWen14KbMxvnzDVvDy9DeXFjWxq1Y</a>
</div>
</div>
</td>	
</tr></table>
	</div>
        </body>


</html>




