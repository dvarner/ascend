<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?=@$title ? $title : ''; ?></title>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="container">
    <?=@$container; ?>
</div>

<!-- jQuery -->
<?php /*
 <script src="/js/jquery.js"></script>
 <script src="/js/bootstrap.js"></script>
 */ ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<?php /*
<script src="/js/bootstrap-datetimepicker.js"></script>
<script src="/js/metisMenu.js"></script>
<script src="/js/sb-admin-2.js"></script>
<script src="/js/jquery.ajax-put-delete.js"></script>
<script src="/js/jquery.ascend.form.js"></script>
<script src="/js/jquery.extend.js"></script>
*/

if (isset($script) && is_array($script)) {
    foreach ($script AS $file) {
        echo '<script src="' . $file . '"></script>' . PHP_EOL;
    }
}
?>
<script>
<?=@$javascript ? $javascript : ''; ?>
</script>

</body>

</html>