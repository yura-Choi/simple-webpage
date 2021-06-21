CREATE TABLE user (
    id INT NOT NULL AUTO_INCREMENT,
    user_id VARCHAR(50) NOT NULL,
    user_pw VARCHAR(88) NOT NULL,
    nickname VARCHAR(50) NOT NULL,
    PRIMARY KEY(id)
);

CREATE TABLE post (
    id INT NOT NULL AUTO_INCREMENT,
    title VARCHAR(50) NOT NULL,
    content TEXT NULL,
    author_id INT NOT NULL,
    created DATETIME NOT NULL,
    PRIMARY KEY(id),
    FOREIGN KEY(author_id) REFERENCES user(id) ON DELETE CASCADE
);