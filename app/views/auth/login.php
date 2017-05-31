<?php

// Used ob instead of HEREDOC because code highlighting can occur and no issues with single/double quotes

$title = 'Login';

ob_start();
?>
<form method="post" action="/api/auth/login">
  <div class="form-group">
    <label for="inputEmail">Email</label>
    <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Email">
  </div>
  <div class="form-group">
    <label for="inputPassword">Password</label>
    <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Password">
  </div>
  <button type="submit" class="btn btn-default">Login</button>
</form>
<p><a href="/register">Not a Member?</a></p>
<p><a href="/forgot">Forgot Password</a></p>
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

require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR .'_template.php';
