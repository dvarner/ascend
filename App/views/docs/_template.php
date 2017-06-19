<html>
<head>
<title>Ascend PHP Framework - Documents</title>

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
            <p><a href="#focus">Focus</a></p>
			<p><a href="#repos">Repos</a></p>
			<p><a href="#min-req">Minimum Requirements</a></p>
			<p><a href="#install">Install</a></p>
            <p><a href="#config-option">Configuration Options</a></p>
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

                <p><u>Benchmark</u></p>
                <p>Laravel = 300ish</p>
                <p>Ascend = 1200ish</p>
                <p>Phalcon = 1400ish</p>
                <p>Ascend speed tested as 3x Laravel but only slightly less in speed than Phalcon</p>
            </div>

            <div class="row">
                <p><a class="doc-header" name="focus">Focus</a></p>
                <p>Ascend's focus:</p>
                <ol>
                    <li>Slim up the framework where there are as few dependencies as possible</li>
                    <li>KISS aka Keep It Simple Stupid and similar to Laravel's routes, eloqent, and command line tool</li>
                    <li>Automate as much as possible from migrations to rest api to launching a website quickly</li>
                </ol>
                <p><u>Slim it Up</u></p>
                <p>
                    Bring back from the dead the minimalistic approach to dependencies.
                    Dependencies are not evil but they can bloat, complicated, and be over used.
                    Ascend has no issues with using dependencies as you see with PDO, Twig, etc but Ascend does not want
                     to require them unless necessary but does not mine them being option.
                </p>
                <p><u>KISS with similarities</u></p>
                <p>
                    KISS; Keep It Simple Stupid. Lets come back to fewer layers of code and dependencies and
                     just allow us to write code but with minimal backend to over burden the system.
                    Also, by bringing in some similar framework features we can make transition easier and
                     continue to bring the ease of development.
                </p>
                <p><u>Automated, Automate, Automate</u></p>
                <p>
                    Keeping it simple for programmers to replicated work and continue to develop is key.
                    Part of Ascend is a command line tool for auto creating the rest api process.
                    Another part is the ability to easily migrate the framework itself from PHP 5 to PHP 7
                     and to migrate from other frameworks to Ascend.
                    Migrating from other frameworks to Ascend is tricky request so this is a likable goal but
                     will have to be reviewed on how much can be done.
                </p>
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
                    <li>Composer</li>
				</ul>
                <p>Eventually there will be a PHP 5.2+ and a 7+ version for easy migration.</p>
			</div>
			
			<div class="row">
				<p><a class="doc-header" name="install">Install</a></p>

                <p>Install composer</p>
                <p>Run 'composer create-project --prefer-dist dvarner/ascendphp ascend'</p>
                <p>Run 'cp app/config.sample.php app/config.php'</p>
                <p>Update app/config.php settings</p>
                <p>chmod 0775 public</p>
                <p>chmod 0644 public/index.php</p>
            </div>

            <div class="row">
                <p><a class="doc-header" name="config-options">Configuration Options</a></p>

                <p><b>Required Variables</b></p>
                <p>debug = false; Debug is turned off.</p>
                <p>debug = true; Debug basics is turned off but not advanced</p>
                <p>dev = true|false; In development mode or not</p>
                <p>https = true|false; URL secure or not</p>
                <p>lock = true|false; Turns on HTTP authentication headers; mostly for locking a site but allowing only specific access</p>
                <p>maint = true|false; Displays maintenance page aka /app/view/maint.php if true</p>
                <p>domain: Domain of with WITHOUT www</p>
                <p>timezone: UTC; Default timezone of site</p>
                <br />
                <p><b>Optional Variables</b></p>
                <p>db: If exist expects to connect to a database</p>
                <p>debug.validation = true; Additional variable in json output called debug</p>
                <p>debug.script_runtime = true; Shows script execute time</p>
                <p>*** lock.user, lock.pass: If these are set then lock is active and a HTTP auth is required</p>
                <p>password_cost: Calculates encryption value for server; run php ascend password:cost to get value</p>
                <p>role.default: If using permissions system required for default role when user is on the site</p>
                <p>set_time_out: Overwrite site timeout period in seconds</p>

                <p>*** upload.path, upload.max, upload.types: NOT FUNCTIONAL</p>
                <p>*** robotstxt: NOT FUNCTIONAL</p>

                <p>*** <-- This means need to updated to this format from previous format</p>

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
                    <li>app/commandline - Application specific command line scripts in php ascend [script]</li>
                    <li>app/controllers - Controllers specific to application</li>
                    <li>app/models - Models specific to application</li>
                    <li>app/views - Views specific to application</li>
					<li>fw - Files specific to framework core "Never should be changed"</li>
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
                    <li>app/config.php - Configurations created from config.sample.php</li>
					<li>app/route.php - List of routes for applications</li>
                    <li>ascend - Command line tools</li>
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