CREATE TABLE `webgallery` (
  `id` INTEGER(11) NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(255) COLLATE latin1_swedish_ci DEFAULT NULL,
  `image` VARCHAR(255) COLLATE latin1_swedish_ci DEFAULT NULL,
  `status` VARCHAR(31) COLLATE latin1_swedish_ci DEFAULT NULL,
  `created_at` TIMESTAMP NULL NOT NULL,
  `updated_at` TIMESTAMP NULL NOT NULL,
  PRIMARY KEY USING BTREE (`id`) COMMENT ''
)ENGINE=InnoDB
AUTO_INCREMENT=6 AVG_ROW_LENGTH=4096 ROW_FORMAT=DYNAMIC CHARACTER SET 'latin1' COLLATE 'latin1_swedish_ci'
COMMENT=''
;
COMMIT;

/* Data for the 'webgallery' table  (Records 1 - 4) */

INSERT INTO `webgallery` (`id`, `title`, `image`, `status`, `created_at`, `updated_at`) VALUES
  (2, 'test1', 'images/51508109_530440304113324_3412171432988246016_n.jpg', 'Online', '2019-04-04 10:54:39', '2019-04-04 10:54:39'),
  (3, 'test2', 'images/54518834_315009469159380_2691924396909527040_n.jpg', 'Online', '2019-04-04 10:54:53', '2019-04-04 10:54:53'),
  (4, 'test3', 'images/17155613_1724182947597508_2489928977530307289_n.jpg', 'Online', '2019-04-04 10:55:14', '2019-04-04 10:55:14'),
  (5, 'test5', 'images/ngusaba-kedasa-nguling-ribuan-ekor-babi_20150629_003256.jpg', 'Online', '2019-04-04 10:55:35', '2019-04-04 10:55:35');