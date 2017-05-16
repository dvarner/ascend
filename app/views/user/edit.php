<html>
<head>
<title>User Edit</title>

<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" type="text/css">

</head>
<body>

<div class="container">
	<h2>User Edit</h2>
	
	<form id="formUserEdit" method="put" action="/api/user/<?=$id; ?>">
	  <input type="hidden" name="id" value="<?=$id;?>" />
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
jQuery.each( [ "put", "delete" ], function( i, method ) {
  jQuery[ method ] = function( url, data, callback, type ) {
    if ( jQuery.isFunction( data ) ) {
      type = type || callback;
      callback = data;
      data = undefined;
    }

    return jQuery.ajax({
      url: url,
      type: method,
      dataType: type,
      data: data,
      success: callback
    });
  };
});
$(function(){
	$.get('/api/user/<?=$id; ?>', function(d) {
		$('#inputUserUsername').val(d.username);
	}, 'json');
	$('#formUserEdit').on('submit', function(e) {
		e.preventDefault();
		var ser = $(this).serialize();
		$.put('/api/user/<?=$id;?>', ser, function(d) {
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