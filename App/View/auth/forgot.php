<?php

// Used ob instead of HEREDOC because code highlighting can occur and no issues with single/double quotes

$title = 'Forgot';

ob_start();
?>
<form>
  <div class="form-group">
    <label for="inputEmail">Email</label>
    <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Email">
  </div>
  <button type="submit" class="btn btn-default">Forgot Password</button>
</form>
<?php
$container = ob_get_contents();
ob_end_clean();
ob_start();
?>
$(function(){

});
<?php
$javascript = ob_get_contents();
ob_end_clean();

require_once __DIR__ . DIRECTORY_SEPARATOR;
