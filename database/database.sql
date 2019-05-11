CREATE TABLE Users(
    id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username varchar(30) NOT NULL,
    password varchar(60) NOT NULL,
    first_name varchar(30) NOT NULL,
    last_name varchar(30) NOT NULL,
    email varchar(60) NOT NULL
    );

    tanseb
    sebtan

    INSERT INTO users(username,password,first_name,last_name,email) 
    VALUES ('admin','admin','Zhong Ming','Tan','admin@riasecqiup.tk')

    CREATE TABLE riasec(
        id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
        username varchar(30) NOT NULL,
        r_count int NOT NULL,
        i_count int NOT NULL,
        a_count int NOT NULL,
        s_count int NOT NULL,
        e_count int NOT NULL,
        c_count int NOT NULL
    );

    ALTER TABLE users DROP COLUMN id
    ALTER TABLE users ADD id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT