# searchEngine
A simple search engine to search files that have been uploaded in the database



To get this code running:
1. install xampp server
2. put the folder inside the htdocs (working directory in ubuntu).
3. rename the folder to searchEngine
4. open phpmyadmin -> sql
4.1. create database searchEngine
4.2. create table files ( id int primary key auto_increment, fileName text , category varchar(10), dateModified int)
5. put appropiate values in config/config.php
6. browser -> localhost/searchEngine
