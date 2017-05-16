<html>
<head>
<title>User Index</title>

<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" type="text/css">

</head>
<body>

<div class="container">
	<h2>User list (loaded)</h2>
	
	<p><a href="/user/create">Create</a></p>
	<?php /*
	<table class="table">
	<thead>
	<tr>
	<th class="col-md-1">Options</th>
	<th class="col-md-11">User</th>
	</tr>
	</thead>
	<tbody>
	<?php
	foreach ($users AS $user) {
		echo '<tr>';
		echo '<td><a href="/user/' . $user['id'] . '/edit">Edit</a></td>';
		echo '<td>' . $user['username'] . '</td>';
		echo '</tr>';
	}
	?>
	</tbody>
	</table>
	*/ ?>
	
	<h2>User list (ajax)</h2>
	<table class="table">
	<thead>
	<tr>
	<th class="col-md-2">Options</th>
	<th class="col-md-10">User</th>
	</tr>
	</thead>
	<tbody data="user">
	</tbody>
	</table>
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
	$.get('/api/user', function(d) {
		$.each(d, function(i, v) {
			html = '';
			html+= '<tr>';
			html+= '<td>';
				html+= '<div class="col-md-6">';
					html+= '<a href="/user/' + v.id + '/edit">Edit</a>';
				html+= '</div>';
				html+= '<div class="col-md-6">';
					html+= '<form class="formUserDelete" method="delete" action="/api/user/'+ v.id + '">';
					html+= '<input type="hidden" name="id" value="' + v.id + '" />';
					html+= '<input type="submit" value="Delete" />';
					html+= '</form>';
				html+= '</div>';
			html+= '</td>';
			html+= '<td>' + v.username + '</td>';
			html+= '</tr>';
			$('[data=user]').append(html);
		});
	}, 'json');

	$('[data=user]').on('submit', '.formUserDelete', function(e) {
		e.preventDefault();
		var id = $(this).find('[name=id]').val();
		$.delete('/api/user/' + id, function(d) {
			// @todo catch success/failed status and do stuff
			// if (d.status == 'success') {
				document.location = "/user";
			/*} else {
				console.log(d);
			}*/
		}, 'json');
	});
});
</script>

</body>
</html>