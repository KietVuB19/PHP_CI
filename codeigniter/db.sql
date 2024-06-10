create database codeigniter;

CREATE TABLE IF NOT EXISTS `users` (
    `id` int NOT NULL auto_increment,
    `name` varchar(45),
    `mail` varchar(45),
    `password` varchar(45),
    `roles` varchar(45),
    `status` Boolean dfault 1
    
    
    KEY `ci_sessions_timestamp` (`timestamp`)
);


CREATE TABLE IF NOT EXISTS `ci_sessions` (
    `id` varchar(40) NOT NULL,
    `ip_address` varchar(45) NOT NULL,
    `timestamp` int(10) unsigned DEFAULT 0 NOT NULL,
    `data` blob NOT NULL,
    KEY `ci_sessions_timestamp` (`timestamp`)
);