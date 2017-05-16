#################################################################################
# Supports

* PHP 5.2+
* MySQL

#################################################################################
# Not Supported

* Trait; would used but only available as of 5.4+
* json_encode($data, JSON_PRETTY_PRINT); // 5.4+

#################################################################################
# Start builtin php web server for dev

* \projects\php7\php -S localhost:8080 bootstrap.php

#################################################################################
# Composer

* \projects\php7\php composer.phar [command]

#################################################################################
# Setup Framework

* copy config.stample.php to config.php and setup fields
* run composer install

#################################################################################
# Framework Structure

# Folders
* app - Stores specific files for this application
* fw - Files specific to framework core
* fw/commandline - Files that run the core of commandline
* fw/feature - Files to run additional features for framework like user permissions, sessions, etc
* public - Files for the public to see
* storage - Files to be stored
* storage/cache - Cache files
* storage/data - Data files
* storage/log - Log files
* vendor - Third parties through composer

# Files
app/route.php - List of routes for applications
ascend - Command line tools
config.php - Configurations

#################################################################################
# Get config variables

* BS::getConfig('name.subname'); // <-- each . goes into a deeper level of array

#################################################################################
# Get singelton db connection

* $db = BS::getDB();

#################################################################################
# Command line

php ascend 				# get list of commands and help
php ascend db:migration # runs migrationss

#################################################################################
# Conversion to Laravel (Later from Laravel)

	// htmlList = view ? doesnt exist in laravel
	// get = index
	// viewCreate = create
	// post = store
	// getOne = show
	// viewEdit = edit
	// put = update
	// delete = destroy

* config.php array to .env format
* Move api/views to resource/views
* Route::rest( change to Route::resource(
* * Write a converter from out rest structure to laravel resource structure
* rest api change all delete to destroy
* BS::getDB to DB ?

#################################################################################
# Benchmark

* ab (apache benchmark)
* phpmatrics
