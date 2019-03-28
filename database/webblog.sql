CREATE TABLE `webblog` (
  `id` INTEGER(11) NOT NULL AUTO_INCREMENT,
  `user` VARCHAR(100) COLLATE latin1_swedish_ci DEFAULT NULL,
  `title` VARCHAR(255) COLLATE latin1_swedish_ci DEFAULT NULL,
  `content` TEXT COLLATE latin1_swedish_ci,
  `image` VARCHAR(255) COLLATE latin1_swedish_ci DEFAULT NULL,
  `status` VARCHAR(31) COLLATE latin1_swedish_ci DEFAULT NULL,
  `created_at` TIMESTAMP NULL NOT NULL,
  `updated_at` TIMESTAMP NULL NOT NULL,
  PRIMARY KEY USING BTREE (`id`) COMMENT ''
)ENGINE=InnoDB
AUTO_INCREMENT=4 AVG_ROW_LENGTH=5461 ROW_FORMAT=DYNAMIC CHARACTER SET 'latin1' COLLATE 'latin1_swedish_ci'
COMMENT=''
;
COMMIT;

/* Data for the 'webblog' table  (Records 1 - 3) */

INSERT INTO `webblog` (`id`, `user`, `title`, `content`, `image`, `status`, `created_at`, `updated_at`) VALUES
  (1, 'Admin', 'Training for first aid', 'We provide training for our health workers about basic life support. This training covers the procedure for resusciting pulse and heart, the way to handling unconscious patient, handling of patients that have an increased animal bits, handling of patient who have an injury that cause by the fuel or fire.', 'images/img-blog-1.jpg', 'Online', '2019-03-28 05:54:00', '2019-03-28 05:54:00'),
  (2, 'Admin', 'Free Medical Check-Up', 'We provide free medical check-up services in covering vital signs check, blood sugar check, cholesterol check, uric acid check and eyes check.', 'images/img-blog-2.jpg', 'Online', '2019-03-28 05:54:31', '2019-03-28 05:54:31'),
  (3, 'Admin', 'Health Seminar', 'We give a global labor learning seminar. The activities of health seminar conducted by mhc where there is a special meeting that represents technical and academic to increase the knowledge about health.', 'images/img-blog-3.jpg', 'Online', '2019-03-28 05:55:03', '2019-03-28 05:55:03');