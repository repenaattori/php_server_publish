
CREATE TABLE user(  
    username VARCHAR(255) NOT NULL PRIMARY KEY,
    fullname VARCHAR(255) NOT NULL,
    pw VARCHAR(255) NOT NULL
) DEFAULT CHARSET UTF8 COMMENT '';

CREATE TABLE message(  
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(255) NOT NULL,
    msg VARCHAR(255),
    FOREIGN KEY (username) REFERENCES user(username)
) DEFAULT CHARSET UTF8 COMMENT '';

INSERT INTO user (username, fullname, pw) VALUES ("acu", "Aku Ankka", "acu1234"),
    ("timze", "Timo Tappura", "timu123"), ("repe", "Reima Riihimäki", "reisga");

INSERT INTO message (username, msg) VALUES ("acu","Huomenta"),
("acu","Seuraava viesti..."),("acu","Taas maanantai"),("timze","Hello world!"),
("timze","Studying is nice"), ("repe","Teaching, teaching, teaching..."),
("repe", "Use the force!");