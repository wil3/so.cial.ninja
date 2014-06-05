
<html>

        <head>

<script src="//code.jquery.com/jquery-1.9.1.min.js"></script>
<script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>

<script src="https://raw.githubusercontent.com/malsup/form/master/jquery.form.js"></script>

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
<style>
	#page {
	
	}
	.hd {

		text-align:center;
	}
	#generated {
		text-align:center;
		padding-bottom:20px;
		padding-top:20px;
	}
	#generated input {

		font-size:20px;
	}
	.not_generated {

	}
	form {
		width:500px;
		margin-left:auto;
		margin-right:auto;

	}
	#page input, #page textarea, #page select {
		width:500px;
	}
	#page table {

		width:100%;
	}
	td {

		padding-bottom:10px;
	}
	.error {
		white-space:nowrap;
		color: red;
	}
</style>

</head>

        <body>

	<div id="page">

	<div class="hd">

		Generate custom preview links for social media.

	</div>	
	<div id="generated" >
		<input id="gen_url" placeholder="Generated link will display here" type="text" readonly />
	</div>


        <form id="new_link">

	<table>
	
	<tr><td><input name="url" type="text" placeholder="Target URL"/></td><td><span class="status"><span></span></span></td></tr>

	</table>
	
	<h3>Facebook</h3>

	<table>
	
	<tr><td><input  name="title" type="text" placeholder="Title" /></td><td><span class="status"><span></span></span></td></tr>
	
	<tr><td><select name="obj_type">
			<option value="website">Website</a>
			<option value="profile">Profile</a>
			<option value="book">Book</a>
			<option value="article">Article</a>
			<option value="video.movie">Movie</a>
			<option value="video.episode">Episode</a>
			<option value="video.tv_show">TV Show</a>
			<option value="video.other">Other video</a>
			<option value="music.song">Song</a>
			<option value="music.album">Album</a>
			<option value="music.playlist">Playlist</a>
			<option value="music.radio_station">Radio Station</a>
		</select></td></tr>
	
	<tr><td><input name="image" type="text" placeholder="Image URL" /></td><td><span class="status"><span></span></span></td></tr>
	

	<tr><td><textarea name="description" placeholder="Description (Optional)"></textarea></td></tr>

	</table>
	</br>
	<input type="submit" value="Create"/>

        </form>


</div>
        </body>


</html>




