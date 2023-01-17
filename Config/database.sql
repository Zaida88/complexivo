CREATE DATABASE worldcodes;

USE worldcodes;

CREATE TABLE proyect(
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    description VARCHAR(50) NOT NULL,
    logo LONGBLOB NOT NULL,
    email VARCHAR(50) NOT NULL,
    phoneNumber VARCHAR(50) NOT NULL
);

CREATE TABLE roles(
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(25) NOT NULL
);

CREATE TABLE users(
    id INT AUTO_INCREMENT PRIMARY KEY,
    firstName VARCHAR(50) NOT NULL,
    lastName VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    photo LONGBLOB NOT NULL,
    password VARCHAR(50) NOT NULL,
    idRoles INT NOT NULL,
    FOREIGN KEY (idRoles) REFERENCES roles (id)
);

CREATE TABLE languages(
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    description VARCHAR(50) NOT NULL,
    logo LONGBLOB NOT NULL
);

CREATE TABLE states(
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL
);

CREATE TABLE exercises(
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    description VARCHAR(50) NOT NULL,
    idLanguages INT NOT NULL,
    FOREIGN KEY (idLanguages) REFERENCES languages (id)
);

CREATE TABLE achievements (
    id INT AUTO_INCREMENT PRIMARY KEY,
    idExercises INT NOT NULL,
    idStates INT NOT NULL,
    idUsers INT NOT NULL,
    FOREIGN KEY (idExercises) REFERENCES exercises (id),
    FOREIGN KEY (idStates) REFERENCES states (id),
    FOREIGN KEY (idUsers) REFERENCES users (id)
);
