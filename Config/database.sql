CREATE DATABASE worldcodes;

USE worldcodes;

CREATE TABLE proyect(
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    description VARCHAR(50) NOT NULL,
    logo LONGBLOB NOT NULL,
    email VARCHAR(50) NOT NULL,
    phone_number VARCHAR(50) NOT NULL,
    category VARCHAR(50) NOT NULL
);

CREATE TABLE roles(
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(25) NOT NULL
);

CREATE TABLE users(
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    photo LONGBLOB NOT NULL,
    password VARCHAR(50) NOT NULL,
    id_roles INT NOT NULL,
    FOREIGN KEY (id_roles) REFERENCES roles (id)
);

CREATE TABLE languages(
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    description VARCHAR(50) NOT NULL,
    logo LONGBLOB NOT NULL
);

CREATE TABLE exercises(
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    description VARCHAR(50) NOT NULL,
    id_language INT NOT NULL,
    FOREIGN KEY (id_language) REFERENCES languages (id)
);

CREATE TABLE wins (
    id INT AUTO_INCREMENT PRIMARY KEY,
    state BOOLEAN,
    id_exercise INT NOT NULL,
    id_user INT NOT NULL,
    FOREIGN KEY (id_exercise) REFERENCES exercises (id),
    FOREIGN KEY (id_user) REFERENCES users (id)
);

CREATE TABLE codes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    number INT NOT NULL,
    id_exercise INT NOT NULL,
    FOREIGN KEY (id_exercise) REFERENCES exercises (id)
);
