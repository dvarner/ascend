#################################################################################
# Website

Go to AscendPHP.com for more information.

#################################################################################
# Install

## PHP Enabled allow_url_fopen
composer create-project --prefer-dist dvarner/ascendphp . --stability dev
## PHP Disabled (Shared hosting mostly)
php -d allow_url_fopen=on ../composer.phar create -project --prefer-dist dvarner/ascendphp . --stability dev
## Continue
chmod -R 777 storage/
chmod 755 storage/
cp App/config.sample.php App/config.php
# In config.php turn on debug = true to see 500 errors
#php ascend sql:migrate
## currently not a thing in the new version; but reimplemented later
#php ascend permission:manage
#php ascend user:create 1 admin [pass] email@email.com

#################################################################################
# Supports

* PHP 5.6 (Eventually 7.0+)
* PHP PDO Extension
* MySQL

#################################################################################
# FAQ

Q: Getting a 500 error after running composer create?
A1: Do composer install.
A2: Make sure permissions have properly been set on /storage/ folder
A3: Next make sure to copy config.sample.php to config.php and filled out the variables
A4: Make sure to have correct database credentials

#################################################################################
# Setup a Cron (currently not implemented)
php /path-to-root-of-ascendphp-framework/bootstrap_cron.php > /dev/null 2>&1
