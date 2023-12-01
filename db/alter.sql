ALTER TABLE `users`
ADD COLUMN `phone` varchar(255) DEFAULT NULL AFTER `email`,
ADD COLUMN `picture` varchar(255) DEFAULT NULL AFTER `phone`,
ADD COLUMN `gender` varchar(255) DEFAULT NULL AFTER `picture`,
ADD COLUMN `dob` date DEFAULT NULL AFTER `gender`,
ADD COLUMN `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL AFTER `dob`;


ALTER TABLE `admins` ADD `picture` VARCHAR(255) NULL AFTER `password`;
