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

INSERT INTO `tasks` (`id`, `username`, `email`, `text`) VALUES ('1', 'u1', 'u1@u2', 'test1');
INSERT INTO `tasks` (`id`, `username`, `email`, `text`) VALUES ('2', 'u2', 'u2@u2', 'test2');
INSERT INTO `tasks` (`id`, `username`, `email`, `text`) VALUES ('3', 'u3', 'u3@u2', 'test3');
