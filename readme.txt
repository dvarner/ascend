#################################################################################
# Website

Go to AcendPHP.com for more information.

#################################################################################
# Install

composer create-project --prefer-dist dvarner/ascendphp . --stability dev
composer install

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

Q: Getting a 500 error after running compuser create?
A: Do composer install


