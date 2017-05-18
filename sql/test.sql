DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
    id integer PRIMARY KEY NOT NULL,
    name text,
    password text,
    ip text,
    ctime integer
);