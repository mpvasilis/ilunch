##############################################
# UPDATE FOR REVISION $example               #
##############################################
UPDATE `settings` SET value = 3 WHERE name = 'sarantis';

#update revision number $example
UPDATE `settings` SET value = $example WHERE name = 'DATABASE_REVISION';
##############################################
# END UPDATE FOR REVISION $example           #
##############################################