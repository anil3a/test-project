<html>
<head>
<title>Get Twitter Feed</title>
<script type="text/javascript" src="jquery-2.1.1.min.js"></script>
</head>
<body style="width:960px; margin:0 auto; padding: 40px;">

<input type="text" name="username" class="username" placeholder="write your twitter username" value="TheNextWeb" autofocus="autofocus"">
<select name="number" class="number">
	<option value="3">3</option>
	<option value="5">5</option>
	<option value="7">7</option>
	<option value="10">10</option>
</select>
<button name="feeder" id="getfeed">Get Feed</button>

<script type="text/javascript">

$("#getfeed").click( function() { 
	var username;
	username	= $(".username").val();
	number		= $(".number").val();
	if( username.length < 1 )
	{
		alert("Please enter your username");
	}
	else {
		//$( ".result" ).html(username);
		
		$.get( "twitter.php?username="+username+"&number="+number, function( data ) {
			  $( ".result" ).html(data);
			  //alert( "Load was performed." );
		});

		
	}
})


</script>

<br style="clear: both;">
<br>

<div class="result"></div>

</body>
</html>