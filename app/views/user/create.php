<?php

// Used ob instead of HEREDOC because code highlighting can occur and no issues with single/double quotes

$title = 'User Create';

ob_start();
?>
	<h2>User Create</h2>
	
	<form id="formUserAdd" method="post" action="/api/user">
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
<?php
$javascript = ob_get_contents();
ob_end_clean();

require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR .'_template.php';
