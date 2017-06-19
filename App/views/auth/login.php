<?php

// Used ob instead of HEREDOC because code highlighting can occur and no issues with single/double quotes

$title = 'Login';

ob_start();
?>
<div id="alert-success" class="alert alert-success" role="alert"></div>
<div id="alert-error" class="alert alert-danger" role="alert"></div>
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
    $('#alert-success').hide();
    $('#alert-error').hide();
    $('form').on('submit', function(e) {
        var t = $(this);
        e.preventDefault();
        var ser = $(this).serialize();
        $.post(t.attr('action'), ser, function(d) {
            htm = '';
            if (d.success) {
                htm += 'Login successful! Redirect in 3 seconds!';
                $('#alert-success').html(htm);

                $('#alert-success').show();
                $('#alert-error').hide();

                setTimeout(function () {
                    window.location.href = '/lobby/index';
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
