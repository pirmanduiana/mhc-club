CREATE TABLE `webourbest` (
  `id` INTEGER(11) NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(255) COLLATE latin1_swedish_ci DEFAULT NULL,
  `icon` VARCHAR(100) COLLATE latin1_swedish_ci DEFAULT NULL,
  `content` TEXT COLLATE latin1_swedish_ci,
  `status` VARCHAR(30) COLLATE latin1_swedish_ci DEFAULT NULL,
  `created_at` TIMESTAMP NULL NOT NULL,
  `updated_at` TIMESTAMP NULL NOT NULL,
  PRIMARY KEY USING BTREE (`id`) COMMENT ''
)ENGINE=InnoDB
AUTO_INCREMENT=5 AVG_ROW_LENGTH=4096 ROW_FORMAT=DYNAMIC CHARACTER SET 'latin1' COLLATE 'latin1_swedish_ci'
COMMENT=''
;
COMMIT;

/* Data for the 'webourbest' table  (Records 1 - 4) */

INSERT INTO `webourbest` (`id`, `title`, `icon`, `content`, `status`, `created_at`, `updated_at`) VALUES
  (1, 'Qualified Doctors and Nurses', 'flaticon-healthy-1', 'The doctors and nurses are standby in 24 hours for on call service.', 'Online', '2019-03-27 09:14:23', '2019-03-27 09:14:23'),
  (2, 'We provide modern facilities', 'flaticon-medical-1', 'Modern health facilities are available in our providers.', 'Online', '2019-03-27 09:14:45', '2019-03-27 09:14:45'),
  (3, 'Free Consultation for 24 Hours', 'flaticon-stethoscope', 'Our call center is 24 hours available for free consultation.', 'Online', '2019-03-27 09:15:11', '2019-03-27 09:15:11'),
  (4, 'Flexibility', 'flaticon-radiation', 'A flexible health services for patient and refferal.', 'Online', '2019-03-27 09:15:34', '2019-03-27 09:15:34');