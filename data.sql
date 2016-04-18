DROP TABLE IF EXISTS property;
DROP TABLE IF EXISTS inquiry;

CREATE TABLE property (
	propertyId INT UNSIGNED AUTO_INCREMENT NOT NULL,
	address VARCHAR(128) NOT NULL,
	squareFeet CHAR(4),
	floorPlan CHAR(4),
	PRIMARY KEY(propertyId)
);
CREATE TABLE inquiry (
	buyerEmail INT UNSIGNED AUTO_INCREMENT NOT NULL,
	buyerName  VARCHAR(128)                NOT NULL,
	buyerInput VARCHAR(256)                NOT NULL,
	INDEX (propertyId),
	FOREIGN KEY (propertyId) REFERENCES property (propertyId),
	PRIMARY KEY (buyerEmail)
);
