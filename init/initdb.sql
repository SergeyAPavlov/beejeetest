CREATE TABLE `users` (
                         `id` INT NULL,
                         `name` TEXT NULL,
                         `password` TEXT NULL,
                         `role` TINYINT NULL
)
    COLLATE='utf8_general_ci'
;

CREATE TABLE `tasks` (
                         `id` INT NULL,
                         `username` TEXT NULL,
                         `email` TEXT NULL,
                         `text` TEXT NULL,
                         `status_id` INT NULL
)
    COLLATE='utf8_general_ci'
;

CREATE TABLE `statuses` (
                         `id` INT NULL,
                         `name` INT NULL
)
    COLLATE='utf8_general_ci'
;