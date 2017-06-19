<?php

// Used ob instead of HEREDOC because code highlighting can occur and no issues with single/double quotes

$title = 'User Create';

// *** Content *** //
ob_start();
?>
	<h2>User Create</h2>
	
	<form id="formAdd" method="post" action="/api/user">
	  <div class="form-group">
		<label for="inputUserUsername">Username</label>
		<input type="text" class="form-control" id="inputUserUsername" name="username" placeholder="Username" />
	  </div>
	  <button type="submit" class="btn btn-default">Submit</button>
	</form>
<?php
$container = ob_get_contents();
ob_end_clean();

// *** Javascript *** //
ob_start();
?>
$(function() {

    var afUser = ascendForm('User');
    afUser.formCreate();

});
<?php
$javascript = ob_get_contents();
ob_end_clean();

// *** Display Template *** //
require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR .'_template.php';
