CREATE TABLE project (
	id INT PRIMARY KEY,
	title VARCHAR(256) NOT NULL,
	description VARCHAR(2048),
	start DATE NOT NULL,
	duration INT,
	goalAmount INT,
	currentAmount INT,
	image VARCHAR(256)
);

CREATE TABLE category (
	name VARCHAR(32) PRIMARY KEY,
	image VARCHAR(256)
);

CREATE TABLE person (
	email VARCHAR(256) PRIMARY KEY,
	username VARCHAR(32) NOT NULL,
	password VARCHAR(32) NOT NULL,
	name VARCHAR(64) NOT NULL,
	image VARCHAR(256)
);

CREATE TABLE donation (
	donor VARCHAR(256) REFERENCES person(email),
	amount INT NOT NULL,
	date TIMESTAMP,
	project INT REFERENCES project(id),
	PRIMARY KEY(donor, date, project)
);

CREATE TABLE projectPerson (
	project INT REFERENCES project(id),
	person VARCHAR(256) REFERENCES person(email) NOT NULL,
	PRIMARY KEY(project)
);

CREATE TABLE projectCategory (
	project INT REFERENCES project(id),
	category VARCHAR(32) REFERENCES category(name),
	PRIMARY KEY(project, category)
);

