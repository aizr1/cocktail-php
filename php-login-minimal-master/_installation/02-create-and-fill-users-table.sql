CREATE TABLE IF NOT EXISTS `login`.`nutzer` (
  `nutzer_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'auto incrementing nutzer_id of each nutzer, unique index',
  `nutzer_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT 'nutzer''s name, unique',
  `nutzer_password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'nutzer''s password in salted and hashed format',
  `nutzer_email` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT 'nutzer''s email, unique',
  PRIMARY KEY (`nutzer_id`),
  UNIQUE KEY `nutzer_name` (`nutzer_name`),
  UNIQUE KEY `nutzer_email` (`nutzer_email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='nutzer data';
