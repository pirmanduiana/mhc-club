/* Data for the 'webabout' table  (Records 1 - 1) */
CREATE TABLE `webabout` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `content` text,
  `image_logo` varchar(255) DEFAULT NULL,
  `image_about` varchar(255) DEFAULT NULL,
  `image_title` varchar(255) DEFAULT NULL,
  `outhor_name` varchar(255) DEFAULT NULL,
  `status` varchar(31) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 PACK_KEYS=0;

INSERT INTO `webabout` (`id`, `title`, `content`, `image_logo`, `image_about`, `image_title`, `outhor_name`, `status`, `created_at`, `updated_at`) VALUES
  (1, 'About Mandiri Health Care', 'We are a company that engaged in health services and already have some clients. We commited to provide the best health services and doctors that are ready every time. MHC has professional doctors and nurses and they are already certified. We deliver quality services and have 24 hours call center that can help you every time.', 'images/mhc-logo.png', 'images/about.png', 'Your health is our priority', 'Victor Erenst Warembengan S,Si, Apt', 'Online', '2019-03-27 08:05:33', '2019-03-27 08:05:33');