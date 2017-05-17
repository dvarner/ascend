<html>
<head>
<title>Ascend PHP - Documents</title>

<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" type="text/css">

<style>
.doc-header { font-size: 18px; font-weight: bold; }
</style>

</head>
<body>

<div class="container">
	<h2>Ascend PHP - Documents</h2>
	
	<div class="row">
		<div class="col-md-3">
			
			<p><a href="#intro">Intro</a></p>
			<p><a href="#repos">Repos</a></p>
			<p><a href="#min-req">Minimum Requirements</a></p>
			<p><a href="#install">Install</a></p>
			<p><a href="#local-dev">Local Development</a></p>
			<p><a href="#web-server-apache">Setup Web Server - Apache</a></p>
			<p><a href="#web-server-nginx">Setup Web Server - Nginx</a></p>
			<p><a href="#file-structure">File Structure</a></p>
			<p><a href="#command-line">Command Line</a></p>
			
		</div>
		<div class="col-md-9">
			
			<div class="row">
				<p><a class="doc-header" name="intro">Intro</a></p>
				
				<p>Ascend PHP Framework is about taking programmers development to the next level; to Ascend.</p>
				<p>Ascend has been developed to provide similar simplistic development to Laravel but
				 with a slimer base line of code.</p>
				<p>Ascend provides regularily used development requests and automate them for rapid development such as
				 REST API's, permissions for users, and more.</p>
				<p>Ascend eventually wants to make conversions for moving to and from frameworks as easy as possible.</p>
				
				<p><u>Benchmark</u></p>
				<p>Laravel = 300ish</p>
				<p>Phalcon = 1400ish</p>
				<p>Ascend = 1200ish</p>
				<p>Ascend speed tested as 3x Laravel but only slightly less in speed than phalcon</p>
			</div>
			
			<div class="row">
				<p><a class="doc-header" name="repos">Repos</a></p>
				<p><a href="https://packagist.org/packages/dvarner/ascendphp">https://packagist.org/packages/dvarner/ascendphp</a></p>
				<p><a href="https://github.com/dvarner/ascendphp">https://github.com/dvarner/ascendphp</a></p>
				<br />
				
			</div>
			
			<div class="row">
				<p><a class="doc-header" name="min-req">Minimum Requirements</a></p>
				<p>Requires:</p>
				<ul>
					<li>PHP 5.2+</li>
					<li>MySQL 5+</li>
					<li>PHP PDO Extension</li>
				</ul>
			</div>
			
			<div class="row">
				<p><a class="doc-header" name="install">Install</a></p>
				<p>Run 'composer global require "dvarner/ascendphp"'</p>
				<p>Run 'composer require "dvarner/ascendphp"'</p>
				<p>Run 'composer create-project --prefer-dist dvarner/ascendphp website'</p>
			</div>
			
			<div class="row">
				<p><a class="doc-header" name="local-dev">Local Development</a></p>
				<p>Run 'php ascend serve'</p>
			</div>
			
			<div class="row">
				<p><a class="doc-header" name="web-server-apache">Apache Setup</a></p>
				<p>...</p>
			</div>
			
			<div class="row">
				<p><a class="doc-header" name="web-server-nginx">Nginx Setup</a></p>
				<p>...</p>
			</div>
			
			<div class="row">
				<p><a class="doc-header" name="file-structure">File Structure</a></p>
				<p>Folders:</p>
				<ul>
					<li>app - Stores specific files for this application</li>
					<li>fw - Files specific to framework core</li>
					<li>fw/commandline - Files that run the core of commandline</li>
					<li>fw/feature - Files to run additional features for framework like user permissions, sessions, etc</li>
					<li>public - Files for the public to see</li>
					<li>storage - Files to be stored</li>
					<li>storage/cache - Cache files</li>
					<li>storage/data - Data files</li>
					<li>storage/log - Log files</li>
					<li>vendor - Third parties through composer</li>
				</ul>

				<p>Files:</p>
				<ul>
					<li>app/route.php - List of routes for applications</li>
					<li>ascend - Command line tools</li>
					<li>config.php - Configurations</li>
				</ul>

				</p>
			</div>
			
			<div class="row">
				<p><a class="doc-header" name="web-server-nginx">Setup REST API</a></p>
				<ul>
					<li>Create a Route in route.php "Route::rest('Book', 'BookController');"</li>
					<li>Create a Controller in app/controllers/BookController.php</li>
					<ul>
						<li>Setup namespace</li>
						<li>Setup class BookController extends Controller</li>
						<li>Setup __construct() function</li>
						<li>Add $this->setModel('book'); inside __construct()</li>
					</ul>
					<li>Create a Model in app/models/Book.php</li>
					<ul>
						<li>Setup namespace</li>
						<li>Setup Use Model</li>
						<li>Setup Class Book extends Model</li>
						<li>Add protected $table = 'book';</li>
						<li>Add public $timestamps = true;</li>
						<li>Add protected $fillable = array();</li>
						<li>Add protected $guarded = array();</li>
						<li>Add protected $structure = array();</li>
						<ul>
							<li>'id'		=> 'int unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY',</li>
							<li>'name' 	=> 'varchar(255) NOT NULL',</li>
						</ul>
					</ul>
				</ul>
			</div>
			
			<div class="row">
				<p><a class="doc-header" name="command-line">Command Line</a></p>
				<p>In command line run "php ascend" and get help + a list of commands.</p>
				<p>Command: "php ascend db:migrate" to load in database</p>
			</div>
			
		</div>
	</div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>
jQuery.each( [ "put", "delete" ], function( i, method ) {
  jQuery[ method ] = function( url, data, callback, type ) {
    if ( jQuery.isFunction( data ) ) {
      type = type || callback;
      callback = data;
      data = undefined;
    }

    return jQuery.ajax({
      url: url,
      type: method,
      dataType: type,
      data: data,
      success: callback
    });
  };
});
$(function(){
});
</script>

</body>
</html>