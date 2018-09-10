##############################################
# UPDATE FOR REVISION $example               #
##############################################
UPDATE `settings` SET value = 3 WHERE name = 'sarantis';

#update revision number $example
UPDATE `settings` SET value = $example WHERE name = 'DATABASE_REVISION';
##############################################
# END UPDATE FOR REVISION $example           #
##############################################

##############################################
# UPDATE FOR REVISION $example               #
##############################################
ALTER TABLE `students` CHANGE `photo` `photo` VARCHAR(75) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'profilePlaceholder.jpg';

#update revision number $example
UPDATE `settings` SET value = 3 WHERE name = 'DATABASE_REVISION';
##############################################
# END UPDATE FOR REVISION $example           #
##############################################