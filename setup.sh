#rm -rf .g*
#rm -rf *
composer create-project --prefer-dist dvarner/ascendphp . --stability dev
chmod -R 777 storage/
chmod 755 storage/
cp App/config.sample.php App/config.php
# make config.php changes then run the following
#php ascend sql:migrate
# delete this file