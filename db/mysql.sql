DROP TABLE IF EXISTS table_login;
$
DROP TABLE IF EXISTS table_notes;
$
DROP TABLE IF EXISTS table_notebooks;
$
CREATE TABLE table_login (
	loginIndex INT(10) NOT NULL AUTO_INCREMENT,
	loginUserName varchar(30) NOT NULL,
	loginPassword varchar(40) NOT NULL DEFAULT '',
	loginEmail varchar(100) NOT NULL DEFAULT '',
	PRIMARY KEY (loginIndex)
);
$
CREATE TABLE table_notes (
	notesIndex INT(10) NOT NULL AUTO_INCREMENT,
	notesNotebook varchar(50) NOT NULL DEFAULT 'ALL',
	notesTag varchar(50) NOT NULL DEFAULT 'DEFAULT',
	notesTitle varchar(50) NOT NULL DEFAULT '',
	notesContent varchar(200) DEFAULT '',
	PRIMARY KEY (notesIndex)
)
$
CREATE TABLE table_notebooks (
	notebooksIndex INT(10) NOT NULL AUTO_INCREMENT,
	notebooksTitle varchar(50) NOT NULL DEFAULT 'ALL',
	PRIMARY KEY (notebooksIndex)
);