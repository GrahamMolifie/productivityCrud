CREATE TABLE IF NOT EXISTS `productivity` (
`productivityId` int(8) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `post_at` date DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

ALTER TABLE `productivity`
 ADD PRIMARY KEY (`productivityId`);

ALTER TABLE `productivity`
MODIFY `productivityId` int(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
