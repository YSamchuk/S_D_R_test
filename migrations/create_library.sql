CREATE TABLE `book` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL, PRIMARY KEY (`id`)
);

CREATE TABLE `author` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL, PRIMARY KEY (`id`)
);

CREATE TABLE `book_author` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `author_id` INT UNSIGNED NOT NULL,
  `book_id` INT UNSIGNED NOT NULL,
  FOREIGN KEY (author_id) REFERENCES author(id) ON DELETE RESTRICT ON UPDATE CASCADE,
  FOREIGN KEY (book_id) REFERENCES book(id) ON DELETE RESTRICT ON UPDATE CASCADE,
  UNIQUE KEY (`author_id`, `book_id`)
);

-- show result select
SELECT `author`.`name`, COUNT(`author`.`name`)
FROM `book_author` AS `ba`
LEFT JOIN `author` ON `author`.`id` = `ba`.`author_id`
LEFT JOIN `book` ON `book`.`id` = `ba`.`book_id`
-- select all book with N authors
GROUP BY `author`.`name`
HAVING COUNT(`author`.`name`) > '3';