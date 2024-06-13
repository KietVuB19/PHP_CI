create database codeigniter;

CREATE TABLE IF NOT EXISTS `users` (
    `id` int NOT NULL auto_increment,
    `name` varchar(255) unique,
    `email` varchar(255),
    `password` varchar(255) NOT NULL,
    `roles` varchar(255) NOT NULL,
    `status` Boolean default 1
    `attempts` int(11) NOT NULL,
    `last_attempt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	primary key (id),
    KEY `ci_sessions_timestamp` (`timestamp`)
);


CREATE TABLE IF NOT EXISTS `ci_sessions` (
    `id` varchar(40) NOT NULL,
    `ip_address` varchar(45) NOT NULL,
    `timestamp` int(10) unsigned DEFAULT 0 NOT NULL,
    `data` blob NOT NULL,
    KEY `ci_sessions_timestamp` (`timestamp`)
);
