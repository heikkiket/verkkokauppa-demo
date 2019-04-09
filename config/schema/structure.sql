use verkkokauppa_testi;


SET FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS tuotteet;
DROP table IF EXISTS soitintyypit;
DROP TABLE IF EXISTS ostoskori;
DROP TABLE IF EXISTS kayttajat;
DROP TABLE IF EXISTS ostoskorituotteet;
DROP TABLE IF EXISTS tilaukset;
SET FOREIGN_KEY_CHECKS=1;



CREATE TABLE soitintyypit
(
  id INT AUTO_INCREMENT NOT NULL,
  soitintyyppi VARCHAR(255) NOT NULL,
  PRIMARY KEY (id)
);

CREATE TABLE kayttajat
(
  id INT NOT NULL,
  nimi VARCHAR(255) NOT NULL,
  toimitusosoite VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL,
  puhelin VARCHAR(255) NOT NULL,
  salasana VARCHAR(1024) NOT NULL,
  tyyppi INT NOT NULL, /* 1 = ylläpitäjä, 2 = asiakas, 3 = anonyymi */
  PRIMARY KEY (id)
);

CREATE TABLE tilaukset
(
  id INT NOT NULL,
  user_id INT NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (user_id) REFERENCES kayttajat(id)
);

CREATE TABLE tuotteet
(
  nimi VARCHAR(255) NOT NULL,
  tuotekoodi INT AUTO_INCREMENT NOT NULL,
  valmistusvuosi INT NOT NULL,
  mitat VARCHAR(255) NOT NULL,
  paino INT NOT NULL,
  hinta FLOAT NOT NULL,
  kuvaus VARCHAR(255),
  soitintyyppi INT NOT NULL,
  PRIMARY KEY (tuotekoodi),
  FOREIGN KEY (soitintyyppi) REFERENCES soitintyypit(id)
);

CREATE TABLE ostoskori
(
  id INT NOT NULL,
  kayttaja_id INT NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (kayttaja_id) REFERENCES kayttajat(id)
);

CREATE TABLE ostoskorituotteet
(
  id INT AUTO_INCREMENT NOT NULL,
  tuotekoodi INT NOT NULL,
  ostoskori_id INT,
  tilaus_id INT,
  PRIMARY KEY (id),
  FOREIGN KEY (tuotekoodi) REFERENCES tuotteet(tuotekoodi),
  FOREIGN KEY (ostoskori_id) REFERENCES ostoskori(id),
  FOREIGN KEY (tilaus_id) REFERENCES ostoskori(id)
);

