CREATE TABLE users_info (
    id INT(11) NOT NULL AUTO_INCREMENT,
    username VARCHAR(30) NOT NULL,
    pwd VARCHAR(255) NOT NULL,
    email VARCHAR(100) NOT NULL,
    phoneNum VARCHAR(20) NOT NULL,
    PRIMARY KEY (id)
);