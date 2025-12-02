CREATE DATABASE c3015_final;
USE c3015_final;

CREATE TABLE products (
    `id` INT UNSIGNED auto_increment,
    `name` VARCHAR(255),
    `price_in_cad` DECIMAL(15,2) UNSIGNED,
    `quantity` INT UNSIGNED, PRIMARY KEY(id)
);