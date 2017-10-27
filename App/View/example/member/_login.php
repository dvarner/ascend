<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?=@$title ? $title : ''; ?></title>
<link href="/css/bootstrap.css" rel="stylesheet">
<link href="/css/metisMenu.css" rel="stylesheet">
<link href="/css/sb-admin-2.css" rel="stylesheet">
<link href="/css/font-awesome.css" rel="stylesheet" type="text/css">
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Sign In</h3>
                    </div>
                    <div class="panel-body">
                        <div id="alert-success" class="alert alert-success" role="alert"></div>
                        <div id="alert-error" class="alert alert-danger" role="alert"></div>
                        <form role="form" action="/api/auth/login" method="post">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                </div>
                                <?php /*<div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div>*/ ?>
                                <!-- Change this to a button or input when using this as a form -->
                                <button class="btn btn-lg btn-success btn-block">Login</button>
                            </fieldset>
                        </form>
                        <br />
                        <p><a href="register">Register</a></p>
                        <p><a href="forgot">Forgot Password</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- jQuery -->
<script src="/js/jquery.js"></script>
<script src="/js/bootstrap.js"></script>
<script src="/js/metisMenu.js"></script>
<script src="/js/sb-admin-2.js"></script>
<script src="/js/jquery.ajax-put-delete.js"></script>
<script src="/js/jquery.ascend.form.js"></script>
<?php
if (isset($script) && is_array($script)) {
    foreach ($script AS $file) {
        echo '<script src="' . $file . '"></script>' . PHP_EOL;
    }
}
?>
<script>
$(function() {
    $('#alert-success').hide();
    $('#alert-error').hide();
    $('form').on('submit', function (e) {
        var t = $(this);
        e.preventDefault();
        var ser = $(this).serialize();
        $.post(t.attr('action'), ser, function (d) {
            htm = '';
            if (d.success) {
                htm += 'Login successful! Redirect in 1 seconds!';
                $('#alert-success').html(htm);

                $('#alert-success').show();
                $('#alert-error').hide();

                setTimeout(function () {
                    window.location.href = '/examples/member/area';
                }, 1000); // 3 seconds
            }
            if (d.error) {
                $.each(d.error, function (i, v) {
                    htm += v + '<br />';
                });
                $('#alert-error').html(htm);

                $('#alert-success').hide();
                $('#alert-error').show();
            }
        }, 'json');
    });
});
</script>

</body>

</html>