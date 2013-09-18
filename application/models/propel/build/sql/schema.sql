
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- sys_chats
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `sys_chats`;

CREATE TABLE `sys_chats`
(
    `id_chat` INTEGER NOT NULL AUTO_INCREMENT,
    `id_sender` INTEGER,
    `id_receiver` INTEGER,
    `message` VARCHAR(255),
    `created` DATETIME,
    PRIMARY KEY (`id_chat`),
    INDEX `id_sender` (`id_sender`),
    INDEX `id_receiver` (`id_receiver`),
    CONSTRAINT `sys_chats_fk1`
        FOREIGN KEY (`id_receiver`)
        REFERENCES `sys_users` (`id_user`),
    CONSTRAINT `sys_chats_fk`
        FOREIGN KEY (`id_sender`)
        REFERENCES `sys_users` (`id_user`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- sys_files
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `sys_files`;

CREATE TABLE `sys_files`
(
    `id_file` int(11) unsigned NOT NULL AUTO_INCREMENT,
    `filename` VARCHAR(255),
    `title` VARCHAR(100),
    `type` VARCHAR(20),
    `fullpath` VARCHAR(255),
    `size` DECIMAL(20,0) DEFAULT 0,
    `image_width` INTEGER DEFAULT 0,
    `image_height` INTEGER DEFAULT 0,
    `image_type` VARCHAR(20),
    `is_image` VARCHAR(20) DEFAULT 'NO',
    PRIMARY KEY (`id_file`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- sys_migrations
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `sys_migrations`;

CREATE TABLE `sys_migrations`
(
    `version` INTEGER(3) NOT NULL,
    PRIMARY KEY (`version`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- sys_notifications
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `sys_notifications`;

CREATE TABLE `sys_notifications`
(
    `id_notification` INTEGER NOT NULL AUTO_INCREMENT,
    `id_sender` INTEGER,
    `id_receiver` INTEGER,
    `type` VARCHAR(20),
    `reference` VARCHAR(255),
    `message` TEXT,
    `state` VARCHAR(20) DEFAULT 'CREATED',
    `created` DATETIME,
    PRIMARY KEY (`id_notification`),
    INDEX `id_sender` (`id_sender`),
    INDEX `id_receiver` (`id_receiver`),
    CONSTRAINT `sys_notifications_fk`
        FOREIGN KEY (`id_sender`)
        REFERENCES `sys_users` (`id_user`),
    CONSTRAINT `sys_notifications_fk1`
        FOREIGN KEY (`id_receiver`)
        REFERENCES `sys_users` (`id_user`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- sys_pages
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `sys_pages`;

CREATE TABLE `sys_pages`
(
    `id_page` int(11) unsigned NOT NULL AUTO_INCREMENT,
    `title` VARCHAR(100) NOT NULL,
    `slug` VARCHAR(100) NOT NULL,
    `order` int(11) unsigned NOT NULL,
    `id_module` int(11) unsigned DEFAULT 0,
    `id_section` INTEGER DEFAULT 0,
    `state` VARCHAR(20) DEFAULT 'ACTIVE',
    `visible` VARCHAR(20) DEFAULT 'YES',
    PRIMARY KEY (`id_page`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- sys_parameters
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `sys_parameters`;

CREATE TABLE `sys_parameters`
(
    `name` VARCHAR(50) NOT NULL,
    `value` VARCHAR(255),
    `title` VARCHAR(100),
    `description` TEXT,
    PRIMARY KEY (`name`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- sys_permissions
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `sys_permissions`;

CREATE TABLE `sys_permissions`
(
    `id_page` int(11) unsigned NOT NULL,
    `id_rol` int(11) unsigned NOT NULL,
    `create` VARCHAR(3) DEFAULT 'NO',
    `read` VARCHAR(3) DEFAULT 'NO',
    `update` VARCHAR(3) DEFAULT 'NO',
    `delete` VARCHAR(3) DEFAULT 'NO',
    PRIMARY KEY (`id_page`,`id_rol`),
    INDEX `id_page` (`id_page`),
    INDEX `id_rol` (`id_rol`),
    CONSTRAINT `sys_permissions_fk`
        FOREIGN KEY (`id_page`)
        REFERENCES `sys_pages` (`id_page`),
    CONSTRAINT `sys_permissions_fk1`
        FOREIGN KEY (`id_rol`)
        REFERENCES `sys_roles` (`id_rol`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- sys_roles
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `sys_roles`;

CREATE TABLE `sys_roles`
(
    `id_rol` int(11) unsigned NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(50),
    `description` VARCHAR(255),
    PRIMARY KEY (`id_rol`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- sys_sessions
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `sys_sessions`;

CREATE TABLE `sys_sessions`
(
    `session_id` VARCHAR(40) DEFAULT '0' NOT NULL,
    `ip_address` VARCHAR(45) DEFAULT '0' NOT NULL,
    `user_agent` VARCHAR(120) NOT NULL,
    `last_activity` int(10) unsigned DEFAULT 0 NOT NULL,
    `user_data` TEXT NOT NULL,
    PRIMARY KEY (`session_id`),
    INDEX `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- sys_users
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `sys_users`;

CREATE TABLE `sys_users`
(
    `id_user` INTEGER NOT NULL AUTO_INCREMENT,
    `username` VARCHAR(50),
    `password` VARCHAR(255),
    `email` VARCHAR(100),
    `first_name` VARCHAR(50),
    `last_name` VARCHAR(100),
    `state` VARCHAR(20) DEFAULT 'CREATED',
    `id_rol` int(11) unsigned,
    `id_photo` int(11) unsigned,
    `created` DATETIME,
    `phone` CHAR(20),
    `modified` DATETIME,
    `lang_code` VARCHAR(10) DEFAULT 'EN',
    `mobile` VARCHAR(20),
    PRIMARY KEY (`id_user`),
    UNIQUE INDEX `email` (`email`),
    INDEX `id_rol` (`id_rol`),
    INDEX `id_photo` (`id_photo`),
    CONSTRAINT `sys_users_fk`
        FOREIGN KEY (`id_rol`)
        REFERENCES `sys_roles` (`id_rol`),
    CONSTRAINT `sys_users_fk1`
        FOREIGN KEY (`id_photo`)
        REFERENCES `sys_files` (`id_file`)
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
