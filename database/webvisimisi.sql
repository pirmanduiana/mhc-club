/* Data for the 'webvisimisi' table  (Records 1 - 3) */
CREATE TABLE `webvisimisi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  `content` text,
  `status` varchar(30) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 PACK_KEYS=0;

INSERT INTO `webvisimisi` (`id`, `title`, `content`, `status`, `created_at`, `updated_at`) VALUES
  (1, 'Our Mission', 'Creating the health of employee for support the company optimization with a useful level of health.', 'Online', '2019-03-27 08:21:51', '2019-03-27 08:21:51'),
  (2, 'Our Vission', 'Providing a sutainable health services by keeping the commitment and profesionalism of the code of health ethics with work partners.', 'Online', '2019-03-27 08:22:16', '2019-03-27 08:22:16'),
  (3, 'Why Choose us', 'MHC has some advantages which are flexibility, 24 hours call center service, professional workers availability, doctors and nurses, hospital cooperation, clinic and laboratory and we have the other advantages which are training of first aid by certified doctors that we create directly from the provider. We also provide health seminars for our health workers who are very useful to increase their knowledge in health.', 'Online', '2019-03-27 08:23:04', '2019-03-27 08:23:04');