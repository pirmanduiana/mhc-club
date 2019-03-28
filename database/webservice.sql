CREATE TABLE `webservice` (
  `id` INTEGER(11) NOT NULL AUTO_INCREMENT,
  `group` VARCHAR(100) COLLATE latin1_swedish_ci DEFAULT NULL,
  `icon` VARCHAR(100) COLLATE latin1_swedish_ci DEFAULT NULL,
  `title` VARCHAR(255) COLLATE latin1_swedish_ci DEFAULT NULL,
  `desc` TEXT COLLATE latin1_swedish_ci,
  `image` VARCHAR(255) COLLATE latin1_swedish_ci DEFAULT NULL,
  `status` VARCHAR(31) COLLATE latin1_swedish_ci DEFAULT NULL,
  `created_at` TIMESTAMP NULL NOT NULL,
  `updated_at` TIMESTAMP NULL NOT NULL,
  PRIMARY KEY USING BTREE (`id`) COMMENT ''
)ENGINE=InnoDB
AUTO_INCREMENT=12 AVG_ROW_LENGTH=1638 ROW_FORMAT=DYNAMIC CHARACTER SET 'latin1' COLLATE 'latin1_swedish_ci'
COMMENT=''
;
COMMIT;

/* Data for the 'webservice' table  (Records 1 - 10) */

INSERT INTO `webservice` (`id`, `group`, `icon`, `title`, `desc`, `image`, `status`, `created_at`, `updated_at`) VALUES
  (2, 'flex', 'flaticon-hospital', 'Diagnostics and emergency treatment', NULL, NULL, 'Online', '2019-03-28 07:07:54', '2019-03-28 07:07:54'),
  (3, 'flex', 'flaticon-stethoscope', 'Specialist doctor appointment', NULL, NULL, 'Online', '2019-03-28 07:08:47', '2019-03-28 07:09:23'),
  (4, 'flex', 'flaticon-stethoscope', 'In house clinic hotel', NULL, NULL, 'Online', '2019-03-28 07:09:09', '2019-03-28 07:09:18'),
  (5, 'flex', NULL, NULL, 'Comprehensive services for our patients', NULL, 'Online', '2019-03-28 07:09:42', '2019-03-28 07:09:51'),
  (6, 'no-flex', 'flaticon-blood-donation', 'Long term medical care in a hospital with COB BPJS system', NULL, NULL, 'Online', '2019-03-28 07:10:38', '2019-03-28 07:10:44'),
  (7, 'no-flex', NULL, 'MISSION', 'Affordable premi', 'images/services-1.jpg', 'Online', '2019-03-28 07:12:05', '2019-03-28 07:12:05'),
  (8, 'no-flex', NULL, 'VISION', 'Take care of patient', 'images/services-2.jpg', 'Online', '2019-03-28 07:12:39', '2019-03-28 07:12:39'),
  (9, 'no-flex', 'flaticon-radiation', 'A specialized laboratory research', NULL, NULL, 'Online', '2019-03-28 07:13:17', '2019-03-28 07:54:36'),
  (10, 'no-flex', 'flaticon-ambulance', '24 hours on call services', NULL, NULL, 'Online', '2019-03-28 07:13:48', '2019-03-28 07:13:48'),
  (11, 'no-flex', NULL, NULL, 'From careful observation of existing health services, we as health care providers offer comprehensive services to our clients. The services that we can provide include emergency, inpatient, laboratory and specialist doctors at all of our providers. We also provide hotel and oncall clinics that are available 24 hours in providing medical actions and consultations and activities such as SAT training, health seminars and free examinations.', NULL, 'Online', '2019-03-28 07:14:10', '2019-03-28 07:14:10');