<html>
<head>
<title><?=@$title ? $title : ''; ?></title>

<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" type="text/css">

</head>
<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
	<div class="navbar-header">
	  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
		<span class="sr-only">Toggle navigation</span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
	  </button>
	  <a class="navbar-brand" href="#">Acend</a>
	</div>
	<div id="navbar" class="collapse navbar-collapse">
	  <ul class="nav navbar-nav">
		<li class="active"><a href="#">Home</a></li>
	  </ul>
	</div><!--/.nav-collapse -->
  </div>
</nav>

<div style="padding:40px;"></div>

<div class="container">
	<?=$container ? $container : '' ;?>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
<?=@$javascript ? $javascript : ''; ?>
</script>

</body>
</html>