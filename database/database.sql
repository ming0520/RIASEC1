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
-- This is for reset the id column
    ALTER TABLE users DROP COLUMN id
    ALTER TABLE users ADD id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT
-- This is for add new column in users table
   ALTER TABLE users
  ADD identity varchar(30) NOT NULL,
  ADD age int(2) NOT NULL,
  ADD phone_number varchar(20) NOT NULL,
  ADD ethnicity varchar(20) NOT NULL,
  ADD qualification varchar(60) NOT NULL,
  ADD yoc int(4) NOT NULL;

  -- This code is to create staff table
  CREATE TABLE staff (
      id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
        username varchar(30) NOT NULL,
        password varchar(60) NOT NULL,
        first_name varchar(30) NOT NULL,
        last_name varchar(30) NOT NULL,
        phone_number varchar(20) NOT NULL,
        email varchar(60) NOT NULL
  );

  --default account for marketing
  INSERT INTO staff SET username='staff123', password='qiup123';

select * FROM riasec a INNER JOIN users b on a.username = b. username WHERE 1;