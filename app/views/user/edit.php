<?php

// Used ob instead of HEREDOC because code highlighting can occur and no issues with single/double quotes

$title = 'User Edit';

ob_start();
$content = ob_get_contents();
?>
	<h2>User Edit</h2>
	
	<form id="formUserEdit" method="put" action="/api/user/<?=$id; ?>">
	  <input type="hidden" name="id" value="<?=$id;?>" />
	  <div class="form-group">
		<label for="inputUserUsername">Username</label>
		<input type="text" class="form-control" id="inputUserUsername" name="username" placeholder="Username" />
	  </div>
	  <button type="submit" class="btn btn-default">Submit</button>
	</form>
<?php
$container = ob_get_contents();
ob_end_clean();
ob_start();
?>
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
<?php
$javascript = ob_get_contents();
ob_end_clean();

require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR .'_template.php';