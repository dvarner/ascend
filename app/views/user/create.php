<html>
<head>
<title>User Create</title>

<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" type="text/css">

</head>
<body>

<div class="container">
	<h2>User Create</h2>
	
	<form id="formUserAdd" method="post" action="/api/user">
	  <div class="form-group">
		<label for="inputUserUsername">Username</label>
		<input type="text" class="form-control" id="inputUserUsername" name="username" placeholder="Username" />
	  </div>
	  <button type="submit" class="btn btn-default">Submit</button>
	</form>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>
$(function(){
	$('#formUserAdd').on('submit', function(e) {
		e.preventDefault();
		var ser = $(this).serialize();
		$.post('/api/user', ser, function(d) {
			// @todo catch success/failed status and do stuff
			if (d.status == 'success') {
				document.location = "/user";
			} else {
				console.log(d);
			}
		}, 'json');
	});
});
</script>

</body>
</html>