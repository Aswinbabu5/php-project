CREATE TABLE usr2(
  `id` int(30) NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` text NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 2 COMMENT '1 = admin, 2 = staff',
  `avatar` text NOT NULL DEFAULT 'no-image-available.png',
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE tsk2(
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `user_id` int(30) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text,
  `due_date` date,
  `status` varchar(20) DEFAULT 'Pending',
  `priority` int(10) DEFAULT 0, 
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  FOREIGN KEY (user_id) REFERENCES useries(id),  
  PRIMARY KEY (`id`)
);
