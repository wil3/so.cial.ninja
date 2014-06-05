CREATE TABLE IF NOT EXISTS links (
	ID		INT NOT NULL AUTO_INCREMENT,
	hash		VARCHAR(40) NOT NULL,
	target_url	VARCHAR(2000) NOT NULL,
	PRIMARY KEY (ID),
	UNIQUE(hash)
);

CREATE TABLE IF NOT EXISTS open_graph (

	ID 		INT NOT NULL AUTO_INCREMENT,
	hash 		VARCHAR(40) NOT NULL,
	title 		VARCHAR(255) NOT NULL,
	type 		VARCHAR(255) NOT NULL,
	image 		VARCHAR(2000) NOT NULL,
	description 	VARCHAR(255),
	site_name 	VARCHAR(255),
	determiner 	VARCHAR(255),
	locale	 	VARCHAR(255),
	audio		VARCHAR(255),
	video		VARCHAR(255),

	PRIMARY KEY (ID),
	UNIQUE (hash)

);
