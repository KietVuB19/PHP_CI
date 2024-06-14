CREATE DATABASE codeigniter;

USE codeigniter;

CREATE TABLE IF NOT EXISTS `users` (
    `id` int NOT NULL AUTO_INCREMENT,
    `name` varchar(255) UNIQUE,
    `email` varchar(255),
    `password` varchar(255) NOT NULL,
    `roles` varchar(255) NOT NULL,
    `status` BOOLEAN DEFAULT 1,
    `attempts` int(11) NOT NULL,
    `last_attempt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `ci_sessions` (
    `id` varchar(40) NOT NULL,
    `ip_address` varchar(45) NOT NULL,
    `timestamp` int(10) unsigned DEFAULT 0 NOT NULL,
    `data` blob NOT NULL,
    KEY `ci_sessions_timestamp` (`timestamp`)
);
