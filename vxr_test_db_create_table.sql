USE vxr_test_db;
GO
CREATE TABLE users(id int primary key not null identity(1,1),
					username varchar(255) not null,
					password varchar(255) not null,
					fullname varchar(255) not null,
					createddate date not null,
					updateddate date not null,
					createduserid int,
					updateduserid int);
