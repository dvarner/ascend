#################################################################################
# Website

Go to AcendPHP.com for more information.

#################################################################################
# Install

composer create-project --prefer-dist dvarner/ascendphp . --stability dev
cp App/config.sample.php App/config.php
# In config.php turn on debug = true to see 500 errors
php ascend db:migrate
php ascend permission:manage
php ascend user:create 1 admin [pass] email@email

#################################################################################
# Supports

* PHP 5.4+
* PHP PDO Extension
* MySQL

#################################################################################
# FAQ

Q: Getting a 500 error after running composer create?
A1: Go to App/config.php and change debug = true to see errors.
A2: Do composer install.
A3: Next make sure to copy config.sample.php to config.php
A4: Make sure to have correct database credentials

Q: Ascend\[name] does not exist?
A: As of 10/18/1017 the namespace was updated to Ascend\Core\[name]
Add Core into name space to fix the issue.

Q: BS:: or DB:: does not exist?
A Convert BS:: to Bootstrap:: and DB:: to Database.
Felt the shorthands were a bit much.

# Notes #
* Trait; available as of 5.4+
* json_encode($data, JSON_PRETTY_PRINT); // 5.4+
* Bootstrap::getConfig('name.subname'); // <-- each . goes into a deeper level of array
* $db = Bootstrap::getDB();

#################################################################################
# Benchmark

* ab (apache benchmark)
* phpmatrics
