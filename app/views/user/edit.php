<?php

// Used ob instead of HEREDOC because code highlighting can occur and no issues with single/double quotes

$title = 'User Edit';

// *** Content *** //
ob_start();
$content = ob_get_contents();
?>
	<h2>User Edit</h2>
	
	<form id="formEdit" method="put" action="/api/user/<?=$id; ?>">
	  <input type="hidden" name="id" value="<?=$id;?>" />
	  <div class="form-group">
		<label for="inputUsername">Username</label>
		<input type="text" class="form-control" id="inputUsername" name="username" placeholder="Username" />
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
    afUser.formEdit();

});
<?php
$javascript = ob_get_contents();
ob_end_clean();

// *** Display Template *** //
require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR .'_template.php';