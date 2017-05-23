<?php

// Used ob instead of HEREDOC because code highlighting can occur and no issues with single/double quotes

$title = 'Register';

ob_start();
?>
<div id="alert-success" class="alert alert-success" role="alert"></div>
<div id="alert-error" class="alert alert-danger" role="alert"></div>
<form method="post" action="/api/auth/register">
  <div class="form-group">
    <label for="inputEmail">Email</label>
    <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Email">
  </div>
  <div class="form-group">
    <label for="inputUser">Username</label>
    <input type="text" class="form-control" id="inputUser" name="username" placeholder="Username">
  </div>
  <div class="form-group">
    <label for="inputPassword">Password</label>
    <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Password">
  </div>
  <div class="checkbox">
    <label>
      <input type="checkbox" name="tos"> TOS
    </label>
  </div>
  <button type="submit" class="btn btn-default">Register</button>
</form>
<p><a href="/login">Already a Member?</a></p>
<?php
$container = ob_get_contents();
ob_end_clean();
ob_start();
?>
$(function(){
    $('#alert-success').hide();
    $('#alert-error').hide();
    $('form').on('submit', function(e) {
        var t = $(this);
        e.preventDefault();
        var ser = $(this).serialize();
        $.post(t.attr('action'), ser, function(d) {
            htm = '';
            if (d.success) {
                htm += 'Registration successful! Redirect in 3 seconds!';
                $('#alert-success').html(htm);

                $('#alert-success').show();
                $('#alert-error').hide();

                setTimeout(function () {
                    window.location.href = '/login';
                }, 3000); // 3 seconds
            }
            if (d.error) {
                $.each(d.error, function(i, v) {
                    htm += v + '<br />';
                });
                $('#alert-error').html(htm);

                $('#alert-success').hide();
                $('#alert-error').show();
            }
        }, 'json');
    });
});
<?php
$javascript = ob_get_contents();
ob_end_clean();

require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR .'_template.php';