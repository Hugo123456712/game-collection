DROP TABLE IF EXISTS utilisateur;
DROP TABLE IF EXISTS jeu_video;
DROP TABLE IF EXISTS bibliotheque;

CREATE TABLE utilisateur(
    idUser INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    prenom VARCHAR(50),
    nom VARCHAR(50),
    email VARCHAR(50),
    mdp VARCHAR(150)
    );
    
CREATE TABLE jeu_video(
	idJV INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nomJV VARCHAR(50),
    editeur VARCHAR(50),
    dateSortie DATE,
    couverture VARCHAR(50)
);


CREATE TABLE bibliotheque(
    idUser INT, 
    idJV INT,
	FOREIGN KEY (idUser) REFERENCES utilisateur(idUser),
	FOREIGN KEY (idJV) REFERENCES jeu_video(idJV),
    nbHeure INT
);
