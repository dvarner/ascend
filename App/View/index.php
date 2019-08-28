<div class="row">
    <div class="col-md-3">
        <p><a href="#intro">Intro</a></p>
        <p><a href="#respos">Repos</a></p>
        <p><a href="#min-req">Minimum Requirements</a></p>
        <p><a href="#install">Install</a></p>
        <p><a href="#file-structure">File Structure</a></p>
        <p><a href="#routes">How to Route</a></p>
    </div>
    <div class="col-md-9 text-left">
        <div class="card">
            <div class="card-header">
                <a class="doc-header" name="intro">Intro</a>
            </div>
            <div class="card-body">
                <p>Ascend PHP Framework is about Ascending developers to simpler development with optimized speeds.</p>
                <p>Ascend has been developed to provide similar simplistic development to other frameworks but
                    with more optimized code base.</p>
                <p>Ascend PHP Framework also focus on not just building out a framework but providing tools to
                    easily develop CMS aka Content Management System through REST features, Authorization, Permissions, etc.</p>
            </div>
        </div>
        <br />
        <div class="card">
            <div class="card-header">
                <a class="doc-header" name="respos">Repos</a>
            </div>
            <div class="card-body">
                <p><a href="https://packagist.org/packages/dvarner/ascendphp">https://packagist.org/packages/dvarner/ascendphp</a></p>
                <p><a href="https://github.com/dvarner/ascendphp">https://github.com/dvarner/ascendphp</a></p>
            </div>
        </div>
        <br />
        <div class="card">
            <div class="card-header">
                <a class="doc-header" name="min-req">Minimum Requirements</a>
            </div>
            <div class="card-body">
                <p>Requires:</p>
                <ul>
                    <li>PHP 5.6+</li>
                    <li>MySQL 5.5+</li>
                    <li>PHP PDO Extension</li>
                </ul>
            </div>
        </div>
        <br />
        <div class="card">
            <div class="card-header">
                <a class="doc-header" name="install">Install</a>
            </div>
            <div class="card-body">
                <p>Follow AscendPHP readme and AscendPHP-Core is the composer package which has the core files</p>
            </div>
        </div>
        <br />
        <div class="card">
            <div class="card-header">
                <a class="doc-header" name="file-structure">File Structure</a>
            </div>
            <div class="card-body">
                <p>Folders:</p>
                <ul>
                    <li>App - Stores specific files for this application</li>
                    <li>App/CommandLine - Custom command line classes</li>
                    <li>App/Controller - Middleman which controls data from Models to Views aka Database to Display</li>
                    <li>App/Model - Structure of tables for database and all sql calls in function form</li>
                    <li>App/View - Framework code for content to display to users and/or public</li>
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
                    <li>App/routes.php - List of routes for applications</li>
                    <li>php ascend - Command line tools</li>
                </ul>
            </div>
        </div>
        <br />
        <div class="card">
            <div class="card-header">
                <a class="doc-header" name="routes">How to Routes</a>
            </div>
            <div class="card-body">
                <p>Ok, to get started with routes you must open App/routes.php.</p>
                <p>Once you have the file open, there are a few things to keep in mind.</p>
                <p>First, the two "use" at the top are required at all times to make the page work.</p>
                <p>Lets go over what those are:</p>
                <p>Route -> is used to call all your routes; pretty self explanitory.</p>
                <p>SiteLog -> logs every action on the site. As you see its a model.</p>
                <p>Next, SiteLog::insertUri() is the action which does the logging.
                  If you choose you do not want to log every action to the site then comment this out.
                  The use behind this is to build your own user stats for the site.</p>
                <p>Then, there is Route::display404().
                    This should always be at the end of the script so a 404 is displayed to the user if no pages are called.
                    So basically the way Route:: works is it goes through every one like if statements until it finds a match then executes and dies.
                </p>
                <p>So now lets look at the current route we have: Route::view('/','Page','viewIndex');</p>
                <p>Route::view('/','Page','viewIndex'); // Has 3 parts; "/" which is the uri it matches after the domain.com"/".</p>
                <p>The "Page" which is the Controller inside App/Controller folder.</p>
                <p>Then, "viewIndex" which is the static function inside the "Page" Controller.</p>
                <p>**Keep in mind all classes and functions in routes are case sensitive.</p>
                <br />
                <p>To get started, lets created a duplicate route to Controller Page and static function viewIndex.</p>
                <p>Route::view('/test','Page','viewIndex');</p>
                <p>Now type "your-domain.com/test" the above will route to the same page as the index.</p>
                <p>Lets say we want the route to return as a json.</p>
                <p>Route::json('/test','Page','viewIndex');</p>
                <p>GET Method: Just example</p>
                <p>Route::get('/test','Page','getUser');</p>
                <p>POST Method: Just example</p>
                <p>Route::post('/test','Page','postUser');</p>
                <p>PUT Method: Just example</p>
                <p>Route::put('/test','Page','putUser');</p>
                <p>DELETE Method: Just example</p>
                <p>Route::delete('/test','Page','deleteUser');</p>
                <p>REST Method: (UNDER CONSTRUCTION)</p>
                <p>Route::rest('/test','Page','restUser');</p>
            </div>
        </div>

    </div>
</div>