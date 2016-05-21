/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Author:  Philip
 * Created: 2016-mar-11
 */

CREATE DATABASE blog

CREATE TABLE Posts (
    Id int NOT NULL AUTO_INCREMENT,
    Header varchar(255) NOT NULL,
    Text varchar(255) NOT NULL,
    Url varchar(255) NOT NULL,
    Topic varchar(255) NOT NULL,
    PRIMARY KEY (Id)
);
CREATE TABLE Users (
    Id int NOT NULL AUTO_INCREMENT,
    Username varchar(255) NOT NULL,
    Password varchar(255) NOT NULL,
    Email varchar(255) NOT NULL,
    PRIMARY KEY (Id)
);
CREATE TABLE Topics (
    Id int NOT NULL AUTO_INCREMENT,
    Name varchar(255) NOT NULL,
    Url varchar(255) NOT NULL,
    PRIMARY KEY (Id)
);

INSERT INTO Users (Username, Password, Email) VALUES ("admin", "adm456", "phad86@gmail.com");

INSERT INTO Topics (Name, Url) VALUES (".Net", "/.net");
INSERT INTO Topics (Name, Url) VALUES ("PHP", "/php");
INSERT INTO Topics (Name, Url) VALUES ("Web", "/web");
INSERT INTO Topics (Name, Url) VALUES ("Dev-Tools", "/devtools");