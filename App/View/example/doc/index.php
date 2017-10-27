<?php

// Used ob instead of HEREDOC because code highlighting can occur and no issues with single/double quotes

$title = 'Ascend PHP - Documents';

// *** Content *** //
ob_start();
?>
<style>
.doc-header { font-size: 21px; font-weight: bold; }
</style>
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
            <p><a href="#create-first-page">Create First Page</a></p>
            <p><a href="#change-template">Change Template</a></p>
            <p><a href="#create-first-model">Create First Model</a></p>
            <p><a href="#model-seed">Model Seed</a></p>
            <p><a href="#model-easy-access-functions">Model Easy Access Functions</a></p>
            <p><a href="#create-custom-command-line-commands">Create Custom Command Line Commands</a></p>

        </div>
        <div class="col-md-9">

            <div class="row">
                <p><b>* I know I need to format these tutorials better; this was thrown together. Clean up coming soon!</b></p>

                <p><a class="doc-header" name="intro">Intro</a></p>

                <p>Ascend PHP Framework is about taking programmers development to the next level; to Ascend.</p>
                <p>Ascend has been developed to provide similar simplistic development to Laravel but
                    with a slimer base line of code.</p>
                <p>Ascend provides regularily used development requests and automate them for rapid development such as
                    REST API's, permissions for users, and more.</p>

                <p><u>Benchmark</u></p>
                <p>Laravel = 300ish</p>
                <p>Phalcon = 1400ish</p>
                <p>Ascend = 1200ish</p>
                <p>Ascend is 3x faster than Laravel but only slightly less than phalcon</p>
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
                    <li>PHP 5.4+</li>
                    <li>MySQL 5+</li>
                    <li>PHP PDO Extension</li>
                </ul>
            </div>

            <div class="row">
                <p><a class="doc-header" name="install">Install</a></p>
                <p>Read readme.txt</p>
            </div>

            <div class="row">
                <p><a class="doc-header" name="local-dev">Local Development</a></p>
                <p>Run 'php ascend serve'</p>
            </div>

            <div class="row">
                <p><a class="doc-header" name="web-server-apache">Apache Setup</a></p>
                <p>Coming Soon</p>
            </div>

            <div class="row">
                <p><a class="doc-header" name="web-server-nginx">Nginx Setup</a></p>
                <p>Coming Soon</p>
            </div>

            <div class="row">
                <p><a class="doc-header" name="file-structure">File Structure</a></p>
                <p>Folders:</p>
                <ul>
                    <li>App - Stores specific files for this application</li>
                    <li>App/CommandLine - Custom command line classes</li>
                    <li>App/Controller - Middleman which controls data from Models to Views aka Database to Display</li>
                    <li>App/Model - Structure of tables for database and helpful functions</li>
                    <li>App/View - Framework code for content to display to users</li>
                    <li>public - Files for the public to see</li>
                    <li>public/js - Javascript</li>
                    <li>public/css - CSS</li>
                    <li>public/fonts - Fonts</li>
                    <li>storage - Files to be stored</li>
                    <li>storage/cache - Cache files</li>
                    <li>storage/data - Data files</li>
                    <li>storage/log - Log files</li>
                    <li>vendor - Third parties through composer</li>
                </ul>

                <p>Files:</p>
                <ul>
                    <li>App/config.php - Configurations</li>
                    <li>App/config.sample.php - Example Configurations</li>
                    <li>App/route.php - List of routes for applications</li>
                    <li>App/route-examples.php - List of route examples</li>
                    <li>ascend - Command line tools</li>
                </ul>
            </div>

            <div class="row">
                <p><a class="doc-header" name="web-server-nginx">Setup REST API</a></p>
                <p>Coming Soon</p>
            </div>

            <div class="row">
                <p><a class="doc-header" name="command-line">Command Line</a></p>
                <p>In command line run "php ascend" and get help + a list of commands.</p>
                <p>Command: "php ascend db:migrate" to load in database</p>
            </div>

            <div class="row">
                <p><a class="doc-header" name="create-first-page">Create First Page</a></p>
                <ul>
                    <li>Open App/routes.php</li>
                    <li>Go below Route::get('/', 'GuestController@viewIndex');</li>
                    <li>Add Route::get('/', 'GuestController@viewTest');</li>
                    <li>Save App/routes.php</li>
                    <li>Open App/Controller/GuestController.php</li>
                    <li>Create new public function viewTest(){}</li>
                    <li>Inside function viewTest() add return Route::getView('guest/test');</li>
                    <li>Save App/Controller/GuestController.php</li>
                    <li>Create App/View/guest/test.php</li>
                    <li>Open App/View/guest/test.php</li>
                    <li>Start with <?=htmlentities('<?php');?></li>
                    <li>Next $title = 'Title of page in browser window bar';</li>
                    <li>Next ob_start();</li>
                    <li>Next <?=htmlentities('<div class="row">');?> (We use bootstrap by default but can use anything you want)</li>
                    <li>Next <?=htmlentities('<p>Welcome to my first page</p>');?></li>
                    <li>Next <?=htmlentities('</div>');?></li>
                    <li>Next $container = ob_get_contents();</li>
                    <li>Next ob_end_clean();</li>
                    <li>Next ob_start();</li>
                    <li>Next $javascript = ob_get_contents();</li>
                    <li>Next // Javascript goes here</li>
                    <li>Next ob_end_clean();</li>
                    <li>Next require_once '_template.php';</li>
                    <li>Save App/View/guest/test.php</li>
                    <li>Go to [domain]/test</li>
                </ul>
                <p>--> Explained <--</p>
                <ul>
                    <li>First we created a route</li>
                    <li>Next we created a public function in an already existing Controller</li>
                    <li>Inside that function we reference Route class which is a AscendPHP Core library</li>
                    <li>Route class has a static function called getView which goes into the App/View folder and displays</li>
                    <li>So Route::getView('guest/test') references App/View/guest/test.php</li>
                    <li>Next we create the view file guest/test.php</li>
                    <li>Inside guest/test.php we have 3 variables we create; $title, $container, $javascript</li>
                    <li>- All of these are within _template.php so any variables you want to reference can be</li>
                    <li>* Also, I wrapped $container and $javascript in ob... because writing code is like writing it in a php file so if you want to partial it out later</li>
                </ul>
            </div>

            <div class="row">
                <p><a class="doc-header" name="change-template">Change Template</a></p>
                <ul>
                    <li>First, complete Create your first page</li>
                    <li>Next, open App/View/guest/_template.php</li>
                    <li>Above, $container = ob_get_contents(); add echo @$footer;</li>
                    <li>Save App/View/guest/_template.php</li>
                    <li>Open App/View/guest/test.php</li>
                    <li><?=htmlentities('<footer class="footer">');?></li>
                    <li><?=htmlentities('<div class="container">');?></li>
                    <li><?=htmlentities('<span class="text-muted">Place sticky footer content here.</span>');?></li>
                    <li><?=htmlentities('</div>');?></li>
                    <li><?=htmlentities('</footer>');?></li>
                    <li>Save App/View/guest/test.php</li>
                    <li>Go to [domain]/test now should have a footer</li>
                </ul>
            </div>

            <div class="row">
                <p><a class="doc-header" name="create-first-model">Create First Model</a></p>
                <ul>
                    <li>Create file App/Model/Book.php</li>
                    <li><?=htmlentities('<?php');?> namespace App\Model; // Define namespace</li>
                    <li>use Ascend\Bootstrap as BS; // Bootstrap has config variables and other core things</li>
                    <li>use Ascend\Model; // Define Ascend Core Model class</li>
                    <li>class Book extends Models { // All models extend Model class</li>
                    <li>protected $table = 'books'; // Name of table in database</li>
                    <li>protected $fillable = ['book_category_id', 'name', 'is_active']; // Fields access by AscendPHP</li>
                    <li>protected $structure = [ // Structure of fields in database</li>
                    <li>'id' => 'int unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY',</li>
                    <li>'book_category_id' => 'int unsigned NOT NULL',</li>
                    <li>'name' => 'varchar(255) NOT NULL',</li>
                    <li>'is_active' => 'tinyint NOT NULL',</li>
                    <li>];</li>
                    <li>} // End of Book class</li>
                    <li>Save App/Model/Book.php</li>
                    <li>Note: By default created_at, updated_at, deleted_at is added to every model</li>
                    <li>Go to command line and make sure you are at root of framework</li>
                    <li>Note: App, public, storage, vendor should be in this folder</li>
                    <li>Run php ascend db:migrate</li>
                    <li>Note: db:migrate will install models into database and also make alters</li>
                </ul>
            </div>

            <div class="row">
                <p><a class="doc-header" name="model-seed">Model Seed</a></p>
                <ul>
                    <li>Open App/Model/Book.php</li>
                    <li>After protected $table, $fillable, $structure; add protected $seed = [];</li>
                    <li>Inside array of see add model fields with values. Example:</li>
                    <li>protected $seed = [</li>
                    <li>['book_category_id' => 1, 'name' => 'Best Websites', 'is_active' => 1], // 1</li>
                    <li>['book_category_id' => 1, 'name' => 'Best Cook Books', 'is_active' => 1], // 2</li>
                    <li>['book_category_id' => 2, 'name' => 'Best Parks', 'is_active' => 1], // 3</li>
                    <li>];</li>
                    <li>Save App/Model/Book.php</li>
                    <li>Command line run php ascend db:migrate</li>
                </ul>
            </div>

            <div class="row">
                <p><a class="doc-header" name="model-easy-access-functions">Models > Add easy access functions</a></p>
                <ul>
                    <li>Create App/Controller/BookController.php</li>
                    <li><?=htmlentities('<?php');?> namespace App\Controller;</li>
                    <li>use Ascend\Request; // AscendPHP Core for getting Requests aka $_GET / $_POST</li>
                    <li>use Ascend\Route; // AscendPHP Core access routing of files</li>
                    <li>use Ascend\Model\Book; // Reference Book Model</li>
                    <li>class GuestController extends Controller {</li>
                    <li>public function viewBooks() {</li>
                    <li>$rows = Book::all(); // ::all() gets all results no filter check other than deleted_at</li>
                    <li>return Route::getView('book/index', ['books' => $rows]);</li>
                    <li>// Gets view App/View/book/index.php</li>
                    <li>// 2nd parameter is an array of variables to pass to view</li>
                    <li>// Key turns into variable in view by extract() within Route class</li>
                    <li>// Value is the data to pass in</li>
                    <li>}</li>
                    <li>}</li>
                    <li>Save App/Controller/BookController.php</li>
                    <li>Create App/View/book/index.php</li>
                    <li><?=htmlentities('<ul>');?></li>
                    <li><?=htmlentities('<?php foreach ($books AS $book): ?>');?></li>
                    <li><?=htmlentities('<li><?=$book[\'name\'];?></li>');?></li>
                    <li><?=htmlentities('<?php endforeach; ?>');?></li>
                    <li><?=htmlentities('</ul>');?></li>
                    <li>Save App/View/book/index.php</li>
                    <li>Open App/routes.php</li>
                    <li>Route::get('/books', 'BookController@viewBooks');</li>
                    <li>Save App/routes.php</li>
                    <li>Go to [domain]/books</li>
                    <li>Now see a list of books</li>
                </ul>
            </div>

            <div class="row">
                <p><a class="doc-header" name="create-custom-command-line-commands">Create Custom Command Line Commands</a></p>
                <ul>
                    <li>Go to App/CommandLine/AppExample.php and copy as ServerInfo.php</li>
                    <li>Change App/CommandLine/ServerInfo.php class anem to ServerInfov
                    <li>Change protected $command = 'server:info';</li>
                    <li>Change protected $name = 'Get Server Info';</li>
                    <li>Change protected $detail = 'Get Server Info';</li>
                    <li>Go to command line and run php ascend server:info</li>
                    <li>Comment out $cmdArguments and both $this->output... lines</li>
                    <li>Add inside public function run()</li>
                    <li>$this->output('PHP Version: ' . phpversion());</li>
                    <li>Go to command line and run php ascend server:info</li>
                    <li>Also, can set this up on a cronjob to run as often as you like</li>
                </ul>
            </div>

        </div>
    </div>
<?php
$container = ob_get_contents();
ob_end_clean();

// *** Javascript *** //
ob_start();
$javascript = ob_get_contents();
ob_end_clean();

// *** Display Template *** //
$DS = DIRECTORY_SEPARATOR;
require_once PATH_VIEWS . 'example' . $DS .'_template.php';
