CREATE TABLE `webtestimony` (
  `id` INTEGER(11) NOT NULL AUTO_INCREMENT,
  `user` VARCHAR(100) COLLATE latin1_swedish_ci DEFAULT NULL,
  `testimony` TEXT COLLATE latin1_swedish_ci,
  `rating` INTEGER(11) DEFAULT NULL,
  `user_image` VARCHAR(255) COLLATE latin1_swedish_ci DEFAULT NULL,
  `status` VARCHAR(30) COLLATE latin1_swedish_ci DEFAULT NULL,
  `created_at` TIMESTAMP NULL NOT NULL,
  `updated_at` TIMESTAMP NULL NOT NULL,
  PRIMARY KEY USING BTREE (`id`) COMMENT ''
)ENGINE=InnoDB
AUTO_INCREMENT=3 AVG_ROW_LENGTH=8192 ROW_FORMAT=DYNAMIC CHARACTER SET 'latin1' COLLATE 'latin1_swedish_ci'
COMMENT=''
;
COMMIT;

/* Data for the 'webtestimony' table  (Records 1 - 2) */

INSERT INTO `webtestimony` (`id`, `user`, `testimony`, `rating`, `user_image`, `status`, `created_at`, `updated_at`) VALUES
  (1, 'Anonymous', 'Me and my friends who have used MHC facilities are very satisfied. The service provided is good, the call center can be quickly contacted. Also when we wanted to do a check-up with a specialist doctor, we felt very helped because we were immediately booked into the queue number so we only had to come to do the inspection.', NULL, 'images/f84a8ddfeaede84d82471a96e29a630a.jpg', 'Online', '2019-03-27 10:11:05', '2019-03-27 10:11:05'),
  (2, 'Anonymous', 'The services provided by MHC are very good. We are comfortable using all facilities provided by MHC until now.', NULL, 'images/cfd6d491fdf2ba404fcecab52f177fd7.jpg', 'Online', '2019-03-27 10:11:44', '2019-03-27 10:11:44');