/* Data for the 'websliders' table  (Records 1 - 4) */
CREATE TABLE `websliders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `content` varchar(255) DEFAULT NULL,
  `image_name` varchar(255) DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 PACK_KEYS=0;

INSERT INTO `websliders` (`id`, `title`, `content`, `image_name`, `status`, `created_at`, `updated_at`) VALUES
  (4, 'We have 24 Hour Call Center', 'We have 24 hours call center every day to accelerate coordination and make promise to consult with specialist doctors or inpatient in the hospital.', 'images/slide-1.jpg', 'Online', '2019-03-27 06:34:22', '2019-03-27 06:34:22'),
  (5, 'We help you to find the best hospital around you', 'We consider that availability as the most important of the best health services around you.', 'images/img_bg_5.jpg', 'Online', '2019-03-27 06:51:44', '2019-03-27 06:51:44'),
  (6, 'We have \"In House Hotel Clinic\" that provide you 24 hours health services', 'We provide an easy and quick Health Services as well as supported by medical person that available in 24 hours.', 'images/img_bg_1.jpg', 'Online', '2019-03-27 06:52:33', '2019-03-27 06:52:33'),
  (7, 'We have 24 Hour Call Center', 'We have 24 hours call center every day to accelerate coordination and make promise to consult with specialist doctors or inpatient in the hospital.', 'images/slide-4.jpg', 'Online', '2019-03-27 06:53:02', '2019-03-27 06:53:02');